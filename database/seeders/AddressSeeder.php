<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Company;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyNames = [
            'PT. TRAKINDO UTAMA',
            'PT ABM Investama Tbk',
            'PT Mitra Solusi Telematika',
            'PT Chakra Jawara',
            'PT. Macro Trend',
            'PT. Trend Tech'
        ];

        $addresses = [
            [
                'name' => 'Head Office',
                'city' => 'Kariangau',
                'province' => 'Bengkulu',
                'country' => 'Indonesia',
                'detail' => 'Jln. Sultan Hasanuddin RT. 01', 'zip_code' => '76134'
            ],
            [
                'name' => 'Jakarta-Cilandak',
                'city' => 'Jakarta Selatan',
                'province' => 'DKI Jakarta',
                'country' => 'Indonesia',
                'detail' => 'Gedung TMT 1, 8th Fl, Jl. Raya Cilandak KKO No.1, Cilandak Timur, Pasar Minggu',
                'zip_code' => '12560'
            ],
            [
                'name' => 'HQ - Pakuwon Mall Jogja',
                'city' => 'Sleman',
                'province' => 'Daerah Istimewa Yogyakarta',
                'country' => 'Indonesia',
                'detail' => '3rd Floor, Jl. Ring Road Utara, Kaliwaru, Condongcatur, Depok',
                'zip_code' => '55283'
            ],
            [
                'name' => 'Muara Enim',
                'city' => 'Muara Enim',
                'province' => 'Sumatera Selatan',
                'country' => 'Indonesia',
                'detail' => 'Jl Lintas Prabumulih, RT 04 RW 08, Kel. Muara Enim',
                'zip_code' => '31311'
            ],
            [
                'name' => 'Rukan Mahkota Ancol',
                'city' => 'Jakarta Utara',
                'province' => 'DKI Jakarta',
                'country' => 'Indonesia',
                'detail' => 'Jl. RE Martadinata Rukan Mahkota Ancol Blok D No.12 RT.11/RW.11, Ancol, Pademangan Bar., Kec. Pademangan',
                'zip_code' => '14440'
            ],
            [
                'name' => 'Rukan Mahkota Ancol',
                'city' => 'Jakarta Utara',
                'province' => 'DKI Jakarta',
                'country' => 'Indonesia',
                'detail' => 'Jl. RE Martadinata Rukan Mahkota Ancol Blok D No.11 RT.11/RW.11, Ancol, Pademangan Bar., Kec. Pademangan',
                'zip_code' => '14440'
            ]
        ];

        foreach ($addresses as $index => $address) {
            $companyName = $companyNames[$index];
            $company = Company::where('name', $companyName)->first();
            if ($company) {
                $address['company_id'] = $company->id;
                Address::create($address);
            }
        }
    }
}
