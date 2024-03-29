<?php

namespace App\Livewire;

use App\Models\Desa;
use App\Models\Penjadwalan;
use App\Models\Sekretarisdesa;
use App\Models\Surat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class SuratForm extends ModalComponent
{
    use Toastable;
    use WithFileUploads;

    public Surat $surat;

    public $id, $users, $desas, $pengirim_id, $penerima_id, $desa_id, $rekomendasi_id, $jenis_surat, $pengirim_eksternal, $penerima_eksternal, $perihal, $tanggal_kegiatan, $hari, $waktu, $lokasi_kegiatan, $status, $file_surat, $role, $pengirim_name, $penerima_name, $desa_name, $koordinatorTAPM, $anggota_tapm, $type, $file_url, $sekretarisDesa;
    public $recipientType = 'internal';

    public function getUserRole()
    {
        if (auth()->user()->hasRole('Sekretaris Desa')) {
            return 'Sekretaris Desa';
        } else if (auth()->user()->hasRole('Operator')) {
            return 'Operator';
        } else if (auth()->user()->hasRole('Koor TAPM')) {
            return 'Koor TAPM';
        } else if (auth()->user()->hasRole('Anggota TAPM')) {
            return 'Anggota TAPM';
        }

        return null;
    }

    public function mount($rowId = null, $type = null)
    {
        $this->surat = Surat::findOrNew($rowId);
        $this->users = User::all();
        $this->desas = Desa::all();
        $this->id = $this->surat->id;
        $this->role = $this->getUserRole();

        if ($this->role == 'Sekretaris Desa') {
            $this->pengirim_id = Auth::user()->id;
            $this->pengirim_name = Auth::user()->name;
            $this->desa_id = Auth::user()->desa->id;
            $this->desa_name = Auth::user()->desa->nama_desa;
            $this->rekomendasi_id = $this->surat->rekomendasi_id;
            $this->koordinatorTAPM = User::whereHas('roles', function ($query) {
                $query->where('name', 'Koor TAPM');
            })->first();

            if ($this->koordinatorTAPM) {
                $this->penerima_id = $this->koordinatorTAPM->id;
                $this->penerima_name = $this->koordinatorTAPM->name;
            }
            $this->anggota_tapm = User::whereHas('roles', function ($query) {
                $query->where('name', 'Anggota TAPM');
            })->get();

            $this->pengirim_eksternal = $this->surat->pengirim_eksternal;
            $this->perihal = $this->surat->perihal;
            $this->tanggal_kegiatan = $this->surat->tanggal_kegiatan;
            $this->hari = $this->surat->hari;
            $this->waktu = $this->surat->waktu;
            $this->lokasi_kegiatan = $this->surat->lokasi_kegiatan;
            $this->jenis_surat = $rowId ? $this->surat->jenis_surat : $type;
            $this->status = $rowId ? $this->surat->status : 'Dikirim';
            $this->file_surat = $this->surat->file_surat;
            if ($this->file_surat) {
                $this->file_url = Storage::disk('public')->url('surat/' . $this->file_surat);
            }
        } elseif ($this->role == 'Operator') {
            $this->jenis_surat = $rowId ? $this->surat->jenis_surat : $type;
            $this->perihal = $this->surat->perihal;
            $this->file_surat = $this->surat->file_surat;

            if ($this->file_surat) {
                $this->file_url = Storage::disk('public')->url('surat/' . $this->file_surat);
            }

            if ($this->jenis_surat == 'Surat Masuk') {
                $this->penerima_id = Auth::user()->id;
                $this->penerima_name = Auth::user()->name;
                $this->pengirim_eksternal = $this->surat->pengirim_eksternal;
                $this->status = $rowId ? $this->surat->status : 'Diterima';
            } elseif ($this->jenis_surat == 'Surat Keluar') {
                $this->pengirim_id = Auth::user()->id;
                $this->pengirim_name = Auth::user()->name;
                $this->status = $rowId ? $this->surat->status : 'Dikirim';
                if (!is_null($this->surat->penerima_eksternal)) {
                    $this->recipientType = 'external';
                    $this->penerima_eksternal = $this->surat->penerima_eksternal;
                } else {
                    $this->recipientType = 'internal';
                    $this->desa_id = $this->surat->desa_id;
                    $this->rekomendasi_id = $this->surat->rekomendasi_id;
                    $this->koordinatorTAPM = User::whereHas('roles', function ($query) {
                        $query->where('name', 'Koor TAPM');
                    })->first();
                    if ($this->koordinatorTAPM) {
                        $this->penerima_id = $this->koordinatorTAPM->id;
                        $this->penerima_name = $this->koordinatorTAPM->name;
                    }

                    $this->anggota_tapm = User::whereHas(
                        'roles',
                        function ($query) {
                            $query->where('name', 'Anggota TAPM');
                        }
                    )->get();

                    $this->tanggal_kegiatan = $this->surat->tanggal_kegiatan;
                    $this->hari = $this->surat->hari;
                    $this->waktu = $this->surat->waktu;
                    $this->lokasi_kegiatan = $this->surat->lokasi_kegiatan;
                }
            }
        } elseif ($this->role == 'Koor TAPM') {
            $this->pengirim_id = Auth::user()->id;
            $this->pengirim_name = Auth::user()->name;
            $this->desa_id = $this->surat->desa_id;
            $this->penerima_id = $rowId ? $this->surat->penerima->id : '';
            $this->penerima_name = $rowId ? $this->surat->penerima->name : '';
            $this->rekomendasi_id = $this->surat->rekomendasi_id;
            $this->perihal = $this->surat->perihal;
            $this->tanggal_kegiatan = $this->surat->tanggal_kegiatan;
            $this->hari = $this->surat->hari;
            $this->waktu = $this->surat->waktu;
            $this->lokasi_kegiatan = $this->surat->lokasi_kegiatan;
            $this->jenis_surat = $rowId ? $this->surat->jenis_surat : $type;
            $this->status = $rowId ? $this->surat->status : 'Dikirim';
            $this->sekretarisDesa = User::whereHas('roles', function ($query) {
                $query->where('name', 'Sekretaris Desa');
            })->get();

            $this->anggota_tapm = User::whereHas('roles', function ($query) {
                $query->where('name', 'Anggota TAPM');
            })->get();

            $this->file_surat = $this->surat->file_surat;
            if ($this->file_surat) {
                $this->file_url = Storage::disk('public')->url('surat/' . $this->file_surat);
            }
        }
    }

    public function render()
    {
        return view('livewire.surat-form');
    }

    public function resetForm()
    {
        $this->id = '';
        $this->pengirim_id = '';
        $this->penerima_id = '';
        $this->rekomendasi_id = '';
        $this->desa_id = '';
        $this->jenis_surat = '';
        $this->pengirim_eksternal = '';
        $this->penerima_eksternal = '';
        $this->perihal = '';
        $this->tanggal_kegiatan = '';
        $this->hari = '';
        $this->waktu = '';
        $this->lokasi_kegiatan = '';
        $this->status = '';
        $this->file_surat = '';
    }

    public function rules()
    {
        return [
            'pengirim_id' => 'nullable|exists:users,id',
            'rekomendasi_id' => $this->jenis_surat == 'Surat Keluar' && $this->recipientType == 'internal' ? 'required' : 'nullable',
            'penerima_id' => [
                $this->jenis_surat == 'Surat Masuk' || ($this->jenis_surat == 'Surat Keluar' && $this->recipientType == 'internal') ? 'required' : 'nullable',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if ($value == $this->pengirim_id) {
                        $fail('Penerima tidak boleh sama dengan pengirim');
                    }
                },
            ],
            'desa_id' => 'nullable|exists:desa,id',
            'jenis_surat' => 'required',
            'pengirim_eksternal' => 'nullable|string|max:255',
            'penerima_eksternal' => $this->jenis_surat == 'Surat Keluar' && $this->recipientType == 'external' ? 'required|string|max:255' : 'nullable',
            'perihal' => 'required|string|max:255',
            'tanggal_kegiatan' => 'nullable|date',
            'hari' => 'nullable|string|max:255',
            'waktu' => 'nullable|string|max:255',
            'lokasi_kegiatan' => 'nullable|string|max:255',
            'status' => 'required',
            'file_surat' => $this->file_surat instanceof UploadedFile ? ['file', 'mimes:pdf', 'max:2048'] : ['nullable'],
        ];
    }

    public function store()
    {
        $jadwalBentrok = $this->checkJadwalBentrok(
            $this->rekomendasi_id,
            $this->tanggal_kegiatan,
            $this->hari,
            $this->waktu
        );

        if ($jadwalBentrok) {
            $this->error('User yang direkomendasikan sudah memiliki jadwal pada waktu yang sama.');
            return;
        }

        $validatedData = $this->validate();
        $validatedData['status'] = $this->status;

        if ($this->file_surat instanceof UploadedFile) {
            $originalName = pathinfo($this->file_surat->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $this->file_surat->getClientOriginalExtension();
            $fileName = $originalName . '_' . time() . '.' . $extension;

            if ($this->surat->file_surat) {
                Storage::delete('public/surat/' . $this->surat->file_surat);
            }

            $this->file_surat->storeAs('public/surat', $fileName);
            $validatedData['file_surat'] = $fileName;
        } else {
            $validatedData['file_surat'] = $this->surat->file_surat;
        }

        $this->surat = Surat::updateOrCreate(['id' => $this->id], $validatedData);

        $this->success($this->surat->wasRecentlyCreated ? 'Surat berhasil dibuat' : 'Surat berhasil diupdate');
        $this->closeModalWithEvents([
            SuratTable::class => 'suratUpdated',
            SuratMasukTable::class => 'suratUpdated',
        ]);


        $this->resetForm();
    }

    public function updateRecipientType()
    {
        if ($this->recipientType == 'external') {
            $this->penerima_name = null;
            $this->penerima_id = null;
        }

        Log::info('Jenis Penerima: ' . $this->recipientType);
    }

    public function updatePenerima()
    {
        if (auth()->user()->hasRole('Koor TAPM')) {
            $sekretarisDesa = User::whereHas('roles', function ($query) {
                $query->where('name', 'Sekretaris Desa');
            })->whereHas('desa', function ($query) {
                $query->where('id', $this->desa_id);
            })->first();

            if ($sekretarisDesa) {
                $this->penerima_id = $sekretarisDesa->id;
                $this->penerima_name = $sekretarisDesa->name;
            }
        }
    }

    public function updateHari()
    {
        $date = Carbon::parse($this->tanggal_kegiatan);
        $this->hari = $date->isoFormat('dddd');
    }

    public function checkJadwalBentrok($userId, $tanggal, $hari, $waktu)
    {
        $jadwalBentrok = Penjadwalan::whereHas('penugasan', function ($query) use ($tanggal, $hari, $waktu) {
            $query->whereHas('surat', function ($query) use ($tanggal, $hari, $waktu) {
                $query->where('tanggal_kegiatan', $tanggal)
                    ->where('hari', $hari)
                    ->where('waktu', $waktu);
            });
        })->where('user_id', $userId)->exists();

        return $jadwalBentrok;
    }
}
