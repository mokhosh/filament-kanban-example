<?php

namespace App\Filament\Pages;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Support\Collection;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class UsersKanbanBoard extends KanbanBoard
{
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static string $recordTitleAttribute = 'name';

    protected static string $model = User::class;

    protected static string $statusEnum = UserStatus::class;
}
