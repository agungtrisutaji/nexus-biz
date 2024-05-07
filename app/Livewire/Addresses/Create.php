<?php

namespace App\Livewire\Addresses;

use App\Livewire\Forms\AddressForm;
use App\Models\Address;
use App\Models\Company;
use Livewire\Component;

class Create extends Component
{
    public AddressForm $form;
    public $companies;
    public $addresses;
    public $company;

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
        if (is_null($this->company)) {
            $this->dispatch('alert', type: 'error', title: 'Error', message: 'Pilihkan perusahaan terlebih dahulu', position: 'center', timer: 3000, showConfirmButton: true);
            return;
        }

        $company = $this->company;
        $validate = $this->validate();

        $company->addresses()->create($validate);

        if ($company) {
            $this->dispatch('alert', type: 'success', title: 'Success', message: 'New address added.', position: 'center', timer: 1500, showConfirmButton: false);
        } else {
            $this->dispatch('alert', type: 'error', title: 'Error', message: 'Something went wrong.', position: 'center');
        }

        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.addresses.create');
    }
}
