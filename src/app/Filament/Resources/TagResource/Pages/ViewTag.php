<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTag extends ViewRecord
{
    protected static string $resource = TagResource::class;

    protected function getActions(): array
    {
        return [Actions\EditAction::make()];
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
