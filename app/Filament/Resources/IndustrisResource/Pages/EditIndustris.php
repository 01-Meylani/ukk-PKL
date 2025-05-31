<?php

namespace App\Filament\Resources\IndustrisResource\Pages;

use App\Filament\Resources\IndustrisResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndustris extends EditRecord
{
    protected static string $resource = IndustrisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
