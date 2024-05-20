<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;

class Detail extends Component
{
    public Unit $unit;
    public $service;

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
        $this->service = $unit->serviceOffer;
    }

    public function back()
    {
        return redirect()->back();
    }
    public function render()
    {
        return view('vendor.livewire.units.detail', [
            'unit' => $this->unit,
            'service' => $this->service
        ]);
    }
}
