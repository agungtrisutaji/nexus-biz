<?php

namespace App\Enums;

use App\Traits\HasEnumQuery;
use App\Traits\HasOptions;

enum UnitStatus: int
{
    use HasEnumQuery, HasOptions;

    case BARU = 1;
    case STAGING = 2;
    case DELIVERY = 3;
    case DEPLOYED = 4;
    case TERMINATION = 5;
    case BACKUP = 6;
    case USED = 7;
    case REDEPLOY = 8;
    case SOLD = 9;
    case SCRAP = 10;

    public function getLabel(): string
    {
        $labels = [
            self::BARU => 'Baru',
            self::STAGING => 'Staging',
            self::DELIVERY => 'Delivery',
            self::DEPLOYED => 'Deployed',
            self::TERMINATION => 'Termination',
            self::BACKUP => 'Backup',
            self::USED => 'Used',
            self::REDEPLOY => 'Redeploy',
            self::SOLD => 'Sold',
            self::SCRAP => 'Scrap',
        ];

        return $labels[$this->value];
    }

    public function getDescription(): string
    {
        $descriptions = [
            self::BARU => 'Unit baru',
            self::STAGING => 'Unit sedang proses staging',
            self::DELIVERY => 'Unit dalam pengiriman',
            self::DEPLOYED => 'Unit di deployed',
            self::TERMINATION => 'Unit termination',
            self::BACKUP => 'Unit backup',
            self::USED => 'Unit dalam pemakaian Internal',
            self::REDEPLOY => 'Unit Dideploy Kembali',
            self::SOLD => 'Unit Terjual',
            self::SCRAP => 'Unit Rusak',
        ];

        return $descriptions[$this->value];
    }

    public function getColor(): string
    {
        $colors = [
            self::BARU => 'primary',
            self::STAGING => 'warning',
            self::DELIVERY => 'info',
            self::DEPLOYED => 'success',
            self::TERMINATION => 'warning',
            self::BACKUP => 'warning',
            self::USED => 'success',
            self::REDEPLOY => 'success',
            self::SOLD => 'danger',
            self::SCRAP => 'dark',
        ];

        return $colors[$this->value];
    }
}
