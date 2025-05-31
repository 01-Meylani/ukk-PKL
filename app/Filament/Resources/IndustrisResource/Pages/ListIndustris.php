<?php

namespace App\Filament\Resources\IndustrisResource\Pages;

use App\Filament\Resources\IndustrisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndustris extends ListRecords
{
    protected static string $resource = IndustrisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
