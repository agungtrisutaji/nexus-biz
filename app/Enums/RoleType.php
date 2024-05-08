<?php

namespace App\Enums;

enum RoleType
{
    case ADMINSPR;
    case ADMIN;
    case USER;

    public function getRoleId(): string
    {
        $roleIds = [

            self::ADMINSPR->name => '1',
            self::ADMIN->name => '2',
            self::USER->name => '3',
        ];

        return $roleIds[$this->name];
    }

    public function getDescription(): string
    {
        $descriptions = [

            self::ADMINSPR->name => 'Super Admin',
            self::ADMIN->name => 'Admin',
            self::USER->name => 'User',
        ];

        return $descriptions[$this->name];
    }
}
