<?php
namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneralPage extends SettingsPage {
    use HasPageShield;

    protected static ?string $navigationLabel      = 'General';
    protected ?string $heading                     = 'Configuración general';
    protected static ?string $navigationIcon       = 'heroicon-o-cog-6-tooth';
    protected static ?string $activeNavigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup      = 'Configuración';
    protected static ?int $navigationSort          = 1;
    protected static ?string $slug                 = 'configuracion/general';

    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form {
        return $form
            ->schema([
                Forms\Components\Section::make('Datos del instituto')
                    ->description('Estos datos se mostrarán en la página')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                TextInput::make('institute_name')
                                    ->label('Nombre del instituto')
                                    ->placeholder('Ingrese nombre del instituto')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(['default' => 1, 'md' => 13, 'lg' => 24, 'xl' => 14]),
                                TextInput::make('institute_initialism')
                                    ->label('Siglas del instituto')
                                    ->placeholder('Ingrese siglas del instituto')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(['default' => 1, 'md' => 11, 'lg' => 24, 'xl' => 10]),
                            ])
                            ->columns(['default' => 1, 'md' => 24, 'xl' => 24]),
                        TextInput::make('institute_motto')
                            ->label('Lema del instituto')
                            ->placeholder('Ingrese lema del instituto')
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn($state) => $state ?: '')
                            ->dehydrated(),
                    ]),
                Forms\Components\Section::make('Datos de contacto')
                    ->description('Estos datos se mostrarán en la página')
                    ->schema([
                        TextInput::make('institute_email')
                            ->label('Email del instituto')
                            ->placeholder('Ingrese email del instituto')
                            ->email()
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn($state) => $state ?: '')
                            ->dehydrated(),
                        TextInput::make('institute_address')
                            ->label('Dirección del instituto')
                            ->placeholder('Ingrese dirección del instituto')
                            ->required()
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn($state) => $state ?: '')
                            ->dehydrated(),
                        TextInput::make('institute_business_hours')
                            ->label('Horario de atención')
                            ->placeholder('Ingrese horario de atención del instituto')
                            ->helperText('Ejemplo: Lunes a Viernes: 8:00 - 20:00')
                            ->required()
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn($state) => $state ?: '')
                            ->dehydrated(),
                        TextInput::make('institute_phone')
                            ->label('Teléfono del instituto')
                            ->placeholder('Ingrese teléfono del instituto')
                            ->required()
                            ->maxLength(20)
                            ->dehydrateStateUsing(fn($state) => $state ?: '')
                            ->dehydrated(),

                        TextInput::make('institute_maps_iframe')
                            ->label('Configuración de mapa en "Contactos" - Enlace embebido')
                            ->placeholder('Ingrese URL del mapa')
                            ->url()
                            ->helperText('Enlace de mapa embebido OpenStreetMap o Google Maps')
                            ->required()
                            ->dehydrateStateUsing(fn($state) => $state ?: 'https://www.openstreetmap.org/export/embed.html?bbox=-57.498525381088264%2C-37.82192316510236%2C-57.49404609203339%2C-37.820037469785895&amp;layer=mapnik&amp;marker=-37.82098032346613%2C-57.49628573656082')
                            ->dehydrated(),
                        TextInput::make('institute_maps_external_link')
                            ->label('Configuración de mapa en "Contactos" - Enlace externo')
                            ->placeholder('Ingrese URL del mapa')
                            ->url()
                            ->helperText('Enlace para ir a OpenStreetMap o Google Maps')
                            ->required()
                            ->dehydrateStateUsing(fn($state) => $state ?: 'https://www.openstreetmap.org/?mlat=-37.820980&amp;mlon=-57.496286#map=19/-37.820980/-57.496286')
                            ->dehydrated(),
                    ]),
                Forms\Components\Section::make('Redes sociales')
                    ->description('Estos datos se mostrarán en la página')
                    ->schema([
                        TextInput::make('institute_whatsapp')
                            ->label('Whatsapp del instituto')
                            ->placeholder('Ingrese Whatsapp del instituto')
                            ->url()
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn($state) => $state ?: '')
                            ->dehydrated(),
                        TextInput::make('institute_facebook')
                            ->label('Facebook del instituto')
                            ->placeholder('Ingrese Facebook del instituto')
                            ->url()
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn($state) => $state ?: '')
                            ->dehydrated(),
                        TextInput::make('institute_instagram')
                            ->label('Instagram del instituto')
                            ->placeholder('Ingrese Instagram del instituto')
                            ->url()
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn($state) => $state ?: '')
                            ->dehydrated(),
                        TextInput::make('institute_youtube')
                            ->label('Youtube del instituto')
                            ->placeholder('Ingrese Youtube del instituto')
                            ->url()
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn($state) => $state ?: '')
                            ->dehydrated(),
                    ]),
            ]);
    }
}
