<?php

namespace App\Models\Enums;

enum UserStatus: int
{
    case INACTIVE = 0;
    case ACTIVE   = 1;

    public function label(): string
    {
        return match ($this) {
            BlogStatus::INACTIVE => 'Deactivated',
            BlogStatus::ACTIVE   => 'Activated',
            default => 'Not found'
        };
    }
}
