<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustrisResource\Pages;
use App\Models\Industris;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class IndustrisResource extends Resource
{
    protected static ?string $model = Industris::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Industri')
                    ->placeholder('Masukkan nama industri')
                    ->required(),

                Forms\Components\TextInput::make('bidang_usaha')
                    ->label('Bidang Usaha')
                    ->placeholder('Contoh: Otomotif, Teknologi, dsb.')
                    ->required(),

                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat Industri')
                    ->placeholder('Masukkan alamat lengkap')
                    ->rows(3)
                    ->required(),

                Forms\Components\TextInput::make('kontak')
                    ->label('No. Kontak')
                    ->tel()
                    ->placeholder('08xxxxxxxxxx')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('Email Industri')
                    ->email()
                    ->placeholder('contoh@email.com')
                    ->required(),

                Forms\Components\Select::make('guru_id')
                    ->label('Guru Pembimbing')
                    ->relationship('guru', 'nama') // Asumsinya sudah ada relasi guru() di model
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama Industri')->searchable(),
                Tables\Columns\TextColumn::make('bidang_usaha')->label('Bidang Usaha')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->label('Alamat')->limit(30),
                Tables\Columns\TextColumn::make('kontak')->label('Kontak'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('guru.nama')->label('Guru Pembimbing'),
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
            'index' => Pages\ListIndustris::route('/'),
            'create' => Pages\CreateIndustris::route('/create'),
            'edit' => Pages\EditIndustris::route('/{record}/edit'),
        ];
    }
}
