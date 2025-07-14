<?php

declare(strict_types=1);

namespace App\Enums;

enum UserTitle: string
{
    case MR = 'mr';
    case MRS = 'mrs';
    case MISS = 'miss';
    case MS = 'ms';
    case DR = 'dr';
    case PROF = 'prof';
    case MX = 'mx';
}
