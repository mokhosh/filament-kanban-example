<?php

namespace App\Filament\Pages;

use App\Models\User;
use Illuminate\Support\Collection;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class UsersKanbanBoard extends KanbanBoard
{
    protected static string $recordTitleAttribute = 'name';

    protected function statuses(): Collection
    {
        // return StatusEnum::statuses();
        return collect([
            [
                'id' => 'pending',
                'title' => 'Pending',
            ],
            [
                'id' => 'active',
                'title' => 'Active',
            ],
        ]);
    }

    protected function records(): Collection
    {
        return User::latest('updated_at')->get();
    }

    public function onStatusChanged(int $recordId, string $status, array $fromOrderedIds, array $toOrderedIds): void
    {
        User::find($recordId)->update(['status' => $status]);
        // Model::setNewOrder($toOrderedIds);
    }

    public function onSortChanged(int $recordId, string $status, array $orderedIds): void
    {
        // Model::setNewOrder($orderedIds);
    }
}
