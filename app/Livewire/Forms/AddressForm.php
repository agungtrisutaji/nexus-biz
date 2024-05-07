<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class AddressForm extends Form
{
    #[Rule(["required"])]
    public string $name = "";
    #[Rule(["required"])]
    public string $country = "";
    #[Rule(["required"])]
    public string $province = "";
    #[Rule(["required"])]
    public string $city = "";
    #[Rule(["required"])]
    public string $detail = "";
    #[Rule(["required"])]
    public string $zip = "";

    protected function getMessages()
    {
        return [
            'name.required' => 'Nama alamat harus diisi.',
            'country.required' => 'Negara harus diisi.',
            'province.required' => 'Provinsi harus diisi.',
            'city.required' => 'Kota harus diisi.',
            'detail.required' => 'Detail alamat harus diisi.',
            'zip.required' => 'Kode pos harus diisi.',
        ];
    }
}
