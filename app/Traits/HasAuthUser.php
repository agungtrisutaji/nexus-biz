<?php

namespace App\Traits;

use App\Enums\RoleType;
use Illuminate\Support\Facades\Auth;

trait HasAuthUser
{
    protected function isDeputiOrDirektur(): bool
    {
        $user = Auth::user();
        $deputiRole = [
            RoleType::KDEPDAK->getRoleId(),
            RoleType::KDEPIND->getRoleId(),
            RoleType::KDEPPPM->getRoleId(),
        ];

        $direkturRole = [
            RoleType::KDIRDIK->getRoleId(),
            RoleType::KDIRDUM->getRoleId(),
            RoleType::KDIRLBS->getRoleId(),
            RoleType::KDIRLID->getRoleId(),
            RoleType::KDIRMON->getRoleId(),
            RoleType::KDIRPDA->getRoleId(),
            RoleType::KDIRPIL->getRoleId(),
            RoleType::KDIRPJK->getRoleId(),
            RoleType::KDIRTUT->getRoleId(),
        ];

        return in_array($user?->role_id, [...$deputiRole, ...$direkturRole]);
    }
}
