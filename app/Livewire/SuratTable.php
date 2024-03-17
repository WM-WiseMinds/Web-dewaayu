<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Surat;
use App\Models\Penugasan;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Masmerise\Toaster\Toastable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Detail;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class SuratTable extends PowerGridComponent
{
    use WithExport;
    use Toastable;

    public function setUp(): array
    {
        $this->showCheckBox();

        $setUp = [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            Detail::make()
                ->view('details.surat-detail')
                ->showCollapseIcon(),
        ];

        if (auth()->user()->can('export')) {
            $setUp[] = Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV);
        }

        return $setUp;
    }

    public function datasource(): Builder
    {
        $user = auth()->user();

        if ($user->hasRole('Operator')) {
            return Surat::where('jenis_surat', 'Surat Keluar');
        } elseif ($user->hasRole('Sekretaris Desa')) {
            return Surat::where('pengirim_id', $user->id)
                ->orWhereHas('desa', function ($query) use ($user) {
                    $query->where('id', $user->desa_id);
                });
        } elseif ($user->hasRole('Koor TAPM')) {
            return Surat::where('pengirim_id', $user->id);
        }

        return Surat::query();
    }

    public function relationSearch(): array
    {
        return [
            'pengirim' => ['name'],
            'penerima' => ['name'],
            'desa' => ['nama_desa']
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('pengirim_id')
            ->add('penerima_id')
            ->add('rekomendasi_id')
            ->add('desa_id')
            ->add('pengirim_eksternal')
            ->add('nama_desa', fn ($row) => $row->desa ? $row->desa->nama_desa : null)
            ->add('jenis_surat')
            ->add('pengirim', fn ($row) => $row->pengirim ? $row->pengirim->name : $row->pengirim_eksternal)
            ->add('penerima', fn ($row) => $row->penerima ? $row->penerima->name : $row->penerima_eksternal)
            ->add('no_hp_pengirim', fn ($row) => $row->pengirim ? $row->pengirim->no_hp : null)
            ->add('no_hp_penerima', fn ($row) => $row->penerima ? $row->penerima->no_hp : null)
            ->add('rekomendasi', fn ($row) => $row->rekomendasi ? $row->rekomendasi->name : null)
            ->add('perihal')
            ->add('tanggal_kegiatan', fn ($row) => $row->tanggal_kegiatan ? Carbon::parse($row->tanggal_kegiatan)->format('d-m-Y') : null)
            ->add('hari')
            ->add('waktu')
            ->add('lokasi_kegiatan')
            ->add('status')
            ->add('status_penugasan', fn ($row) => $row->penugasan ? $row->penugasan->status : null)
            ->add('file_surat')
            ->add('created_at_formatted', fn ($row) => $row->created_at->format('d-m-Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),

            Column::make('Nama Pengirim', 'pengirim')
                ->searchable(),

            Column::make('Nama Penerima', 'penerima')
                ->searchable(),

            Column::make('Jenis Surat', 'jenis_surat')
                ->searchable()
                ->sortable(),

            Column::make('Status', 'status')
                ->sortable(),

            Column::make('Tanggal Dibuat', 'created_at_formatted')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        $pengirimIds = Surat::pluck('pengirim_id')->unique();
        $penerimaIds = Surat::pluck('penerima_id')->unique();

        $pengirimUsers = User::whereIn('id', $pengirimIds)->get();
        $penerimaUsers = User::whereIn('id', $penerimaIds)->get();

        return [
            Filter::select('pengirim', 'pengirim_id')
                ->dataSource($pengirimUsers)
                ->optionLabel('name')
                ->optionValue('id'),
            Filter::select('penerima', 'penerima_id')
                ->dataSource($penerimaUsers)
                ->optionLabel('name')
                ->optionValue('id'),
            // Filter::select('jenis_surat', 'jenis_surat')
            //     ->dataSource(Surat::all()->unique('jenis_surat'))
            //     ->optionLabel('jenis_surat')
            //     ->optionValue('jenis_surat'),
            Filter::select('status', 'status')
                ->dataSource(Surat::all()->unique('status'))
                ->optionLabel('status')
                ->optionValue('status'),
        ];
    }

    public function actions(\App\Models\Surat $row): array
    {
        $actions = [];

        $penugasan = Penugasan::where('surat_id', $row->id)->latest()->first();

        if (auth()->user()->hasRole('Koor TAPM') && auth()->user()->can('penugasan') && (($penugasan && $penugasan->status == 'Ditolak') || $row->status == 'Dikirim')) {
            $actions[] = Button::add('penugasan')
                ->slot(__('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
            </svg>
            '))
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->openModal('penugasan-form', ['surat_id' => $row->id]);
        }

        if (auth()->user()->can('update')) {
            $actions[] = Button::add('edit')
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                ')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->openModal('surat-form', ['rowId' => $row->id]);
        }

        if (auth()->user()->can('delete')) {
            $actions[] = Button::add('delete')
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
                ')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('delete', ['rowId' => $row->id]);
        }

        return $actions;
    }

    public function header(): array
    {
        $header = [];

        if (auth()->user()->can('create')) {
            // if (auth()->user()->hasRole('Operator')) {
            //     $header[] = Button::add('add-surat-masuk')
            //         ->slot(__('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            //         <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
            //         </svg>
            //     '))
            //         ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700 w-full')
            //         ->openModal('surat-form', ['type' => 'Surat Masuk']);
            // }

            $header[] = Button::add('add-surat-keluar')
                ->slot(__('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                </svg>
            '))
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700 w-full')
                ->openModal('surat-form', ['type' => 'Surat Keluar']);
        }

        if (auth()->user()->can('export')) {
            $header[] =
                Button::add('export-pdf')
                ->slot(__('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                </svg>
                '))
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700 w-full')
                ->dispatch('exportPdf', []);
        }

        return $header;
    }

    public function getlisteners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'delete',
                'exportPdf',
                'edit',
                'suratUpdated' => '$refresh',
            ]
        );
    }

    // Function to export PDF using DomPDF
    public function exportPdf()
    {
        $path = public_path() . '/pdf';
        // Mendapatkan datasource
        $datasource = $this->datasource()->get()->map(function ($row) {
            $row->pengirim = $row->pengirim ? $row->pengirim->name : $row->pengirim_eksternal;
            $row->penerima = $row->penerima ? $row->penerima->name : $row->penerima_eksternal;
            return $row;
        });
        // Membuat folder pdf jika belum ada
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        // Membuat file pdf
        $pdf = Pdf::loadView('pdf.surat', ['datasource' => $datasource]);
        // Menyimpan file pdf ke folder pdf
        $pdf->save($path . '/surat.pdf');
        // Menampilkan file pdf
        return response()->download($path . '/surat.pdf');
    }

    // Function to delete data
    public function delete($rowId)
    {
        $surat = Surat::findOrFail($rowId);
        if ($surat->file_surat) {
            Storage::disk('public')->delete('surat/' . $surat->file_surat);
        }

        $surat->delete();

        $this->success('Surat berhasil dihapus');
    }
}
