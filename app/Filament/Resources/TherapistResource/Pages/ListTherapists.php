<?php

namespace App\Filament\Resources\TherapistResource\Pages;

use App\Filament\Resources\TherapistResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTherapists extends ListRecords
{
    protected static string $resource = TherapistResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
