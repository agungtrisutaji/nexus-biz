<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class UnitForm extends Form
{
    #[Rule(["required"])]
    public string $serial = "";

    protected function getMessages()
    {
        return [
            'serial.required' => 'Serial Number harus diisi.',
        ];
    }
}
