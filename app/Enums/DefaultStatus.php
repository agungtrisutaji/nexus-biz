<?php

namespace App\Enums;

enum DefaultStatus: string
{
    case AVAILABEL = 'Availabel';
    case STAGING = 'Staging';
    case DELIVERY = 'Delivery';
    case DEPLOYED = 'Deployed';
    case TERMINATION = 'Termination';
}
