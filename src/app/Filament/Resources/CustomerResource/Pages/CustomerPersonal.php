<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Resources\Pages\Page;

class CustomerPersonal extends Page
{
    protected static string $resource = CustomerResource::class;

    protected static string $view = "filament.resources.customer-resource.pages.customer-personal";

    public string $recordData;
    public function mount(string $record): void
    {
        $this->recordData = $record;
    }
}
