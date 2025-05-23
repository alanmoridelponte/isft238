<?php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ResponsiveTextServiceProvider extends ServiceProvider {
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
        Blade::directive('breakResponsive', function ($expression) {
            return "<?php echo \App\Support\ResponsiveText::heroMainNameBreak($expression); ?>";
        });
    }
}
