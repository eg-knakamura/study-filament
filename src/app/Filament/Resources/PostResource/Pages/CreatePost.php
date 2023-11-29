<?php

namespace App\Filament\Resources\PostResource\Pages;

use Filament\Actions\Action;
use App\Filament\Resources\PostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected string $modalView = 'filament.pages.create-post-confirm-modal';

    protected function getCreateFormAction(): Action
    {
        return Action::make("create")
            ->label('さくせい')
            ->requiresConfirmation()
            ->modalContent(view($this->modalView, ['input' => $this->data]))
            ->action(fn () => $this->create())
            ->disabled(function () {
                foreach ($this->data as $input) {
                    if (empty($input)) {
                        return true;
                    }
                }
                return false;
            });
    }
}
