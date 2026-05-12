<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanResource\Pages;
use App\Models\Laporan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LaporanResource extends Resource
{
    protected static ?string $model = Laporan::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Layanan';
    protected static ?string $label = 'Laporan Mahasiswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Laporan')
                    ->schema([
                        Forms\Components\TextInput::make('nomor_laporan')
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nim')
                            ->label('NIM')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('category')
                            ->options([
                                'Akademik' => 'Akademik',
                                'Fasilitas' => 'Fasilitas',
                                'Organisasi' => 'Organisasi',
                                'Keluhan' => 'Keluhan',
                                'Saran' => 'Saran',
                            ])
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'proses' => 'Diproses',
                                'selesai' => 'Selesai',
                                'ditolak' => 'Ditolak',
                            ])
                            ->required()
                            ->default('pending'),
                        Forms\Components\Textarea::make('isi_laporan')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('bukti')
                            ->image()
                            ->directory('laporan/bukti')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('catatan_admin')
                            ->label('Tanggapan Admin')
                            ->placeholder('Tulis tanggapan atau solusi di sini...')
                            ->columnSpanFull(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_laporan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge(),
                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'proses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'ditolak' => 'Ditolak',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'proses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'ditolak' => 'Ditolak',
                    ]),
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Akademik' => 'Akademik',
                        'Fasilitas' => 'Fasilitas',
                        'Organisasi' => 'Organisasi',
                        'Keluhan' => 'Keluhan',
                        'Saran' => 'Saran',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporans::route('/'),
            'create' => Pages\CreateLaporan::route('/create'),
            'edit' => Pages\EditLaporan::route('/{record}/edit'),
        ];
    }
}
