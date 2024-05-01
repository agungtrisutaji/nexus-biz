<?php

namespace App\Livewire\Products;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Products')]

class Index extends Component
{
    public function render()
    {
        return view('livewire.products.index');
    }
}
