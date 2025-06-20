<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PklResource\Pages;
use App\Models\Pkl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'PKL';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('siswa_id')
                ->label('Siswa')
                ->relationship('siswa', 'nama')
                ->searchable()
                ->required(),

            Forms\Components\Select::make('industri_id')
                ->label('Industri')
                ->relationship('industri', 'nama') // sesuai nama relasi
                ->searchable()
                ->required(),

            Forms\Components\Select::make('guru_id')
                ->label('Guru')
                ->relationship('guru', 'nama')
                ->searchable()
                ->required(),

            Forms\Components\DatePicker::make('mulai')
                ->label('Tanggal Mulai')
                ->required(),

            Forms\Components\DatePicker::make('selesai')
                ->label('Tanggal Selesai')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')->label('Siswa'),
                Tables\Columns\TextColumn::make('industri.nama')->label('Industri'), // sesuai nama relasi
                Tables\Columns\TextColumn::make('guru.nama')->label('Guru'),
                Tables\Columns\TextColumn::make('mulai')->date()->label('Mulai'),
                Tables\Columns\TextColumn::make('selesai')->date()->label('Selesai'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPkls::route('/'),
            'create' => Pages\CreatePkl::route('/create'),
            'edit' => Pages\EditPkl::route('/{record}/edit'),
        ];
    }
}
