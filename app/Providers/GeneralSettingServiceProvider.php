<?php
namespace App\Providers;

use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GeneralSettingServiceProvider extends ServiceProvider {
    /**
     * Register services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {
        View::composer('*', function ($view) {
            $view->with('general_setting', app(GeneralSettings::class));
        });
    }
}
