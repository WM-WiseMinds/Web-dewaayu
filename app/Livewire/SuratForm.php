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

    public $user_id, $user, $perihal, $tanggal_kegiatan, $hari, $jam_kegiatan, $lokasi_kegiatan, $id;
    public function render()
    {
        $user = User::all();
        $surat = Surat::all();
        return view('livewire.surat-form', compact('user',  'surat'));
    }

    public function rules(){
        return [
            'user_id' => 'required',
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
        $user = User::all();
        if (!is_null($surat)) {
            $this->surat = $surat;
            $this->user_id = $surat->user_id;
            $this->perihal = $surat->perihal;
            $this->tanggal_kegiatan = $surat->tanggal_kegiatan;
            $this->hari = $surat->hari;
            $this->jam_kegiatan = $surat->jam_kegiatan;
            $this->lokasi_kegiatan = $surat->lokasi_kegiatan;
        }
    }

}

