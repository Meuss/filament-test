<?php


namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;
use pxlrbt\FilamentEnvironmentIndicator\FilamentEnvironmentIndicator;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Filament::serving(function () {
        Filament::registerViteTheme('resources/css/filament.css');
      });

      FilamentEnvironmentIndicator::configureUsing(function (FilamentEnvironmentIndicator $indicator) {
        $indicator->color = fn () => match (app()->environment()) {
          'production' => null,
          'staging' => 'yellow',
          default => '#22c55e',
        };
      }, isImportant: true);
    }
}
