<?php

namespace App\Filament\Resources;

use App\Filament\Pages\Other;
use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // ここに編集したい項目を追加する
            Forms\Components\TextInput::make("name_sei")
                ->required()
                ->label(function () {
                    return new HtmlString(
                        "<b style='color: #00ff00; initial-letter: normal'>名前(姓)</b>"
                    );
                })
                ->hint(function () {
                    return new HtmlString(
                        "<b style='color: #ef4444; initial-letter: normal'>名前(姓)を入力</b>"
                    );
                }),
            Forms\Components\TextInput::make("name_mei")
                ->required()
                ->label(function () {
                    return new HtmlString(
                        "<b style='color: #0000ff; initial-letter: normal'>名前(名)</b>"
                    );
                })
                ->hint(function () {
                    return new HtmlString(
                        "<b style='color: #ef4444; initial-letter: normal'>名前(名)を入力</b>"
                    );
                }),
            Forms\Components\TextInput::make("mst_item_id")
                ->required()
                ->label(function () {
                    return new HtmlString(
                        "<b style='color: #ff69b4; initial-letter: normal'>マスタアイテムid</b>"
                    );
                })
                ->hint(function () {
                    return new HtmlString(
                        "<b style='color: #ef4444; initial-letter: normal'>マスタアイテムidを入力</b>"
                    );
                }),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\Action::make("カスタムOther")->url(
                    static::getUrl("customers-other")
                ),
            ])
            ->columns([
                // ここに表示したい項目を追加する
                Tables\Columns\TextColumn::make("name")
                    ->label("名前")
                    ->description(function () {
                        return new HtmlString(
                            "<b style='color: #ff69b4; initial-letter: normal'>名前(姓)+名前(名)</b>"
                        );
                    })
                    ->sortable()
                    ->getStateUsing(function (Customer $record): string {
                        return $record->name_sei . $record->name_mei;
                    })
                    ->searchable(
                        condition: ["name_sei", "name_mei"],
                        isIndividual: true,
                        isGlobal: false
                    ),
                Tables\Columns\TextColumn::make("mst_item_id")->label(
                    function () {
                        return new HtmlString(
                            "<b style='color: #ff69b4; initial-letter: normal'>マスタアイテムid</b>"
                        );
                    }
                ),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make("personal")->url(function (
                    Customer $record
                ) {
                    return static::getUrl("customers-personal", [
                        "customerId" => $record->id,
                    ]);
                }),
            ])
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
            "index" => Pages\ListCustomers::route("/"),
            "create" => Pages\CreateCustomer::route("/create"),
            "customers-other" => Pages\CustomersOther::route("customers-other"),
            "customers-personal" => Pages\CustomerPersonal::route(
                "/{customerId}/customers-personal"
            ),
            "edit" => Pages\EditCustomer::route("/{record}/edit"),
        ];
    }
}
