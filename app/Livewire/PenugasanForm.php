<?php

namespace App\Livewire;

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

    public function mount($rowId = null, $surat_id = null)
    {
        $this->penugasan = Penugasan::findOrNew($rowId);
        $this->users = User::role('Anggota TAPM')->get();
        $this->id = $this->penugasan->id;
        $this->user_id = $this->penugasan->user_id;
        $this->surat_id = $rowId ? $this->penugasan->surat_id : $surat_id;
        $this->status = $rowId ? $this->penugasan->status : 'Ditugaskan';

        dump($this->users);
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
        $validatedData = $this->validate();
        $validatedData['status'] = $this->status;

        $this->penugasan = Penugasan::updateOrCreate(['id' => $this->id], $validatedData);

        if ($this->penugasan->wasRecentlyCreated) {
            $surat = Surat::find($this->surat_id);
            $surat->status = 'Dikonfirmasi';
            $surat->save();

            $this->success('Penugasan berhasil ditambahkan');
        } else {
            $this->success('Penugasan berhasil diubah');
        }
        $this->closeModalWithEvents([
            PenugasanTable::class => 'penugasanUpdated',
        ]);

        $this->resetForm();

        redirect()->route('penugasan');
    }
}
