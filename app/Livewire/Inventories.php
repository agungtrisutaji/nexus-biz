<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Unit;
use App\Models\ServiceOffer;

class Inventories extends Component
{
    public $units;
    public $service;
    public $serviceDetail;
    public $serviceOffers;
    public $editUrl = '';
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
            $actions = "
            <div class='btn-group btn-group-sm'>
                <button :wire:click='editUnit({$unit->id})' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></button>
                <button wire:click='deleteUnit({$unit->id})' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></button>
                <button wire:click='detailUnit({$unit->id})' class='btn btn-success btn-sm'><i class='fas fa-eye'></i></button>
            </div>
        ";
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
                $actions
            ];
        }

        return $data;
    }

    public function editUnit($unitId)
    {
        // Logika untuk mengedit unit dengan ID $unitId
        // Misalnya, redirect ke halaman edit unit
        return redirect()->route('units.edit', $unitId);
    }

    public function deleteUnit($unitId)
    {
        // Logika untuk menghapus unit dengan ID $unitId
        // Misalnya, menghapus unit dari database dan memperbarui tampilan tabel
        $unit = Unit::findOrFail($unitId);
        $unit->delete();
        $this->loadData();
    }

    public function detailUnit($unitId)
    {
        // Logika untuk melihat detail unit dengan ID $unitId
        // Misalnya, redirect ke halaman detail unit
        return redirect()->route('units.show', $unitId);
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
            'editUrl' => $this->editUrl,
            'deleteUrl' => $this->deleteUrl,
            'detailUrl' => $this->detailUrl,
            'actions' => $this->prepareData(),
        ]);
    }
}
