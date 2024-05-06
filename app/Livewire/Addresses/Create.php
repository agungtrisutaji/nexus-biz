<?php

namespace App\Livewire\Addresses;

use App\Models\Address;
use App\Models\Company;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    public $companies;
    public $addresses;
    public $company;

    #[Rule(["required"])]
    public string $name = "";
    #[Rule(["required"])]
    public string $country = "";
    #[Rule(["required"])]
    public string $province = "";
    #[Rule(["required"])]
    public string $city = "";
    #[Rule(["required"])]
    public string $detail = "";
    #[Rule(["required"])]
    public string $zip_code = "";


    public $selectedCompany = null;

    public function mount()
    {
        $this->companies = Company::all();
    }

    public function updatedSelectedCompany($company)
    {
        $this->addresses = Address::where("company_id", $company)->get();
        $this->company = Company::find($company);
    }

    public function save()
    {
        $company = $this->company;
        $validate = $this->validate();

        $company->addresses()->create($validate);
        $this->reset(['name', 'country', 'province', 'city', 'detail', 'zip_code']);
    }

    public function render()
    {
        return view('livewire.addresses.create');
    }
}
