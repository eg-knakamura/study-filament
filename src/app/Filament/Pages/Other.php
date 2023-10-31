<?php

namespace App\Filament\Pages;

use App\Filament\Resources\CustomerResource\Widgets\MstItemOverview;
use App\Models\MstItem;
use Filament\Pages\Page;

class Other extends Page
{
    protected static ?string $navigationIcon = "heroicon-o-document-text";

    protected static string $view = "filament.pages.other";

    protected function getHeaderWidgets(): array
    {
        return [MstItemOverview::class];
    }
}
