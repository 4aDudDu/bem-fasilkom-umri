<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AngkatanBemResource\Pages;
use App\Models\AngkatanBem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AngkatanBemResource extends Resource
{
    protected static ?string $model = AngkatanBem::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Angkatan BEM';

    protected static ?string $pluralLabel = 'Angkatan BEM';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->label('Tahun Akademik')
                    ->placeholder('Contoh: 2024/2025')
                    ->required(),
                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Set sebagai Angkatan Aktif')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('activate')
                    ->label('Aktifkan')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(function (AngkatanBem $record) {
                        AngkatanBem::query()->update(['is_active' => false]);
                        $record->update(['is_active' => true]);
                    })
                    ->requiresConfirmation()
                    ->hidden(fn (AngkatanBem $record) => $record->is_active),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
