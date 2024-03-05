<?php

namespace App\Livewire;

use App\Models\Penjadwalan;
use App\Models\Penugasan;
use App\Models\Surat;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class PenugasanForm extends ModalComponent
{
    use Toastable;

    public Penugasan $penugasan;
    public $id, $user_id, $surat_id, $status, $users, $surats;
    public $statusOnly = false;

    public function mount($rowId = null, $surat_id = null, $statusOnly = false)
    {
        $this->penugasan = Penugasan::findOrNew($rowId);
        $this->users = User::role('Anggota TAPM')->get();
        $this->id = $this->penugasan->id;
        $this->user_id = $this->penugasan->user_id;
        $this->surat_id = $rowId ? $this->penugasan->surat_id : $surat_id;
        $this->status = $rowId ? $this->penugasan->status : 'Ditugaskan';
        $this->statusOnly = $statusOnly;
    }

    public function render()
    {
        return view('livewire.penugasan-form');
    }

    public function resetForm()
    {
        $this->id = '';
        $this->user_id = '';
        $this->surat_id = '';
        $this->status = '';
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'surat_id' => 'required|exists:surat,id',
            'status' => 'required',
        ];
    }

    public function store()
    {
        if ($this->statusOnly) {
            $this->penugasan = Penugasan::find($this->id);
            $this->penugasan->status = $this->status;
            $this->penugasan->save();

            if ($this->status == 'Disetujui') {
                Penjadwalan::create([
                    'user_id' => $this->penugasan->user_id,
                    'penugasan_id' => $this->penugasan->id,
                ]);

                redirect()->route('penjadwalan');

                $this->success('Penjadwalan berhasil ditambahkan');
            } else {
                Penjadwalan::where('penugasan_id', $this->penugasan->id)->delete();

                $this->success('Penjadwalan berhasil dihapus');
            }
            $this->success('Status penugasan berhasil diubah');
        } else {
            $validatedData = $this->validate();
            $validatedData['status'] = $this->status;

            $this->penugasan = Penugasan::updateOrCreate(['id' => $this->id], $validatedData);

            if ($this->penugasan->wasRecentlyCreated) {
                $this->success('Penugasan berhasil ditambahkan');

                $surat = Surat::find($this->surat_id);
                $surat->status = 'Dikonfirmasi';
                $surat->save();
            } else {
                $this->success('Penugasan berhasil diubah');
            }
        }

        $this->closeModalWithEvents([
            PenugasanTable::class => 'penugasanUpdated',
        ]);

        $this->resetForm();

        if ($this->penugasan->wasRecentlyCreated) {
            redirect()->route('penugasan');
        }
    }
}
