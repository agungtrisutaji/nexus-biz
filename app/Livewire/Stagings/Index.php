<?php

namespace App\Livewire\Stagings;

use App\Models\Unit;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire::stagings.index', [
            'units' => Unit::where("status", "Staging")->latest()->get(),
        ]);
    }
}
