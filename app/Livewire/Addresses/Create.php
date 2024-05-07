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

        if ($company) {
            $this->dispatch('alert', type: 'success', title: 'Success', message: 'New address added.', position: 'center', timer: 3000, showConfirmButton: false);
        } else {
            $this->dispatch('alert', type: 'error', title: 'Error', message: 'Something went wrong.', position: 'center');
        }

        $this->reset(['name', 'country', 'province', 'city', 'detail', 'zip_code']);
    }

    protected function getMessages()
    {
        return [
            'name.required' => 'Nama alamat harus diisi.',
            'country.required' => 'Negara harus diisi.',
            'province.required' => 'Provinsi harus diisi.',
            'city.required' => 'Kota harus diisi.',
            'detail.required' => 'Detail alamat harus diisi.',
            'zip_code.required' => 'Kode pos harus diisi.',
        ];
    }

    public function render()
    {
        return view('livewire.addresses.create');
    }
}
