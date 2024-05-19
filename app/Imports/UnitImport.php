<?php

namespace App\Imports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class UnitImport implements ToModel
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    protected $serviceOfferId;

    public function __construct($serviceOfferId)
    {
        $this->serviceOfferId = $serviceOfferId;
    }

    public function model(array $row)
    {
        return new Unit([
            'service_offer_id' => $this->serviceOfferId,
            // Tambahkan kolom-kolom lain yang diperlukan dari data Excel
            'serial' => $row[0], // Asumsikan serial_number berada di kolom pertama
            // ...
        ]);
    }
}
