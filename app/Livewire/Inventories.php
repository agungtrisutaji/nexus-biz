<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;

class Inventories extends Component
{


    public function deleteUnit($unitId)
    {
        dump($unitId);
        // Logika untuk menghapus unit dengan ID $unitId
        // Misalnya, menghapus unit dari database dan memperbarui tampilan tabel
        $unit = Unit::findOrFail($unitId);
        $unit->delete();
        $this->loadData();
    }

    public function render()
    {
        return view('livewire::inventories');
    }
}
