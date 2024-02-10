<?php

namespace App\Livewire;

use Livewire\Component;

class OperatorForm extends Component
{
    public $user_id, $nama_lengkap, $no_hp, $alamat;

    public function render()
    {
        

        return view('livewire.operator-form');
    }
}
