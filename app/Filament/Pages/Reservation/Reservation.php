<?php

namespace App\Filament\Pages\Reservation;

use Closure;
use App\Models\Therapist;
use App\Models\Room;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Pages\Actions\Action;

class Reservation extends Page
{
  protected static ?string $navigationIcon = 'heroicon-o-document-text';

  protected static string $view = 'filament.pages.reservation';

  protected function getActions(): array
  {
    return [
      Action::make('reservation')
        ->label('Nouvelle Réservation')
        ->icon('heroicon-s-cog')
        ->action('openReservationModal')
        ->modalHeading('Nouvelle réservation')
        ->modalSubheading('Pour le thérapeute X')
        ->modalContent(view('filament.pages.actions.reservation'))
        // ->form([
        //   Forms\Components\Select::make('authorId')
        //   ->label('Author')
        //   ->options(User::query()->pluck('name', 'id'))
        //     ->required(),
        // ]),
    ];
  }

  public function openReservationModal(): void
  {
    $this->dispatchBrowserEvent('open-reservation-modal');
  }

  public $toggle_new_client = false;

  public function mount()
  {
    // $this->myform = Forms\Components\Select::make('authorId')
    //   ->label('Author')
    //   ->options(User::query()->pluck('name', 'id'))
    //   ->required();
  }

  public function getFormSchema(): array
  {
    return [
      Forms\Components\Section::make('Sélection de la date et l\'heure')
        ->schema([
          Forms\Components\DatePicker::make('date')
            ->label('Date')
            ->displayFormat('d.m.Y')
            ->required(),
          Forms\Components\TimePicker::make('heure')
            ->label('Heure d\'arrivée')
            ->minutesStep(5)
            ->required(),
        ])
        ->columns(2),
      Forms\Components\Section::make('Sélection du service')
        ->schema([
          Forms\Components\Select::make('authorId')
            ->label('Service')
            ->placeholder('Sélectionnez un service')
            ->options([
              '1' => 'Signature',
              '2' => 'Mosaïque',
              '3' => 'Tandems',
            ])
            ->searchable()
            ->disablePlaceholderSelection()
            ->required(),
        ])
        ->columns(2),
      Forms\Components\Section::make('Sélection du thérapeute et de la salle')
        ->schema([
          Forms\Components\CheckboxList::make('therapist')
            ->label('Thérapeute')
            ->options(Therapist::query()->pluck('first_name', 'id')),
          Forms\Components\CheckboxList::make('room')
            ->label('Salle')
            ->options(Room::query()->pluck('name', 'id')),
          Forms\Components\Radio::make('room')
            ->label('Préférence')
            ->options([
              '1' => 'Thérapeute féminin',
              '2' => 'Thérapeute masculin',
              '3' => 'Thérapeute bloqué',
              '4' => 'Pas de préférence',
            ])
        ])
        ->columns(3),
      Forms\Components\Section::make('Sélection du client')
        ->schema([
          
          Forms\Components\Toggle::make('toggle_new_client')
            ->label($this->toggle_new_client ? 'Nouveau client' : 'Client existant')
            ->inline(false)
            ->onIcon('heroicon-s-lightning-bolt')
            ->offIcon('heroicon-s-user')
            ->default($this->toggle_new_client)
            ->reactive(),

          Forms\Components\Select::make('client')
            ->label('Nom du client')
            ->placeholder('')
            ->options(User::query()->pluck('name', 'id'))
            ->hidden($this->toggle_new_client)
            ->searchable(),

        ])
        ->columns(2),
    ];
  }
}
