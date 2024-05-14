<?php

namespace App\Livewire\Units;

use App\Livewire\Forms\UnitForm;
use App\Models\ServiceOffer;
use App\Models\Unit;
use Illuminate\Database\QueryException;
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
    }

    public function save()
    {
        if (is_null($this->service)) {
            $this->dispatch('alert', type: 'error', title: 'Error', message: 'Pilihkan Service terlebih dahulu', position: 'center', timer: 3000, showConfirmButton: true);
            return;
        }

        $service = $this->service;
        $validate = $this->validate();

        try {
            $service->units()->create($validate);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062 && strpos($e->errorInfo[2], 'units.units_serial_unique') !== false) {
                // Handle duplicate serial entry error
                $this->dispatch('alert', type: 'error', title: 'Error', message: 'Serial number sudah Terdaftar!', position: 'center', timer: 5000, showConfirmButton: true);
            } else {
                // Handle other database errors
                $this->dispatch('alert', type: 'error', title: 'Error', message: 'Something went wrong.', position: 'center');
            }
        }

        if ($service) {
            $this->dispatch('alert', type: 'success', title: 'Success', message: 'Unit baru berhasil ditambahkan.', position: 'center', timer: 3000, showConfirmButton: true);
        } else {
            $this->dispatch('alert', type: 'error', title: 'Error', message: 'Something went wrong.', position: 'center');
        }

        $this->form->reset();
    }

    public function render()
    {
        return view('livewire::units.create');
    }
}
