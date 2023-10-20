<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = "heroicon-o-collection";

    public static function form(Form $form): Form
    {
        return $form->schema([
            // ここに編集したい項目を追加する
            Forms\Components\TextInput::make("title")
                ->required()
                ->label("タイトル")
                ->hint("ブログのタイトル入力"),
            Forms\Components\Textarea::make("body")
                ->required()
                ->label("本文")
                ->helperText("本文を入力します")
                ->columnSpan("full"),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ここに表示したい項目を追加する
                Tables\Columns\TextColumn::make("title")->label("タイトル"),
                Tables\Columns\TextColumn::make("body")->label("本文"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getRelations(): array
    {
        return [
            PostResource\RelationManagers\TagsRelationManager::class, //追加
        ];
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListPosts::route("/"),
            "create" => Pages\CreatePost::route("/create"),
            "view" => Pages\ViewPost::route("/{record}"),
            "edit" => Pages\EditPost::route("/{record}/edit"),
        ];
    }
}
