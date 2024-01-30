<?php

namespace App\Enums;

use Mokhosh\FilamentKanban\Concerns\IsKanbanStatus;

enum UserStatus: string
{
    use IsKanbanStatus;

    case Pending = 'pending';
    case Active = 'active';
    case Inactive = 'inactive';

    public static function kanbanCases(): array
    {
        return [
            static::Pending,
            static::Active,
        ];
    }

    public function getTitle(): string
    {
        return $this->name;
    }
}
