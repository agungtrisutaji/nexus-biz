<?php

namespace App\Livewire\Stocks;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Stocks')]


class Index extends Component
{
    public function render()
    {
        return view('livewire::stocks.index');
    }
}
