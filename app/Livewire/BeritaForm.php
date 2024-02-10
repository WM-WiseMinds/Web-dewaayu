<?php

namespace App\Livewire;

use App\Models\Berita;
use App\Models\User;
use Livewire\Component;

class BeritaForm extends Component
{
    public $berita, $id, $judul, $isi, $tanggal, $user_id, $user;


    public function render()
    {
        $user = User::all();
        return view('livewire.berita-form', compact('user_id'));
    }

    public function resetCrateForm()
    {
        $this->judul = '';
        $this->isi = '';
        $this->tanggal = '';
    }

    public function store()
    {
        $this->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);

        Berita::create([
            'judul' => $this->judul,
            'isi' => $this->isi,
            'tanggal' => $this->tanggal,
        ]);

        $this->resetCrateForm();
        $this->emit('beritaStored');
    }

    public function mount($rowId=null)
    {
        $this->berita = new Berita();
        if ($rowId) {
            $this->berita = Berita::find($rowId);
            $this->judul = $this->berita->judul;
            $this->isi = $this->berita->isi;
            $this->tanggal = $this->berita->tanggal;
        }
    }

    
}
