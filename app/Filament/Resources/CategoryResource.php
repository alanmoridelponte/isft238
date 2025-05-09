<?php
namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Camya\Filament\Forms\Components\TitleWithSlugInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Validation\Rules\Unique;

class CategoryResource extends Resource {
    protected static ?string $model                = Category::class;
    protected static ?string $modelLabel           = 'Categoría';
    protected static ?string $pluralModelLabel     = 'Categorías';
    protected static ?string $navigationIcon       = 'heroicon-o-squares-plus';
    protected static ?string $activeNavigationIcon = 'heroicon-s-squares-plus';
    protected static ?string $navigationGroup      = 'Blog';
    protected static ?int $navigationSort          = 2;
    protected static ?string $slug                 = 'blog/categories';

    public static function form(Form $form): Form {
        return $form
            ->schema([
                Section::make('Información básica')
                    ->schema([
                        TitleWithSlugInput::make(
                            fieldTitle: 'name',
                            fieldSlug: 'slug',
                            urlPath: '/blog/',
                            urlVisitLinkVisible: false,
                            titleLabel: 'Nombre de la etiqueta',
                            titlePlaceholder: 'Inserta el nombre de la etiqueta...',
                            slugLabel: 'URL:',
                            titleRules: [
                                'required',
                                'string',
                                'min:3',
                                'max:255',
                            ],
                            titleRuleUniqueParameters: [
                                'ignorable'       => fn(?Category $record)       => $record,
                                'modifyRuleUsing' => fn(Unique $rule) => $rule->whereNull('deleted_at'),
                                'column'          => 'name',
                                'ignoreRecord'    => true,
                            ],
                            slugRuleUniqueParameters: [
                                'ignorable'    => fn(?Category $record)    => $record,
                                'column'       => 'slug',
                                'ignoreRecord' => true,
                            ],
                        ),
                    ]),
            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->description(fn(Category $record): string => "blog/{$record->slug}")
                    ->searchable()
                    ->sortable(),

                TextColumn::make('posts_count')
                    ->label('Entradas relacionadas')
                    ->description("Número de entradas relacionadas a esta categoría", position: 'above')
                    ->color('primary')
                    ->icon('heroicon-s-document-text')
                    ->badge()
                    ->formatStateUsing(fn($state, $record) => "Entradas relacionadas: {$state}")
                    ->url(fn($record) => PostResource::getUrl('index', [
                        'tableFilters' => [
                            'category_id' => ['values' => [$record->id]],
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
            'index'  => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit'   => Pages\EditCategory::route('/{record}/edit'),
            'view'   => Pages\ViewCategory::route('/{record}/view'),
        ];
    }
}
