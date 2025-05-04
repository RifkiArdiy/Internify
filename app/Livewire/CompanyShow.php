<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;

class CompanyShow extends Component
{
    public $company;

    public function mount($id)
    {
        $this->company = Company::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.company-show');
    }
}
