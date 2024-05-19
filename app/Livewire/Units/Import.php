<?php

namespace App\Livewire\Units;

use App\Imports\UnitImport;
use App\Models\ServiceOffer;
use App\Models\Unit;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use WithFileUploads;
    public $services;
    public $units;
    public $service;
    public $serviceDetail;
    public $selectedService = null;
    public $importFile;
    public $importErrors = [];

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

    public function import()
    {
        $this->validate([
            'selectedService' => 'required',
            'importFile' => 'required|file|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new UnitImport($this->selectedService), $this->importFile);
            session()->flash('success', 'Data unit berhasil diimpor.');
        } catch (\Exception $e) {
            $this->importErrors[] = $e->getMessage();
        }
    }

    public function render()
    {
        return view('vendor.livewire.units.import');
    }
}
