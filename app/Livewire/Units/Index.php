<?php

namespace App\Livewire\Units;

use App\Models\Unit;

use Livewire\Component;

class Index extends Component
{
    // #[\Livewire\Attributes\On('unitImported')]

    public $editUnit = '';
    public $deleteUnit = '';
    public $detailUnit = '';

    public function editUnit($unitId)
    {
        dump($unitId);
        // Logika untuk mengedit unit dengan ID $unitId
        // Misalnya, redirect ke halaman edit unit
        return redirect()->route('units.edit', $unitId);
    }


    public function detailUnit($unitId)
    {
        dump($unitId);
        // Logika untuk melihat detail unit dengan ID $unitId
        // Misalnya, redirect ke halaman detail unit
        return redirect()->route('units.show', $unitId);
    }


    public function render()
    {
        return view('livewire::units.index', [
            'units' => Unit::query()->with('serviceOffer')->latest()->get(),
            'editUnit' => $this->editUnit,
            'deleteUnit' => $this->deleteUnit,
            'detailUnit' => $this->detailUnit,

        ]);
    }
}
