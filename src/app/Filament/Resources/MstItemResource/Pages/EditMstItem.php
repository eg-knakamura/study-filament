<?php

namespace App\Filament\Resources\MstItemResource\Pages;

use App\Filament\Resources\MstItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMstItem extends EditRecord
{
    protected static string $resource = MstItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
