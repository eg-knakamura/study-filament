<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    protected static string $resource = TagResource::class;

    protected function getHeaderWidgets(): array
    {
        return [TagResource\Widgets\TagHeaderOverview::class];
    }

    protected function getFooterWidgets(): array
    {
        return [TagResource\Widgets\TagFooterOverview::class];
    }
}
