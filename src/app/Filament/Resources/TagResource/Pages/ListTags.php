<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTags extends ListRecords
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TagResource\Widgets\CustomerOverview::class,
            TagResource\Widgets\TagHeaderOverview::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [TagResource\Widgets\TagFooterOverview::class];
    }
}
