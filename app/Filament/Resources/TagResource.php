<?php
namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Models\Tag;
use Camya\Filament\Forms\Components\TitleWithSlugInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Validation\Rules\Unique;

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
                        TitleWithSlugInput::make(
                            fieldTitle: 'name',
                            fieldSlug: 'slug',
                            urlPath: '/blog/etiquetas/',
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
                                'ignorable'       => fn(?Tag $record)       => $record,
                                'modifyRuleUsing' => fn(Unique $rule) => $rule->whereNull('deleted_at'),
                                'column'          => 'name',
                                'ignoreRecord'    => true,
                            ],
                            slugRuleUniqueParameters: [
                                'ignorable'    => fn(?Tag $record)    => $record,
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
