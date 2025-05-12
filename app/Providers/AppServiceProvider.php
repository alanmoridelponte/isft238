<?php
namespace App\Providers;

use App\Settings\GeneralSettings;
use BezhanSalleh\FilamentShield\FilamentShield;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        FilamentShield::prohibitDestructiveCommands($this->app->isProduction());

        View::composer('*.public.*', function ($view) {
            $view->with('general_setting', app(GeneralSettings::class));
        });
    }
}
