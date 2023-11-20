<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Filament\Resources\TagResource\RelationManagers;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Support\HtmlString;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = "タグa"; // 左メニューの表示や、ページタイトルが指定できる

    protected static ?string $heading = "タグb"; // ダッシュボード上の表示名が変更できるらしい

    //protected static ?string $navigationLabel = "タグc"; // 左メニューの表示がmodelLabelより上書きされる

    public static function form(Form $form): Form
    {
        return $form->schema([
            // ここに編集したい項目を追加する
            Forms\Components\TextInput::make("name")
                ->required()
                ->label(function () {
                    return new HtmlString(
                        "<b style='color: #ef4444; initial-letter: normal'>タグ</b>"
                    );
                })
                ->hint("タグ名を入力"),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ここに表示したい項目を追加する
                Tables\Columns\TextColumn::make("id")
                    ->label("id")
                    ->sortable()
                    ->searchable()
                    ->color("primary"),
                Tables\Columns\TextColumn::make("name")
                    ->label("タグ")
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make("sample")->url(
                    static::getUrl("sample")
                ),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()])
            ->poll("15s");
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
            "index" => Pages\ListTags::route("/"),
            "create" => Pages\CreateTag::route("/create"),
            // MEMO これを最終行に設置すると、sampleページで404エラーが発生する。(Laravelのルーティングの問題らしい)
            // 参考：https://github.com/filamentphp/filament/discussions/6197
            "sample" => Pages\Samples::route("/sample"),
            "view" => Pages\ViewTag::route("/{record}"),
            "edit" => Pages\EditTag::route("/{record}/edit"),
        ];
    }
}
