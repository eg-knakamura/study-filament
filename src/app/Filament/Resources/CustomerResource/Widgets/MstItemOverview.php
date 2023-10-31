<?php

namespace App\Filament\Resources\CustomerResource\Widgets;

use App\Models\MstItem;
use Filament\Widgets\Widget;

class MstItemOverview extends Widget
{
    protected static string $view = "filament.resources.customer-resource.widgets.mst-item-overview";

    protected string|int|array $columnSpan = 4;

    public function getViewData(): array
    {
        $mstItems = MstItem::query()
            ->select("id", "name")
            ->get()
            ->toArray();

        return [
            "items" => $mstItems,
        ];
    }
}
