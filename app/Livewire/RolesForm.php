<?php

namespace App\Livewire;

use App\Models\Permissions;
use App\Models\Roles;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesForm extends ModalComponent
{
    use Toastable;

    public Role $role;
    public $id, $name, $permissions;
    public $permissions_list = [];

    public function mount($rowId = null)
    {
        $this->role = Role::findOrNew($rowId);
        $this->id = $this->role->id;
        $this->name = $this->role->name;
        $this->permissions = Permission::all();
        $this->permissions_list = $this->role->permissions->pluck('name')->toArray();
    }

    public function render()
    {
        return view('livewire.roles-form');
    }

    public function resetForm()
    {
        $this->id = '';
        $this->name = '';
        $this->permissions_list = [];
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:roles,name,' . $this->role->id,
            'permissions_list' => 'required|array|min:1',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['guard_name'] = 'web';

        $this->role = Role::updateOrCreate(['id' => $this->id], $validatedData);

        $this->role->syncPermissions($this->permissions_list);

        $this->closeModalWithEvents([
            RolesTable::class => 'roleUpdated',
        ]);

        $this->success($this->role->wasRecentlyCreated ? 'Role berhasil dibuat' : 'Role berhasil diupdate');

        $this->resetForm();
    }
}
