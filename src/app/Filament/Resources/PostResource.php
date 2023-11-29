<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // ここに編集したい項目を追加する
            Forms\Components\TextInput::make("title")
                ->required()
                ->label("タイトル")
                ->hint("ブログのタイトル入力")
                ->live(),
            Forms\Components\TextInput::make("sub_title")
                ->required()
                ->label("サブタイトル")
                ->hint("ブログのサブタイトル入力")
                ->live(),
            Forms\Components\Textarea::make("body")
                ->required()
                ->label("本文")
                ->helperText("本文を入力します")
                ->columnSpan("full")
                ->live(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ここに表示したい項目を追加する
                Tables\Columns\TextColumn::make("title")
                    ->label("タイトル")
                    ->sortable()
                    ->getStateUsing(function (Post $record): string {
                        return $record->title . $record->sub_title;
                    })
                    ->searchable(
                        condition: ["title", "sub_title"],
                        isIndividual: true,
                        isGlobal: false
                    ),
                Tables\Columns\TextColumn::make("body")->label("本文"),
            ])
            ->filters([])
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
