<?php

namespace App\Livewire;

use App\Models\Sekretarisdesa;
use App\Models\Surat;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class SuratForm extends ModalComponent
{
    public Surat $surat;

    public $user_id, $user, $sekretarisdesa,  $sekretarisdesa_id, $perihal, $tanggal_kegiatan, $hari, $jam_kegiatan, $lokasi_kegiatan, $id;
    public function render()
    {
        $user = User::all();
        $sekretarisdesa = Sekretarisdesa::all();
        $surat = Surat::all();
        return view('livewire.surat-form', compact('user', 'sekretarisdesa', 'surat'));
    }

    public function rules(){
        return [
            'user_id' => 'required',
            'sekretarisdesa_id' => 'required',
            'perihal' => 'required',
            'tanggal_kegiatan' => 'required',
            'hari' => 'required',
            'jam_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
        ];
        
    }
    public function resetcreate()
    {
        $this->user_id = '';
        $this->sekretarisdesa_id = '';
        $this->perihal = '';
        $this->tanggal_kegiatan = '';
        $this->hari = '';
        $this->jam_kegiatan = '';
        $this->lokasi_kegiatan = '';
    }

    public function store()
    {
        $this->validate([
            'user_id' => 'required',
            'sekretarisdesa_id' => 'required',
            'perihal' => 'required',
            'tanggal_kegiatan' => 'required',
            'hari' => 'required',
            'jam_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
        ]);
    }

    public function save()
    {
        $this->validate();
        $this->surat->save();
        $this->emit('suratStored', $this->surat);
        $this->closeModal();
    }

    public function mount(Surat $surat)
    {
        if ($surat->exists) {
            $this->surat = $surat;
            $this->user_id = $surat->user_id;
            $this->sekretarisdesa_id = $surat->sekretarisdesa_id;
            $this->perihal = $surat->perihal;
            $this->tanggal_kegiatan = $surat->tanggal_kegiatan;
            $this->hari = $surat->hari;
            $this->jam_kegiatan = $surat->jam_kegiatan;
            $this->lokasi_kegiatan = $surat->lokasi_kegiatan;
        }
    }

}

