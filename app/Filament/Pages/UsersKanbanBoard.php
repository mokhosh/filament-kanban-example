<?php

namespace App\Filament\Pages;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Support\Collection;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class UsersKanbanBoard extends KanbanBoard
{
    protected static string $recordTitleAttribute = 'name';

    protected function statuses(): Collection
    {
        return UserStatus::statuses();
    }

    protected function records(): Collection
    {
        return User::ordered()->get();
    }

    public function onStatusChanged(int $recordId, string $status, array $fromOrderedIds, array $toOrderedIds): void
    {
        User::find($recordId)->update(['status' => $status]);
        User::ignoreTimestamps();
        User::setNewOrder($toOrderedIds);
        User::ignoreTimestamps(false);
    }

    public function onSortChanged(int $recordId, string $status, array $orderedIds): void
    {
        User::ignoreTimestamps();
        User::setNewOrder($orderedIds);
        User::ignoreTimestamps(false);
    }
}
