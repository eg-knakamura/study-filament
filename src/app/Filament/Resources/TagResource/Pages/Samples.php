<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use App\Filament\Widgets\TagSampls;
use App\Http\Livewire\TagList;
use App\Models\Tag;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions;
use Filament\Resources\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class Samples extends Page
{
    protected static string $resource = TagResource::class;

    protected static string $view = "filament.resources.tag-resource.pages.samples";

    protected static ?string $model = Tag::class;

    public string $test = "Hello Samples!";

    public ?array $data = [];

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(), // タグ作成リンクボタン設置
        ];
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
