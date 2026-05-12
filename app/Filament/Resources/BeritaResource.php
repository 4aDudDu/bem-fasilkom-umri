<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $label = 'Berita';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make('Konten Berita')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(Berita::class, 'slug', ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->required()
                                    ->rows(3)
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('content')
                                    ->required()
                                    ->columnSpanFull()
                                    ->fileAttachmentsDirectory('berita/attachments'),
                            ])->columnSpan(2),

                        Forms\Components\Section::make('Metadata & Media')
                            ->schema([
                                Forms\Components\FileUpload::make('thumbnail')
                                    ->image()
                                    ->disk('public')
                                    ->directory('berita/thumbnails')
                                    ->required(),
                                Forms\Components\FileUpload::make('images')
                                    ->label('Gallery Foto (Opsional)')
                                    ->image()
                                    ->multiple()
                                    ->reorderable()
                                    ->disk('public')
                                    ->directory('berita/gallery')
                                    ->columnSpanFull(),
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->required(),
                                Forms\Components\Select::make('angkatan_bem_id')
                                    ->relationship('angkatanBem', 'tahun')
                                    ->searchable()
                                    ->required(),
                                Forms\Components\Select::make('author_id')
                                    ->relationship('author', 'name')
                                    ->default(auth()->id())
                                    ->required(),
                                Forms\Components\TagsInput::make('tags'),
                                Forms\Components\DateTimePicker::make('published_at')
                                    ->default(now()),
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Publish Sekarang')
                                    ->default(true),
                            ])->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(40)
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->badge()
                    ->color(fn ($record) => $record->category->color ?? 'primary')
                    ->sortable(),
                Tables\Columns\TextColumn::make('angkatanBem.tahun')
                    ->label('Angkatan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->badge()
                    ->color('info')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
                Tables\Filters\SelectFilter::make('angkatan')
                    ->relationship('angkatanBem', 'tahun'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publish'),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
