<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;

class Row extends Component
{
    public Unit $unit;
    public function render()
    {
        return view('vendor.livewire.units.row');
    }
}
