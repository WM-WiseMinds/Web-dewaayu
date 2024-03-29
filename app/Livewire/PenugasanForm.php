<?php

namespace App\Livewire;

use App\Models\Penjadwalan;
use App\Models\Penugasan;
use App\Models\Surat;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class PenugasanForm extends ModalComponent
{
    use Toastable;

    public Penugasan $penugasan;
    public $id, $user_id, $surat_id, $status, $users, $surats;
    public $statusOnly = false;

    public function mount($rowId = null, $surat_id = null, $statusOnly = false)
    {
        $this->penugasan = Penugasan::findOrNew($rowId);
        $this->users = User::role('Anggota TAPM')->get();
        $this->id = $this->penugasan->id;
        $this->user_id = $this->penugasan->user_id;
        $this->surat_id = $rowId ? $this->penugasan->surat_id : $surat_id;
        $this->status = $rowId ? $this->penugasan->status : 'Ditugaskan';
        $this->statusOnly = $statusOnly;
    }

    public function render()
    {
        return view('livewire.penugasan-form');
    }

    public function resetForm()
    {
        $this->id = '';
        $this->user_id = '';
        $this->surat_id = '';
        $this->status = '';
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'surat_id' => 'required|exists:surat,id',
            'status' => 'required',
        ];
    }

    public function store()
    {
        if ($this->statusOnly) {
            $this->penugasan = Penugasan::find($this->id);
            $this->penugasan->status = $this->status;
            $this->penugasan->save();

            if ($this->status == 'Disetujui') {
                // Try to find an existing Penjadwalan
                $penjadwalan = Penjadwalan::where('penugasan_id', $this->penugasan->id)->first();

                if ($penjadwalan) {
                    // If it exists, update it
                    $penjadwalan->user_id = $this->penugasan->user_id;
                    $penjadwalan->save();
                } else {
                    // If it doesn't exist, create a new one
                    Penjadwalan::create([
                        'user_id' => $this->penugasan->user_id,
                        'penugasan_id' => $this->penugasan->id,
                    ]);
                }

                redirect()->route('penjadwalan');
                $this->success('Penjadwalan berhasil diperbarui');
            } else {
                Penjadwalan::where('penugasan_id', $this->penugasan->id)->delete();
                $this->success('Penjadwalan berhasil dihapus');
            }
        } else {
            $validatedData = $this->validate();
            $validatedData['status'] = $this->status;

            $surat = Surat::find($this->surat_id);
            $tanggal = $surat->tanggal_kegiatan;
            $hari = $surat->hari;
            $waktu = $surat->waktu;

            // Periksa apakah user yang direkomendasikan sudah memiliki jadwal yang bentrok
            $jadwalBentrok = Penjadwalan::whereHas('penugasan', function ($query) use ($tanggal, $hari, $waktu) {
                $query->whereHas('surat', function ($query) use ($tanggal, $hari, $waktu) {
                    $query->where('tanggal_kegiatan', $tanggal)
                        ->where('hari', $hari)
                        ->where('waktu', $waktu);
                });
            })->where('user_id', $this->user_id)->exists();

            if ($jadwalBentrok) {
                // Tampilkan pesan kesalahan atau lakukan tindakan yang sesuai
                $this->error('User yang direkomendasikan sudah memiliki jadwal pada waktu yang sama.');
                return;
            }

            $this->penugasan = Penugasan::updateOrCreate(['id' => $this->id], $validatedData);

            if ($this->penugasan->wasRecentlyCreated) {
                $this->success('Penugasan berhasil ditambahkan');

                $surat = Surat::find($this->surat_id);
                $surat->status = 'Dikonfirmasi';
                $surat->save();
            } else {
                $this->success('Penugasan berhasil diubah');
            }
        }

        $this->closeModalWithEvents([
            PenugasanTable::class => 'penugasanUpdated',
        ]);

        $this->resetForm();

        if ($this->penugasan->wasRecentlyCreated) {
            redirect()->route('penugasan');
        }
    }
}
