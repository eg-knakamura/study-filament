<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MstItemResource\Pages;
use App\Filament\Resources\MstItemResource\RelationManagers;
use App\Models\MstItem;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class MstItemResource extends Resource
{
    protected static ?string $model = MstItem::class;

    protected static ?string $navigationIcon = "heroicon-o-collection";

    public static function form(Form $form): Form
    {
        return $form->schema([
            // ここに編集したい項目を追加する
            Forms\Components\TextInput::make("name")
                ->required()
                ->label(function () {
                    return new HtmlString(
                        "<b style='color: #00ff00; initial-letter: normal'>アイテム名</b>"
                    );
                })
                ->hint(function () {
                    return new HtmlString(
                        "<b style='color: #ef4444; initial-letter: normal'>アイテム名を入力</b>"
                    );
                }),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ここに表示したい項目を追加する
                Tables\Columns\TextColumn::make("name")
                    ->label(function () {
                        return new HtmlString(
                            "<b style='color: #00ff00; initial-letter: normal'>アイテム名</b>"
                        );
                    })
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getRelations(): array
    {
        return [
                //
            ];
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListMstItems::route("/"),
            "create" => Pages\CreateMstItem::route("/create"),
            "edit" => Pages\EditMstItem::route("/{record}/edit"),
        ];
    }
}
