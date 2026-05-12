<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $label = 'Agenda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('angkatan_bem_id')
                            ->relationship('angkatanBem', 'tahun')
                            ->required(),
                        Forms\Components\DateTimePicker::make('start_time')
                            ->required(),
                        Forms\Components\DateTimePicker::make('end_time'),
                        Forms\Components\TextInput::make('location')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('registration_link')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('poster')
                            ->image()
                            ->directory('agendas')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('poster')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('angkatanBem.tahun')
                    ->label('Angkatan')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('angkatan')
                    ->relationship('angkatanBem', 'tahun'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
