<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Unit;
use App\Models\ServiceOffer;

class Inventories extends Component
{
    public $units;
    public $serviceOffers;
    public $editUnit = '';
    public $deleteUrl = '';
    public $detailUrl = '';

    private function loadData()
    {
        $this->units = Unit::all();
        $this->serviceOffers = ServiceOffer::all();
    }

    private function prepareData()
    {
        $data = [];

        foreach ($this->units as $unit) {
            $serviceOffer = $this->serviceOffers->firstWhere('id', $unit->service_offer_id);
            $data[] = [
                $unit->serial,
                $serviceOffer->class,
                $serviceOffer->brand,
                $serviceOffer->model,
                $serviceOffer->cpu,
                $serviceOffer->ram,
                $serviceOffer->hdd,
                $serviceOffer->ssd,
                $serviceOffer->os,
                $serviceOffer->vga,
                $serviceOffer->display,
                $unit->status->value,
                $unit->id,
            ];
        }

        return $data;
    }

    private function prepareConfig()
    {
        return [
            'data' => $this->prepareData(),
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
    }

    public function render()
    {
        $this->loadData();

        return view('livewire::inventories', [
            'config' => $this->prepareConfig(),
            'editUnit' => $this->editUnit,
            'deleteUrl' => $this->deleteUrl,
            'detailUrl' => $this->detailUrl,
        ]);
    }
}
