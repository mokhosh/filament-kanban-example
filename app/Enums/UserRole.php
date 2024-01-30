<?php

namespace App\Enums;

use Mokhosh\FilamentKanban\Concerns\IsKanbanStatus;

enum UserRole: string
{
    use IsKanbanStatus;

    case User = 'user';
    case Admin = 'admin';

    public function getTitle(): string
    {
        return $this->name;
    }
}
