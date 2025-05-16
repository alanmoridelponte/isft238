<?php
namespace App\Filament\Resources;

use App\Enums\CareerStatus;
use App\Filament\Resources\CareerResource\Pages;
use App\Models\Career;
use Camya\Filament\Forms\Components\TitleWithSlugInput;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Unique;

class CareerResource extends Resource {
    protected static ?string $model                = Career::class;
    protected static ?string $modelLabel           = 'Carrera';
    protected static ?string $pluralModelLabel     = 'Carreras';
    protected static ?string $navigationIcon       = 'heroicon-o-academic-cap';
    protected static ?string $activeNavigationIcon = 'heroicon-s-academic-cap';
    protected static ?string $navigationGroup      = 'Configuración';
    protected static ?int $navigationSort          = 2;
    protected static ?string $slug                 = 'configuracion/sitio/carreras';

    public static function form(Form $form): Form {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Section::make('Contenido principal')
                            ->schema([
                                TitleWithSlugInput::make(
                                    fieldTitle: 'title',
                                    fieldSlug: 'slug',
                                    urlPath: '/carreras/',
                                    urlVisitLinkVisible: false,
                                    titleLabel: 'Nombre de la carrera',
                                    titlePlaceholder: 'Inserta el nombre de la carrera...',
                                    slugLabel: 'URL:',
                                    titleRules: [
                                        'required',
                                        'string',
                                        'min:3',
                                        'max:255',
                                    ],
                                    titleRuleUniqueParameters: [
                                        'ignorable'       => fn(?Career $record)       => $record,
                                        'modifyRuleUsing' => fn(Unique $rule) => $rule->whereNull('deleted_at'),
                                        'column'          => 'name',
                                        'ignoreRecord'    => true,
                                    ],
                                    slugRuleUniqueParameters: [
                                        'ignorable'    => fn(?Career $record)    => $record,
                                        'column'       => 'slug',
                                        'ignoreRecord' => true,
                                    ],
                                ),

                                Forms\Components\TextInput::make('resolution')
                                    ->label('Resolución de carrera')
                                    ->helperText('Ejemplo: Resolución Ministerial N° 1234/2023')
                                    ->required(),

                                Forms\Components\TextArea::make('excerpt')
                                    ->label('Detalle de tarjeta')
                                    ->required()
                                    ->maxLength(255)
                                    ->rows(3)
                                    ->helperText('Resumen breve de la carrera para la página principal y listado de carreras'),
                            ])
                            ->columnSpan(['default' => 1, 'md' => 13, 'lg' => 24, 'xl' => 14]),
                        Forms\Components\Section::make('Características de carrera')
                            ->schema([
                                Forms\Components\ToggleButtons::make('status')
                                    ->label('Estado en sitio web')
                                    ->options(CareerStatus::class)
                                    ->default(CareerStatus::DRAFT->value)
                                    ->required()
                                    ->live()
                                    ->columns(3)->extraAttributes(['style' => 'display: flex; flex-direction: row; justify-content: space-around; flex-wrap: wrap;'])
                                    ->helperText(fn($state) =>
                                        $state ? CareerStatus::tryFrom($state)?->getDescription() : ''
                                    ),
                                Forms\Components\TextInput::make('duration')
                                    ->label('Duración')
                                    ->helperText('Ejemplo: 2 años, 3 años y medio, etc.')
                                    ->required(),
                                Forms\Components\TextInput::make('modality')
                                    ->label('Modalidad')
                                    ->helperText('Ejemplo: Presencial, Semipresencial, Distancia, etc.')
                                    ->required(),
                            ])
                            ->columnSpan(['default' => 1, 'md' => 11, 'lg' => 24, 'xl' => 10]),
                    ])->columns(['default' => 1, 'md' => 24, 'xl' => 24]),

                Forms\Components\Section::make('Contenido de la carrera')
                    ->description('Contenido que se mostrará en la página de la carrera')
                    ->schema([
                        Forms\Components\RichEditor::make('scope')
                            ->label('Alcances del Título')
                            ->helperText('Descripción breve de los alcances del título')
                            ->fileAttachmentsDirectory('career-attachments')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('study_plan')
                            ->label('Plan de Estudio')
                            ->helperText('Descripción breve del plan de estudio, enumerando las asignaturas y su duración')
                            ->columnSpanFull()
                            ->minItems(1)
                            ->addable(true)
                            ->reorderableWithDragAndDrop(true)
                            ->grid(3)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Nombre del periodo')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Ejemplo: 1º Año, Primer cuatrimestre, etc.'),
                                Forms\Components\Repeater::make('subjects')
                                    ->label('Materias a cursar')
                                    ->columnSpanFull()
                                    ->minItems(1)
                                    ->addable(true)
                                    ->reorderableWithDragAndDrop(true)
                                    ->grid(1)
                                    ->schema([
                                        Forms\Components\TextInput::make('subject')
                                            ->label('Nombre de la materia')
                                            ->required()
                                            ->maxLength(255),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->description(fn(Career $record): string => "carreras/{$record->slug}")
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('resolution')
                    ->label('Resolución de carrera')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->label('Estado en sitio web')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListCareers::route('/'),
            'create' => Pages\CreateCareer::route('/create'),
            'view'   => Pages\ViewCareer::route('/{record}'),
            'edit'   => Pages\EditCareer::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
