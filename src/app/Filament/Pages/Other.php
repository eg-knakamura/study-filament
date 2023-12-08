<?php

namespace App\Filament\Pages;

use App\Filament\Resources\CustomerResource\Widgets\MstItemOverview;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Other extends Page
{
    protected static ?string $navigationIcon = "heroicon-o-document-text";

    protected static string $view = "filament.pages.other";

    public string $other = '';

    protected function getHeaderWidgets(): array
    {
        return [MstItemOverview::class];
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make("other")
                ->required()
                ->label("何か入力")
                ->live(),
        ]);
    }

    public function addButton() : Action
    {
        return Action::make('addButton')
            ->label('実行')
            ->requiresConfirmation()
            ->action(fn () => $this->notice())
            ->disabled(function () {
                return empty($this->other);
            });
    }

    public function notice() : void
    {
        // ただ通知するだけ
        Notification::make()
            ->title('実行ボタン押下')
            ->color('success')
            ->send();
    }
}
