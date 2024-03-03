<?php

namespace App\Livewire;

use App\Models\Desa;
use App\Models\Sekretarisdesa;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class SuratForm extends ModalComponent
{
    use Toastable;
    use WithFileUploads;

    public Surat $surat;

    public $id, $users, $desas, $pengirim_id, $penerima_id, $desa_id, $jenis_surat, $pengirim_eksternal, $perihal, $tanggal_kegiatan, $hari, $waktu, $lokasi_kegiatan, $status, $file_surat, $role, $pengirim_name, $penerima_name, $desa_name, $anggota_tapm;

    public function getUserRole()
    {
        if (auth()->user()->hasRole('Sekretaris Desa')) {
            return 'Sekretaris Desa';
        } else if (auth()->user()->hasRole('Operator')) {
            return 'Operator';
        } else if (auth()->user()->hasRole('Koordinator TAPM')) {
            return 'Koordinator TAPM';
        } else if (auth()->user()->hasRole('Anggota TAPM')) {
            return 'Anggota TAPM';
        }

        return null;
    }

    public function mount($rowId = null)
    {
        $this->surat = Surat::findOrNew($rowId);
        $this->users = User::all();
        $this->desas = Desa::all();
        $this->id = $this->surat->id;
        // $this->pengirim_id = $this->surat->pengirim_id;
        // $this->penerima_id = $this->surat->penerima_id;
        // $this->desa_id = $this->surat->desa_id;
        // $this->jenis_surat = $this->surat->jenis_surat;
        // $this->pengirim_eksternal = $this->surat->pengirim_eksternal;
        // $this->perihal = $this->surat->perihal;
        // $this->tanggal_kegiatan = $this->surat->tanggal_kegiatan;
        // $this->hari = $this->surat->hari;
        // $this->waktu = $this->surat->waktu;
        // $this->lokasi_kegiatan = $this->surat->lokasi_kegiatan;
        // $this->status = $this->surat->status;
        // $this->file_surat = $this->surat->file_surat;

        $this->role = $this->getUserRole();

        if ($this->role == 'Sekretaris Desa') {
            $this->pengirim_id = Auth::user()->id;
            $this->pengirim_name = Auth::user()->name;
            $this->desa_id = Auth::user()->desa->id;
            $this->desa_name = Auth::user()->desa->nama_desa;
            $this->anggota_tapm = User::whereHas('roles', function ($query) {
                $query->where('name', 'Anggota TAPM');
            })->get();
            $this->perihal = $this->surat->perihal;
            $this->tanggal_kegiatan = $this->surat->tanggal_kegiatan;
            $this->hari = $this->surat->hari;
            $this->waktu = $this->surat->waktu;
            $this->lokasi_kegiatan = $this->surat->lokasi_kegiatan;
            $this->file_surat = $this->surat->file_surat;

            dump($this->anggota_tapm);
        }
    }

    public function render()
    {
        return view('livewire.surat-form');
    }

    public function resetForm()
    {
        $this->id = '';
        $this->pengirim_id = '';
        $this->penerima_id = '';
        $this->desa_id = '';
        $this->jenis_surat = '';
        $this->pengirim_eksternal = '';
        $this->perihal = '';
        $this->tanggal_kegiatan = '';
        $this->hari = '';
        $this->waktu = '';
        $this->lokasi_kegiatan = '';
        $this->status = '';
        $this->file_surat = '';
    }

    public function rules()
    {
        return [
            'pengirim_id' => 'required|exists:users,id',
            'penerima_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if ($value == $this->pengirim_id) {
                        $fail('Penerima tidak boleh sama dengan pengirim');
                    }
                },
            ],
            'desa_id' => 'required|exists:desa,id',
            'jenis_surat' => 'required',
            'pengirim_eksternal' => 'nullable|string|max:255',
            'perihal' => 'required|string|max:255',
            'tanggal_kegiatan' => 'nullable|date',
            'hari' => 'nullable|string|max:255',
            'waktu' => 'nullable|string|max:255',
            'lokasi_kegiatan' => 'nullable|string|max:255',
            'status' => 'required',
            'file_surat' => 'required|file|mimes:pdf|max:2048',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        dd($validatedData);

        if ($this->file_surat) {
            $originalName = pathinfo($this->file_surat->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $this->file_surat->getClientOriginalExtension();
            $fileName = $originalName . '_' . time() . '.' . $extension;

            if ($this->surat->file_surat) {
                Storage::delete('public/storage/surat/' . $this->surat->file_surat);
            }

            $this->file_surat->storeAs('public/storage/surat', $fileName);
            $validatedData['file_surat'] = $fileName;
        }

        $this->surat = Surat::updateOrCreate(['id' => $this->id], $validatedData);

        $this->closeModalWithEvents([
            SuratTable::class => 'suratUpdated',
        ]);

        $this->success($this->surat->wasRecentlyCreated ? 'Surat berhasil dibuat' : 'Surat berhasil diupdate');

        $this->resetForm();
    }
}
