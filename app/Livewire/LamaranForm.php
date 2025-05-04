<?php

namespace App\Http\Livewire;

use App\Models\MagangApplication;
use Livewire\Component;

class LamaranForm extends Component
{
    public $mahasiswa_id;
    public $lowongan_id;
    public $status = 'pending'; // default

    protected $rules = [
        'mahasiswa_id' => 'required|exists:mahasiswas,mahasiswa_id',
        'lowongan_id' => 'required|exists:lowongan_magangs,lowongan_id',
    ];

    public function submit()
    {
        $this->validate();

        MagangApplication::create([
            'mahasiswa_id' => $this->mahasiswa_id,
            'lowongan_id' => $this->lowongan_id,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Lamaran berhasil dikirim!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.lamaran-form', [
            'lowongans' => \App\Models\LowonganMagang::all()
        ]);
    }
}
