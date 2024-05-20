<?php

namespace App\Livewire\Units;

use App\Livewire\Forms\UnitForm;
use App\Models\ServiceOffer;
use App\Models\Unit;
use Livewire\Component;

class Edit extends Component
{
    public UnitForm $form;

    public $services;
    public $unit;
    public $units;
    public $service;
    public $serviceDetail;
    public $selectedService = null;

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
        $this->services = ServiceOffer::all();
        $this->serviceDetail = $unit->serviceOffer();
        $this->selectedService = $unit->serviceOffer->id;
        $this->units = Unit::where("service_offer_id", $this->selectedService)->get();
        $this->service = ServiceOffer::find($this->selectedService);
        // $this->form = UnitForm::make($unit);
    }

    public function updatedSelectedService($service)
    {
        $this->units = Unit::where("service_offer_id", $service)->get();
        $this->service = ServiceOffer::find($service);
    }

    public function render()
    {
        return view('vendor.livewire.units.edit');
    }
}
