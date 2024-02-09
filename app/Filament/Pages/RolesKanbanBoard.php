<?php

namespace App\Filament\Pages;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Support\Collection;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class RolesKanbanBoard extends KanbanBoard
{
    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?string $title = 'User Roles';

    protected static ?int $navigationSort = 20;

    protected static string $recordTitleAttribute = 'name';

    protected static string $recordStatusAttribute = 'role';

    protected static string $statusEnum = UserRole::class;

    protected function records(): Collection
    {
        return User::where('status', UserStatus::Active)->ordered()->get();
    }

    public function onStatusChanged(int $recordId, string $status, array $fromOrderedIds, array $toOrderedIds): void
    {
        User::find($recordId)->update(['role' => $status]);
        User::setNewOrder($toOrderedIds);
    }
}
