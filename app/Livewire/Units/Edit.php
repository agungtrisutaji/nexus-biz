<?php

namespace App\Livewire\Units;

use App\Models\ServiceOffer;
use App\Models\Unit;
use Livewire\Component;

class Edit extends Component
{
    public $unit;
    public $serial;
    public $serviceOffer;

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
        $this->serial = $unit->serial;
        $this->serviceOffer = $unit->service_offer_id;
    }

    public function updateUnit()
    {
        $validated = $this->validate([
            'serial' => 'required',
            'serviceOffer' => 'required',
        ]);
        $this->unit->update($validated);

        $this->dispatchBrowserEvent('unitUpdated', ['message' => 'Unit berhasil diperbarui.']);

        return redirect()->route('units.index');
    }

    public function render()
    {
        return view('vendor.livewire.units.edit', ['unit' => $this->unit]);
    }
}
