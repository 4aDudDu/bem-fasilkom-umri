<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AngkatanBemResource\Pages;
use App\Filament\Resources\AngkatanBemResource\RelationManagers;
use App\Models\AngkatanBem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AngkatanBemResource extends Resource
{
    protected static ?string $model = AngkatanBem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun_awal')
                    ->required(),
                Forms\Components\TextInput::make('tahun_akhir')
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun_awal'),
                Tables\Columns\TextColumn::make('tahun_akhir'),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAngkatanBems::route('/'),
            'create' => Pages\CreateAngkatanBem::route('/create'),
            'edit' => Pages\EditAngkatanBem::route('/{record}/edit'),
        ];
    }
}
