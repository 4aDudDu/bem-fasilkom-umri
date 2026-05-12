<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Organisasi';
    protected static ?string $label = 'Anggota BEM';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Anggota')
                    ->schema([
                        Forms\Components\FileUpload::make('photo')
                            ->image()
                            ->avatar()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/heic', 'image/heif'])
                            ->disk('public')
                            ->directory('members')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nim')
                            ->label('NIM')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('jabatan')
                            ->required()
                            ->placeholder('Contoh: Ketua, Sekretaris, dll')
                            ->maxLength(255),
                        Forms\Components\Select::make('division_id')
                            ->relationship('division', 'name')
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('angkatan_bem_id')
                            ->relationship('angkatanBem', 'tahun')
                            ->label('Periode BEM')
                            ->required(),
                        Forms\Components\TextInput::make('instagram')
                            ->prefix('https://instagram.com/')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('bio')
                            ->columnSpanFull(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->disk('public')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nim')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->badge()
                    ->color('success')
                    ->sortable(),
                Tables\Columns\TextColumn::make('division.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('angkatanBem.tahun')
                    ->label('Periode')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('division')
                    ->relationship('division', 'name'),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
