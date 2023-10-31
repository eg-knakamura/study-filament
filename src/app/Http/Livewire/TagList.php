<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class TagList extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Tag::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make("id"),
            Tables\Columns\TextColumn::make("name")->label("名前"),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
                // ...
            ];
    }

    protected function getTableActions(): array
    {
        return [
                // ...
            ];
    }

    protected function getTableBulkActions(): array
    {
        return [
                // ...
            ];
    }

    public function render(): View
    {
        return view("livewire.tag-list");
    }
}
