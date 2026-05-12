<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroCarouselResource\Pages;
use App\Models\HeroCarousel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroCarouselResource extends Resource
{
    protected static ?string $model = HeroCarousel::class;
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $label = 'Hero Slider';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('hero')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('subtitle')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('button_text')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('button_link')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\Select::make('angkatan_bem_id')
                            ->relationship('angkatanBem', 'tahun')
                            ->required(),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->required(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('angkatanBem.tahun')
                    ->label('Angkatan'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Hanya Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroCarousels::route('/'),
            'create' => Pages\CreateHeroCarousel::route('/create'),
            'edit' => Pages\EditHeroCarousel::route('/{record}/edit'),
        ];
    }
}
