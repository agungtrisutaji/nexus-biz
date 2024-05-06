<?php

namespace Database\Seeders;

use App\Models\ServiceOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $services = [
            [
                'class' => 'Laptop General V.10',
                'brand' => 'HP',
                'model' => 'Probook 440 G9',
                'cpu' => 'i5-1235U',
                'ram' => 16,
                'ssd' => 512,
                'vga' => 'Intel Iris Xe Graphics',
                'display' => '14.0" FHD',
                'battery' => '3 Cell, 42 Wh',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'Laptop General ET Tools V.09',
                'brand' => 'HP',
                'model' => 'Probook 440 G9',
                'cpu' => 'i5-1235U',
                'ram' => 16,
                'ssd' => 512,
                'vga' => 'Intel Iris Xe Graphics',
                'display' => '14.0" FHD',
                'battery' => '3 Cell, 42 Wh',
                'os' => 'Windows 10 Pro x64',
            ],
            [
                'class' => 'Laptop Executive V.10',
                'brand' => 'HP',
                'model' => 'EliteBook 630 G9',
                'cpu' => 'i5-1235U',
                'ram' => 16,
                'ssd' => 512,
                'vga' => 'Intel Integrated Graphics',
                'display' => '13.3" FHD',
                'battery' => '3 Cell, 42 Wh',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'Laptop Performance V.10',
                'brand' => 'HP',
                'model' => 'Zbook Power G9',
                'cpu' => 'i7-12800H',
                'ram' => 32,
                'ssd' => 1000,
                'vga' => 'NVIDIA T600 Laptop 4GB',
                'display' => '15.6" FHD',
                'battery' => '6 Cell, 83 Wh',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'Laptop Performance V.10 (New)',
                'brand' => 'HP',
                'model' => 'Zbook Power G10',
                'cpu' => 'i7-13800H',
                'ram' => 32,
                'ssd' => 1000,
                'vga' => 'NVIDIA RTX A500 4GB',
                'display' => '15.6" FHD',
                'battery' => '6 Cell, 83 Wh',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'Laptop Performance Non-Graphical V.02',
                'brand' => 'HP',
                'model' => 'Probook 440 G9',
                'cpu' => 'i7-12700',
                'ram' => 32,
                'ssd' => 1000,
                'vga' => 'Intel Iris Xe Graphics',
                'display' => '14.0" FHD',
                'battery' => '3 Cell, 42 Wh',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'Desktop General v.09',
                'brand' => 'HP',
                'model' => 'Prodesk 400 Tower G9',
                'cpu' => 'i3-1210',
                'ram' => 16,
                'ssd' => 512,
                'vga' => 'Intel Integrated Graphics',
                'display' => 'HP Monitor - P204V',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'Desktop General V.10',
                'brand' => 'HP',
                'model' => 'Prodesk 400 Tower G9',
                'cpu' => 'i3-1210',
                'ram' => 16,
                'ssd' => 512,
                'vga' => 'Intel Integrated Graphics',
                'display' => 'HP E24mv G4 Conf FHD Monitor',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'Desktop Performance Graphical V.07',
                'brand' => 'HP',
                'model' => 'Z2 Tower G9',
                'cpu' => 'i7-12700',
                'ram' => 32,
                'ssd' => 1000,
                'vga' => 'NVIDIA T1000 4GB',
                'display' => 'HP Z24f G3 FHD Display',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'Desktop Performance Non-Graphical V.03',
                'brand' => 'DELL',
                'model' => 'Optiplex 5090',
                'cpu' => 'i7-10700',
                'ram' => 16,
                'ssd' => 1000,
                'vga' => 'Intel Integrated Graphics',
                'display' => 'Dell 24 Monitor - E2420H',
                'os' => 'Windows 10 Pro x64',
            ],
            [
                'class' => 'LAPTOP GENERAL TTD V.02',
                'brand' => 'DELL',
                'model' => 'Latitude 5440',
                'cpu' => 'i5-1350P vPro',
                'ram' => 16,
                'ssd' => 256,
                'vga' => 'Intel Integrated Graphics',
                'display' => '14.0" FHD',
                'battery' => '3 Cell, 54 Wh',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'Laptop Executive (TTD) V.01',
                'brand' => 'DELL',
                'model' => 'Latitude 5330',
                'cpu' => 'i7-1265U vPro',
                'ram' => 16,
                'ssd' => 256,
                'vga' => 'Intel Iris Xe Graphics',
                'display' => '13.3" FHD',
                'battery' => '3 Cell, 54 Wh',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'LAPTOP EXCEUTIVE TTD V.02',
                'brand' => 'DELL',
                'model' => 'Latitude 5340',
                'cpu' => 'i7-1365U vPro',
                'ram' => 16,
                'ssd' => 256,
                'vga' => 'Intel Integrated Graphics',
                'display' => '13.3" FHD',
                'battery' => '3 Cell, 54 Wh',
                'os' => 'Windows 11 Pro x64',
            ],
            [
                'class' => 'DESKTOP GENERAL TTD V.02',
                'brand' => 'DELL',
                'model' => 'OptiPlex Plus 7010 SFF',
                'cpu' => 'i5-13600',
                'ram' => 16,
                'ssd' => 256,
                'vga' => 'Intel Integrated Graphics',
                'display' => 'Dell 20 Monitor - E2020H',
                'os' => 'Windows 11 Pro x64',
            ],
        ];

        foreach ($services as $service) {
            ServiceOffer::create($service);
        }
    }
}
