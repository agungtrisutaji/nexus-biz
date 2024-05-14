<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Unit;
use App\Models\ServiceOffer;

class Inventories extends Component
{
    public $units;
    public $serviceOffers;

    private function prepareButtons()
    {
        return '<nobr>' . $this->generateButton('Edit', 'pen', 'primary') . $this->generateButton('Delete', 'trash', 'danger') . $this->generateButton('Details', 'eye', 'teal') . '</nobr>';
    }

    private function generateButton($action, $icon, $color)
    {
        return '<button class="btn btn-xs btn-default text-' . $color . ' mx-1 shadow" title="' . $action . '">
                <i class="fa fa-lg fa-fw fa-' . $icon . '"></i>
            </button>';
    }

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
                $this->prepareButtons()
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

        return view('livewire::inventories', ['config' => $this->prepareConfig()]);
    }
}
