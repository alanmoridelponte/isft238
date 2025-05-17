<?php
namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
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
                        TextInput::make('institute_phone')
                            ->label('Teléfono del instituto')
                            ->placeholder('Ingrese teléfono del instituto')
                            ->required()
                            ->maxLength(20)
                            ->dehydrateStateUsing(fn($state) => $state ?: '')
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
