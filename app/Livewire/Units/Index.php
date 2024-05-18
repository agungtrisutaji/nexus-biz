<?php

namespace App\Livewire\Units;

use App\Models\Unit;

use Livewire\Component;

class Index extends Component
{
    #[\Livewire\Attributes\On('unitCreated')]
    public function updateList($unit)
    {
    }
    public function render()
    {
        return view('livewire::units.index', [
            'units' => Unit::query()->with('serviceOffer')->latest()->get(),
        ]);
    }
}
