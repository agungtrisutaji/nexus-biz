<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Address;
use Livewire\Component;

class Partnership extends Component
{
    public $companies;
    public $addresses;
    public $newAddress = [];

    public $selectedCompany = null;

    public function mount()
    {
        $this->companies = Company::all();
    }

    public function updatedSelectedCompany($company)
    {
        $this->addresses = Address::where("company_id", $company)->get();
    }

    public function addAddress($company)
    {
        $this->validate([
            'newAddress.name' => 'required',
            'newAddress.detail' => 'required',
            'newAddress.country' => 'required',
            'newAddress.province' => 'required',
            'newAddress.city' => 'required',
            'newAddress.zip' => 'required',
        ]);

        Address::create([
            'company_id' => $this->selectedCompany,
            'name' => $this->newAddress['name'],
            'detail' => $this->newAddress['detail'],
            'country' => $this->newAddress['country'],
            'province' => $this->newAddress['province'],
            'city' => $this->newAddress['city'],
            'zip' => $this->newAddress['zip'],
        ]);


        $this->addresses = Address::where("company_id", $this->selectedCompany)->get();
        $this->newAddress = []; // Reset form fields
    }

    public function render()
    {
        return view('livewire::partnership');
    }
}
