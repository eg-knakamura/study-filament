<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTag extends EditRecord
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\ViewAction::make(), Actions\DeleteAction::make()];
    }

    protected function getHeaderWidgets(): array
    {
        return [TagResource\Widgets\TagHeaderOverview::class];
    }

    protected function getFooterWidgets(): array
    {
        return [TagResource\Widgets\TagFooterOverview::class];
    }
}
