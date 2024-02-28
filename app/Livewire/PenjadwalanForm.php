<?php

namespace App\Livewire;

use App\Models\Penjadwalan;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class PenjadwalanForm extends ModalComponent
{

    public $penjadwalan, $id, $user, $judul_kegiatan, $deskripsi_kegiatan, $tanggal_kegiatan, $lokasi_kegiatan;
    public function render()
    {
        $penjadwalan = Penjadwalan::all();
        $user = User::all();    
        return view('livewire.penjadwalan-form', compact('user', 'penjadwalan'));
    }

    public function createreset()
    {
        $this->id = '';
        $this->user = '';
        $this->judul_kegiatan = '';
        $this->deskripsi_kegiatan = '';
        $this->tanggal_kegiatan = '';
        $this->lokasi_kegiatan = '';
    }

    public function store()
    {
        $this->validate([
            'user' => 'required',
            'judul_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
        ]);
        
        if (!is_null($this->id)) {
            $penjadwalan = Penjadwalan::findOrFail($this->id);
            $penjadwalan->update([
                'user_id' => $this->user,
                'judul_kegiatan' => $this->judul_kegiatan,
                'deskripsi_kegiatan' => $this->deskripsi_kegiatan,
                'tanggal_kegiatan' => $this->tanggal_kegiatan,
                'lokasi_kegiatan' => $this->lokasi_kegiatan,
            ]);
        } else {
            Penjadwalan::create([
                'user_id' => $this->user,
                'judul_kegiatan' => $this->judul_kegiatan,
                'deskripsi_kegiatan' => $this->deskripsi_kegiatan,
                'tanggal_kegiatan' => $this->tanggal_kegiatan,
                'lokasi_kegiatan' => $this->lokasi_kegiatan,
            ]);
        }
    }

    public function mount($id)
    {
        $penjadwalan = Penjadwalan::all();
        $user = User::all();
        if (!is_null($id)) {
            $penjadwalan = Penjadwalan::findOrFail($id);
            $this->id = $id;
            $this->user = $penjadwalan->user_id;
            $this->judul_kegiatan = $penjadwalan->judul_kegiatan;
            $this->deskripsi_kegiatan = $penjadwalan->deskripsi_kegiatan;
            $this->tanggal_kegiatan = $penjadwalan->tanggal_kegiatan;
            $this->lokasi_kegiatan = $penjadwalan->lokasi_kegiatan;
        }
    }
}
