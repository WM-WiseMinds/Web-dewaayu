<?php

namespace App\Livewire;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class BeritaForm extends ModalComponent
{
    use Toastable;
    use WithFileUploads;

    public Berita $berita;
    public $id, $user_id, $user_name, $judul, $deskripsi, $foto, $foto_url;

    public function mount($rowId = null)
    {
        $this->berita = Berita::findOrNew($rowId);
        $this->id = $this->berita->id;
        $this->user_id = $rowId ? $this->berita->user_id : auth()->id();
        $this->user_name = $rowId ? $this->berita->user->name : auth()->user()->name;
        $this->judul = $this->berita->judul;
        $this->deskripsi = $this->berita->deskripsi;
        $this->foto = $this->berita->foto;

        if ($this->foto) {
            $this->foto_url = Storage::disk('public')->url('berita/' . $this->foto);
        }
    }

    public function render()
    {
        return view('livewire.berita-form');
    }

    public function resetForm()
    {
        $this->user_id = '';
        $this->judul = '';
        $this->deskripsi = '';
        $this->foto = '';
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'judul' => 'required|min:3|max:255',
            'deskripsi' => 'required|min:3',
            'foto' => $this->foto instanceof UploadedFile ? ['image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'] : ['nullable'],
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        if ($this->foto instanceof UploadedFile) {
            $originalName = pathinfo($this->foto->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $this->foto->getClientOriginalExtension();
            $filename = $originalName . '-' . time() . '.' . $extension;

            if ($this->foto_url) {
                Storage::disk('public')->delete('berita/' . $this->foto);
            }

            $this->foto->storeAs('public/berita', $filename);
            $validatedData['foto'] = $filename;
        } else {
            $validatedData['foto'] = $this->berita->foto;
        }

        $this->berita = Berita::updateOrCreate(['id' => $this->id], $validatedData);

        $this->success($this->berita->wasRecentlyCreated ? 'Berita berhasil ditambahkan' : 'Berita berhasil diupdate');

        $this->closeModalWithEvents([
            BeritaTable::class => 'beritaUpdated',
            Log::info('Berita berhasil ditambahkan atau diupdate')
        ]);

        $this->resetForm();
    }
}
