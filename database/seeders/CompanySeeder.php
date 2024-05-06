<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            ['name' => 'PT. TRAKINDO UTAMA'],
            ['name' => 'PT ABM Investama Tbk'],
            ['name' => 'PT Mitra Solusi Telematika'],
            ['name' => 'PT Chakra Jawara'],
            ['name' => 'PT. Macro Trend'],
            ['name' => 'PT. Trend Tech'],
        ];

        $parentId = null;

        foreach ($companies as $company) {
            $createdCompany = Company::create($company);

            // Save the ID of 'PT. Macro Trend' to use as parent_id
            if ($company['name'] === 'PT. Macro Trend') {
                $parentId = $createdCompany->id;
            }

            // Set parent_id for 'PT. Trend Tech'
            if ($company['name'] === 'PT. Trend Tech' && $parentId !== null) {
                $createdCompany->parent_id = $parentId;
                $createdCompany->save();
            }
        }
    }
}
