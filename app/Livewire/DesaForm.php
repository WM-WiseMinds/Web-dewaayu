<?php

namespace App\Livewire;

use App\Models\Desa;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class DesaForm extends ModalComponent
{
    use Toastable;

    public Desa $desa;
    public $id, $nama_desa, $user_id, $users;

    public function mount($rowId = null)
    {
        $this->desa = Desa::findOrNew($rowId);
        $this->id = $this->desa->id;
        $this->users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Sekretaris Desa');
        })->get();
        $this->user_id = $this->desa->user_id;
        $this->nama_desa = $this->desa->nama_desa;
    }

    public function render()
    {
        return view('livewire.desa-form');
    }

    public function resetForm()
    {
        $this->id = '';
        $this->nama_desa = '';
        $this->user_id = '';
    }

    public function rules()
    {
        return [
            'nama_desa' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();
        $this->desa = Desa::updateOrCreate(['id' => $this->id], $validatedData);

        $this->success($this->desa->wasRecentlyCreated ? 'Desa berhasil disimpan' : 'Desa berhasil diubah');

        $this->closeModalWithEvents([
            DesaTable::class => 'desaUpdated',
        ]);

        $this->resetForm();
    }
}
