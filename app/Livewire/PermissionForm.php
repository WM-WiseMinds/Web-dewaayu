<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;
use Spatie\Permission\Models\Permission;

class PermissionForm extends ModalComponent
{
    use Toastable;

    public $permissions, $id, $name;

    public function mount($rowId = null)
    {
        $this->permissions = Permission::all();
        if ($rowId) {
            $this->id = $rowId;
            $this->name = Permission::find($rowId)->name;
        }
    }

    public function render()
    {
        return view('livewire.permission-form');
    }

    public function resetForm()
    {
        $this->id = null;
        $this->name = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:permissions,name,' . $this->id,
        ]);

        $permissions = Permission::updateOrCreate(['id' => $this->id], ['name' => $this->name]);

        $this->closeModalWithEvents([
            PermissionTable::class => 'permissionUpdated',
        ]);

        $this->success($permissions->wasRecentlyCreated ? 'Permission berhasil dibuat' : 'Permission berhasil diupdate');

        $this->resetForm();
    }
}
