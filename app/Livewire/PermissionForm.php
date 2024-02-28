<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;
use Spatie\Permission\Models\Permission;

class PermissionForm extends ModalComponent
{
    use Toastable;

    public Permission $permission;

    public $id, $name;

    public function mount($rowId = null)
    {
        $this->permission = new Permission();
        if ($rowId) {
            $this->permission = $this->permission->find($rowId);
            $this->id = $this->permission->id;
            $this->name = $this->permission->name;
        }
    }

    public function render()
    {
        return view('livewire.permission-form');
    }

    public function resetForm()
    {
        $this->id = '';
        $this->name = '';
    }

    protected $rules = [
        'name' => 'required|string|max:255|unique:permissions,name',
    ];

    public function store()
    {
        $validatedData = $this->validate();

        $this->permission->fill($validatedData);
        $this->permission->save();

        $this->closeModalWithEvents([
            PermissionTable::class => 'permissionUpdated',
        ]);

        $this->success($this->permission->wasRecentlyCreated ? 'Permission berhasil dibuat' : 'Permission berhasil diupdate');

        $this->resetForm();
    }
}
