<?php

namespace App\Enums;

enum DefaultStatus: int
{
    case AVAILABEL = 1;
    case STAGING = 2;
    case DELIVERY = 3;
    case DEPLOYED = 4;
    case TERMINATION = 5;

    public static function getLabel($value)
    {
        $data = [
            self::AVAILABEL => 'Available',
            self::STAGING => 'Staging',
            self::DELIVERY => 'Delivery',
            self::DEPLOYED => 'Deployed',
            self::TERMINATION => 'Termination',
        ];

        return $data[$value] ?? '-';
    }

    public static function getDescription($value)
    {
        $data = [
            self::AVAILABEL => 'Unit baru',
            self::STAGING => 'Unit sedang proses staging',
            self::DELIVERY => 'Unit dalam pengiriman',
            self::DEPLOYED => 'Unit di deployed',
            self::TERMINATION => 'Unit termination',
        ];

        return $data[$value] ?? '-';
    }

    public static function getColor($value)
    {
        $data = [
            self::AVAILABEL => 'primary',
            self::STAGING => 'warning',
            self::DELIVERY => 'info',
            self::DEPLOYED => 'success',
            self::TERMINATION => 'warning',
        ];

        return $data[$value] ?? '-';
    }

    public static function getNextStatus($value)
    {
        $nextStatus = [
            self::AVAILABEL->value => self::STAGING,
            self::STAGING->value => self::DELIVERY,
            self::DELIVERY->value => self::DEPLOYED,
            self::DEPLOYED->value => self::DEPLOYED,
        ];

        return $nextStatus[$value] ?? self::STAGING;
    }
}
