<?php

namespace App\Livewire;

use App\Models\Desa;
use App\Models\Sekretarisdesa;
use App\Models\Surat;
use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class SuratForm extends ModalComponent
{
    use Toastable;
    use WithFileUploads;

    public Surat $surat;

    public $id, $users, $desas, $user_id, $desa_id, $jenis_surat, $pengirim, $perihal, $tanggal_kegiatan, $hari, $waktu, $lokasi_kegiatan, $status, $file_surat;

    public function mount($rowId = null)
    {
        $this->surat = Surat::findOrNew($rowId);
        $this->users = User::all();
        $this->desas = Desa::all();
        $this->id = $this->surat->id;
        $this->user_id = $this->surat->user_id;
        $this->desa_id = $this->surat->desa_id;
        $this->jenis_surat = $this->surat->jenis_surat;
        $this->pengirim = $this->surat->pengirim;
        $this->perihal = $this->surat->perihal;
        $this->tanggal_kegiatan = $this->surat->tanggal_kegiatan;
        $this->hari = $this->surat->hari;
        $this->waktu = $this->surat->waktu;
        $this->lokasi_kegiatan = $this->surat->lokasi_kegiatan;
        $this->status = $this->surat->status;
        $this->file_surat = $this->surat->file_surat;
    }

    public function render()
    {
        return view('livewire.surat-form');
    }

    public function resetForm()
    {
        $this->id = '';
        $this->user_id = '';
        $this->desa_id = '';
        $this->jenis_surat = '';
        $this->pengirim = '';
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
            'user_id' => 'required|exists:users,id',
            'desa_id' => 'required|exists:desa,id',
            'jenis_surat' => 'required',
            'pengirim' => 'nullable|string|max:255',
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
