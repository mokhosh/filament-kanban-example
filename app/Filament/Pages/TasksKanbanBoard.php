<?php

namespace App\Filament\Pages;

use App\Enums\TaskStatus;
use App\Models\Task;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class TasksKanbanBoard extends KanbanBoard
{
    protected static string $model = Task::class;

    protected static string $statusEnum = TaskStatus::class;
}
