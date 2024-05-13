<?php

namespace App\Enums;

use App\Traits\HasEnumQuery;
use App\Traits\HasOptions;

enum UnitStatus: int
{
    use HasEnumQuery, HasOptions;

    case AVAILABEL = 1;
    case STAGING = 2;
    case DELIVERY = 3;
    case DEPLOYED = 4;
    case TERMINATION = 5;
    case BACKUP = 6;
    case USED = 7;
    case REFURBISH = 8;
    case SOLD = 9;
    case SCRAP = 10;
    case SHORTTERM = 11;
    case EXTEND = 12;

    public function getLabel(): string
    {
        $labels = [
            self::AVAILABEL => 'Available',
            self::STAGING => 'Staging',
            self::DELIVERY => 'Delivery',
            self::DEPLOYED => 'Deployed',
            self::TERMINATION => 'Termination',
            self::BACKUP => 'Backup',
            self::USED => 'Used',
            self::REFURBISH => 'Refurbish',
            self::SOLD => 'Sold',
            self::SCRAP => 'Scrap',
            self::SHORTTERM => 'Short Term',
            self::EXTEND => 'Extend',
        ];

        return $labels[$this->value];
    }

    public function getDescription(): string
    {
        $descriptions = [
            self::AVAILABEL => 'Unit baru',
            self::STAGING => 'Unit sedang proses staging',
            self::DELIVERY => 'Unit dalam pengiriman',
            self::DEPLOYED => 'Unit di deployed',
            self::TERMINATION => 'Unit termination',
            self::BACKUP => 'Unit backup',
            self::USED => 'Unit dalam pemakaian Internal',
            self::REFURBISH => 'Unit Dideploy Kembali',
            self::SOLD => 'Unit Terjual',
            self::SCRAP => 'Unit Rusak',
            self::SHORTTERM => 'Unit Short Term',
            self::EXTEND => 'Unit Extend',
        ];

        return $descriptions[$this->value];
    }

    public function getColor(): string
    {
        $colors = [
            self::AVAILABEL => 'primary',
            self::STAGING => 'warning',
            self::DELIVERY => 'info',
            self::DEPLOYED => 'success',
            self::TERMINATION => 'warning',
            self::BACKUP => 'warning',
            self::USED => 'success',
            self::REFURBISH => 'success',
            self::SOLD => 'danger',
            self::SCRAP => 'dark',
            self::SHORTTERM => 'success',
            self::EXTEND => 'warning',
        ];

        return $colors[$this->value];
    }
}
