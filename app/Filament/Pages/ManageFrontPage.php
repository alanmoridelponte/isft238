<?php
namespace App\Filament\Pages;

use App\Settings\FrontPageSettings;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageFrontPage extends SettingsPage {
    protected static ?string $navigationLabel      = 'Sitio web';
    protected ?string $heading                     = 'Configuración del sitio web';
    protected static ?string $navigationIcon       = 'heroicon-o-cog-6-tooth';
    protected static ?string $activeNavigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup      = 'Configuración';
    protected static ?int $navigationSort          = 1;
    protected static ?string $slug                 = 'configuracion/sitio-web';

    protected static string $settings = FrontPageSettings::class;

    public function form(Form $form): Form {
        return $form
            ->schema([
                // ...
            ]);
    }
}
