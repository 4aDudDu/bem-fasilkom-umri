<?php

namespace App\Filament\Resources\AngkatanBemResource\Pages;

use App\Filament\Resources\AngkatanBemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAngkatanBems extends ListRecords
{
    protected static string $resource = AngkatanBemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
