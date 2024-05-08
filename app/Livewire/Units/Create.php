<?php

namespace App\Livewire\Units;

use App\Livewire\Forms\UnitForm;
use App\Models\ServiceOffer;
use App\Models\Unit;
use Livewire\Component;

class Create extends Component
{
    public UnitForm $form;

    public $services;
    public $units;
    public $service;
    public $serviceDetail;
    public $selectedService = null;

    public function mount()
    {
        $this->services = ServiceOffer::all();
    }

    public function updatedSelectedService($service)
    {
        $this->units = Unit::where("service_offer_id", $service)->get();
        $this->service = ServiceOffer::find($service);
        $this->serviceDetail = ServiceOffer::where("id", $service)->get();
        // dd($this->serviceDetail);
    }

    public function save()
    {
        if (is_null($this->service)) {
            $this->dispatch('alert', type: 'error', title: 'Error', message: 'Pilihkan Service terlebih dahulu', position: 'center', timer: 3000, showConfirmButton: true);
            return;
        }

        $service = $this->service;
        $validate = $this->validate();

        $service->units()->create($validate);

        if ($service) {
            $this->dispatch('alert', type: 'success', title: 'Success', message: 'Unit baru berhasil ditambahkan.', position: 'center', timer: 1500, showConfirmButton: false);
        } else {
            $this->dispatch('alert', type: 'error', title: 'Error', message: 'Something went wrong.', position: 'center');
        }

        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.units.create');
    }
}
