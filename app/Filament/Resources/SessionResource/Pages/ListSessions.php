<?php

namespace App\Filament\Resources\SessionResource\Pages;

use App\Filament\Resources\SessionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SessionResource\Widgets\CalendarWidget;

class ListSessions extends ListRecords
{
    protected static string $resource = SessionResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            CalendarWidget::class
        ];
    }
    
    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

}
