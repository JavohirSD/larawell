<?php

namespace App\Models\Enums;

enum BlogStatus: int
{
    case INACTIVE = 0;
    case ACTIVE   = 1;
    case CHECKING = 2;
    case QUEUED   = 3;

    public function label(): string
    {
        return match ($this) {
            BlogStatus::INACTIVE => 'Deactivated',
            BlogStatus::ACTIVE   => 'Activated',
            BlogStatus::CHECKING => 'In process',
            BlogStatus::QUEUED   => 'Queued',
        };
    }
}
