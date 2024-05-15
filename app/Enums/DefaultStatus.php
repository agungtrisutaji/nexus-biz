<?php

namespace App\Enums;

enum DefaultStatus: string
{
    case AVAILABLE = 'Available';
    case STAGING = 'Staging';
    case DELIVERY = 'Delivery';
    case DEPLOYED = 'Deployed';
    case TERMINATION = 'Termination';
}
