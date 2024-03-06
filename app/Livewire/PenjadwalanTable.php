<?php

namespace App\Livewire;

use App\Models\Desa;
use App\Models\Penjadwalan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Detail;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class PenjadwalanTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        $setUp = [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            Detail::make()
                ->showCollapseIcon()
                ->view('details.penjadwalan-detail'),
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
        $query = Penjadwalan::query()->with(['user', 'penugasan', 'penugasan.surat', 'penugasan.surat.desa']);

        // Get the currently logged-in user
        $user = auth()->user();

        // Check the role of the user and modify the query accordingly
        if ($user->hasRole('Sekretaris Desa')) {
            // If the user is a Sekretaris Desa, only show penjadwalan related to their Desa
            $query->whereHas('penugasan.surat', function ($query) use ($user) {
                $query->where('desa_id', $user->desa->id);
            });
        } elseif ($user->hasRole('Anggota TAPM')) {
            // If the user is an Anggota TAPM, only show penjadwalan related to their user_id
            $query->where('user_id', $user->id);
        }

        // If the user is an Operator or Koor TAPM, no additional filtering is needed

        return $query;
    }

    public function relationSearch(): array
    {
        return [
            'user' => ['name'],
            'penugasan.surat.desa' => ['nama_desa'],
            'penugasan.surat' => ['tanggal_kegiatan', 'lokasi_kegiatan'],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()

            ->add('id')
            ->add('user_id')
            ->add('penugasan_id')
            ->add('penugasan.surat.desa_id')
            ->add('name', fn ($row) => $row->user->name)
            ->add('no_hp', fn ($row) => $row->user->no_hp)
            ->add('tanggal_kegiatan', fn ($row) => Carbon::parse($row->penugasan->surat->tanggal_kegiatan)->format('d-m-Y'))
            ->add('waktu_kegiatan', fn ($row) => $row->penugasan->surat->waktu)
            ->add('lokasi_kegiatan', fn ($row) => $row->penugasan->surat->lokasi_kegiatan)
            ->add('nama_desa', fn ($row) => $row->penugasan->surat->desa->nama_desa)
            ->add('created_at_formatted', fn ($row) => $row->created_at->format('d-m-Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->searchable()
                ->sortable(),

            Column::make('Nama', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Tanggal Kegiatan', 'tanggal_kegiatan')
                ->searchable(),

            Column::make('Lokasi Kegiatan', 'lokasi_kegiatan')
                ->searchable(),

            Column::make('Nama Desa', 'nama_desa')
                ->searchable(),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::select('name', 'user_id')
                ->dataSource(User::role('Anggota TAPM')->get())
                ->optionLabel('name')
                ->optionValue('id'),
        ];
    }

    public function header(): array
    {
        $header = [];

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
                'penjadwalan-updated' => '$refresh',
            ]
        );
    }

    // Function to export PDF using DomPDF
    public function exportPdf()
    {
        $path = public_path() . '/pdf';
        // Mendapatkan datasource
        $datasource = $this->datasource()->get();
        // Membuat folder pdf jika belum ada
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        // Membuat file pdf
        $pdf = Pdf::loadView('pdf.penjadwalan', ['datasource' => $datasource]);
        // Menyimpan file pdf ke folder pdf
        $pdf->save($path . '/penjadwalan.pdf');
        // Menampilkan file pdf
        return response()->download($path . '/penjadwalan.pdf');
    }

    // Function to delete data
    public function delete($rowId)
    {
        $penjadwalan = Penjadwalan::findOrFail($rowId);
        // Detach all associated users
        $penjadwalan->user()->detach();
        $penjadwalan->delete();
    }
}
