<?php

namespace App\Livewire;

use App\Models\Berita;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class BeritaForm extends ModalComponent
{
    public $berita, $id, $user, $judul_berita, $deskripsi_berita, $foto, $no_berita;


    public function render()
    {
        $berita = Berita::all();
        $user = User::all();
        return view('livewire.berita-form', compact('user', 'berita'));
    }

    public function createreset()
    {
        $this->id = '';
        $this->user = '';
        $this->judul_berita = '';
        $this->deskripsi_berita = '';
        $this->foto = '';
        $this->no_berita = '';
    }

    public function store()
    {
        $this->validate([
            'user' => 'required',
            'judul_berita' => 'required',
            'deskripsi_berita' => 'required',
            'foto' => 'required',
            'no_berita' => 'required',
        ]);
        
        if (!is_null($this->id)) {
            $berita = Berita::findOrFail($this->id);
            $berita->update([
                'user_id' => $this->user,
                'judul_berita' => $this->judul_berita,
                'deskripsi_berita' => $this->deskripsi_berita,
                'foto' => $this->foto,
                'no_berita' => $this->no_berita,
            ]);
        } else {
            Berita::create([
                'user_id' => $this->user,
                'judul_berita' => $this->judul_berita,
                'deskripsi_berita' => $this->deskripsi_berita,
                'foto' => $this->foto,
                'no_berita' => $this->no_berita,
            ]);
        }
    }

    public function mount($id)
    {
        $berita = Berita::all();
        $user = User::all();    
        if (!is_null($id)) {
            $berita = Berita::findOrFail($id);
            $this->id = $id;
            $this->user = $berita->user_id;
            $this->judul_berita = $berita->judul_berita;
            $this->deskripsi_berita = $berita->deskripsi_berita;
            $this->foto = $berita->foto;
            $this->no_berita = $berita->no_berita;
        }
    }

}
