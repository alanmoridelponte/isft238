<?php
namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class TagResource extends Resource {
    protected static ?string $model                = Tag::class;
    protected static ?string $modelLabel           = 'Etiqueta';
    protected static ?string $pluralModelLabel     = 'Etiquetas';
    protected static ?string $navigationIcon       = 'heroicon-o-tag';
    protected static ?string $activeNavigationIcon = 'heroicon-s-tag';
    protected static ?string $navigationGroup      = 'Blog';
    protected static ?int $navigationSort          = 3;
    protected static ?string $slug                 = 'blog/tags';

    public static function form(Form $form): Form {
        return $form
            ->schema([
                Section::make('Información básica')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255)
                            ->unique(Tag::class, 'name', ignoreRecord: true)
                            ->reactive()
                            ->debounce(600)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->columnSpan(['default' => 6, 'md' => 6, 'lg' => 13]),

                        Forms\Components\TextInput::make('slug')
                            ->label('Alias')
                            ->required()
                            ->unique(Tag::class, 'slug', ignoreRecord: true)
                            ->helperText('Fragmento de URL amigable')
                            ->dehydrated(fn($state) => ! empty($state))
                            ->columnSpan(['default' => 6, 'md' => 6, 'lg' => 11]),
                    ])
                    ->columns(['default' => 6, 'md' => 12, 'lg' => 24]),
            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->description(fn(Tag $record): string => "blog/etiquetas/{$record->slug}")
                    ->searchable()
                    ->sortable(),

                TextColumn::make('posts_count')
                    ->label('Entradas relacionadas')
                    ->description("Número de entradas relacionadas a esta etiqueta", position: 'above')
                    ->color('primary')
                    ->icon('heroicon-s-document-text')
                    ->badge()
                    ->formatStateUsing(fn($state, $record) => "Entradas relacionadas: {$state}")
                    ->url(fn($record) => PostResource::getUrl('index', [
                        'tableFilters' => [
                            'tags' => ['values' => [$record->id]],
                        ],
                    ]))
                    ->counts('posts'),
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
            'index'  => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit'   => Pages\EditTag::route('/{record}/edit'),
            'view'   => Pages\ViewTag::route('/{record}/view'),
        ];
    }
}
