<?php
namespace App\Filament\Resources;

use App\Enums\PostStatus;
use App\Filament\Resources\PostResource\Pages;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\ViewRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PostResource extends Resource {
    protected static ?string $model                = Post::class;
    protected static ?string $modelLabel           = 'Entrada';
    protected static ?string $pluralModelLabel     = 'Entradas';
    protected static ?string $navigationIcon       = 'heroicon-o-document-text';
    protected static ?string $activeNavigationIcon = 'heroicon-s-document-text';
    protected static ?string $navigationGroup      = 'Blog';
    protected static ?int $navigationSort          = 1;
    protected static ?string $slug                 = 'blog/posts';

    public static function form(Form $form): Form {
        return $form
            ->schema([
                Forms\Components\Fieldset::make("Información de la entrada")
                    ->schema([
                        Forms\Components\Placeholder::make('creator.name')
                            ->label('Autor')
                            ->content(fn(?Post $record): string => $record?->creator?->name ?? '-')
                            ->columnSpan(['default' => 2, 'md' => 1]),

                        Forms\Components\Placeholder::make('created_at')->label('Creado el')
                            ->content(fn(?Post $record): string =>
                                $record?->created_at?->format('d/m/Y H:i') ?? '-'
                            )->columnSpan(1),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización')
                            ->content(fn(?Post $record): string =>
                                $record?->updated_at?->format('d/m/Y H:i') ?? '-'
                            )->columnSpan(1),
                    ])
                    ->columns(['default' => 2, 'md' => 3, 'lg' => 3])
                    ->visible(fn(Page $livewire): bool => $livewire instanceof ViewRecord || $livewire instanceof EditRecord),

                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Section::make('Contenido principal')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Título')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(Post::class, 'name', ignoreRecord: true)
                                            ->reactive()
                                            ->debounce(600)
                                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                            ->columnSpan(['default' => 1, 'lg' => 13]),

                                        Forms\Components\TextInput::make('slug')
                                            ->label('Alias')
                                            ->required()
                                            ->unique(Post::class, 'slug', ignoreRecord: true)
                                            ->helperText('Fragmento de URL amigable')
                                            ->dehydrated(fn($state) => ! empty($state))
                                            ->columnSpan(['default' => 1, 'lg' => 11]),
                                    ])
                                    ->columns(['default' => 1, 'lg' => 24]),

                                Forms\Components\TextInput::make('excerpt')
                                    ->label('Extracto')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Resumen breve de la entrada'),
                            ])
                            ->columnSpan(['default' => 1, 'md' => 13, 'lg' => 24, 'xl' => 14]),

                        Forms\Components\Section::make('Configuración en el blog')
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->label('Categoría de la entrada')
                                    ->relationship(name: 'category', titleAttribute: 'name')
                                    ->searchable(['name', 'slug'])
                                    ->preload()
                                    ->required()
                                    ->when(
                                        auth()->user()->can('create_category'),
                                        fn($select) => $select
                                            ->createOptionModalHeading('Crear nueva categoría')
                                            ->createOptionForm([
                                                Forms\Components\Grid::make()
                                                    ->schema([
                                                        Forms\Components\TextInput::make('name')
                                                            ->label('Nombre')
                                                            ->required()
                                                            ->maxLength(255)
                                                            ->unique(Category::class, 'name')
                                                            ->reactive()
                                                            ->debounce(600)
                                                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                                            ->columnSpan(['default' => 6, 'md' => 6, 'lg' => 13]),

                                                        Forms\Components\TextInput::make('slug')
                                                            ->label('Alias')
                                                            ->required()
                                                            ->unique(Category::class, 'slug')
                                                            ->helperText('Fragmento de URL amigable')
                                                            ->dehydrated(fn($state) => ! empty($state))
                                                            ->columnSpan(['default' => 6, 'md' => 6, 'lg' => 11]),
                                                    ])
                                                    ->columns(['default' => 6, 'md' => 12, 'lg' => 24]),
                                            ])
                                    ),

                                Forms\Components\Select::make('tags')
                                    ->label('Etiquetas de la entrada')
                                    ->relationship(name: 'tags', titleAttribute: 'name')
                                    ->searchable(['name', 'slug'])
                                    ->preload()
                                    ->multiple()
                                    ->when(
                                        auth()->user()->can('create_tag'),
                                        fn($select) => $select
                                            ->createOptionModalHeading('Crear nueva etiqueta')
                                            ->createOptionForm([
                                                Forms\Components\Grid::make()
                                                    ->schema([
                                                        Forms\Components\TextInput::make('name')
                                                            ->label('Nombre')
                                                            ->required()
                                                            ->maxLength(255)
                                                            ->unique(Tag::class, 'name')
                                                            ->reactive()
                                                            ->debounce(600)
                                                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                                            ->columnSpan(['default' => 6, 'md' => 6, 'lg' => 13]),

                                                        Forms\Components\TextInput::make('slug')
                                                            ->label('Alias')
                                                            ->required()
                                                            ->unique(Tag::class, 'slug')
                                                            ->helperText('Fragmento de URL amigable')
                                                            ->dehydrated(fn($state) => ! empty($state))
                                                            ->columnSpan(['default' => 6, 'md' => 6, 'lg' => 11]),
                                                    ])
                                                    ->columns(['default' => 6, 'md' => 12, 'lg' => 24]),
                                            ])
                                    ),

                                Forms\Components\ToggleButtons::make('status')
                                    ->label('Estado')
                                    ->options(PostStatus::class)
                                    ->default(PostStatus::DRAFT->value)
                                    ->required()
                                    ->live()
                                    ->columns(3)->extraAttributes(['style' => 'display: flex; flex-direction: row; justify-content: space-around; flex-wrap: wrap;'])
                                    ->helperText(fn($state) =>
                                        $state ? PostStatus::tryFrom($state)?->getDescription() : ''
                                    ),
                            ])
                            ->columnSpan(['default' => 1, 'md' => 11, 'lg' => 24, 'xl' => 10]),
                    ])->columns(['default' => 1, 'md' => 24, 'xl' => 24]),

                Forms\Components\Section::make('Contenido de la entrada')
                    ->description('Los datos que veremos en la entrada')
                    ->schema([
                        Forms\Components\FileUpload::make('banner')
                            ->label('Imagen de portada')
                            ->image()
                            ->imageEditor()
                            ->imageEditorMode(1)
                            ->imageCropAspectRatio('16:9')
                            ->imageEditorAspectRatios([
                                '16:9',
                            ])
                            ->uploadingMessage('Subiendo imagen...')
                            ->moveFiles()
                            ->getUploadedFileNameForStorageUsing(fn(TemporaryUploadedFile $file): string => (string) str($file->getFilename())->prepend('blog-resource-'))
                            ->nullable()
                            ->helperText('Imagen de portada y principal de la entrada'),

                        Forms\Components\RichEditor::make('body')
                            ->label('Contenido')
                            ->helperText('Cuerpo de la entrada')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('banner_video_url')
                            ->label('Contenido en lenguaje de señas')
                            ->helperText('URL del video de contenido en lenguaje de señas')
                            ->url()
                            ->nullable()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                // Estado con badge colorido
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado')
                    ->badge(),

                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Autor')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Información principal
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->description(fn(Post $record): string => "blog/{$record->category->slug}/{$record->slug}")
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                // Relaciones
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Categoría')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-s-squares-plus')
                    ->badge(),

                Tables\Columns\TextColumn::make('tags.name')
                    ->label('Etiquetas')
                    ->searchable()
                    ->icon('heroicon-s-tag')
                    ->badge()
                    ->listWithLineBreaks()
                    ->limitList(1)
                    ->expandableLimitedList()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Fechas
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Última actualización')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filtro por estado
                Tables\Filters\SelectFilter::make('status')
                    ->label('Estado')
                    ->options(PostStatus::class)
                    ->translateLabel(),

                // Filtro por categoría
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Categoría')
                    ->relationship(name: 'category', titleAttribute: 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),

                // Filtro por etiquetas
                Tables\Filters\SelectFilter::make('tags')
                    ->label('Etiquetas')
                    ->relationship(name: 'tags', titleAttribute: 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),

                // Filtro por autor
                Tables\Filters\SelectFilter::make('created_by')
                    ->label('Autor')
                    ->relationship(name: 'creator', titleAttribute: 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),

                // Filtro de registros eliminados
                Tables\Filters\TrashedFilter::make()
                    ->label('Mostrar'),
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
        return [];
    }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit'   => Pages\EditPost::route('/{record}/edit'),
            'view'   => Pages\ViewPost::route('/{record}/view'),
        ];
    }
}
