<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuplierResource\Pages;
use App\Filament\Resources\SuplierResource\RelationManagers;
use App\Models\Suplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuplierResource extends Resource
{
    protected static ?string $model = Suplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_perusahaan')->label('Nama Perusahaan')
                ->required(),
                Forms\Components\TextInput::make('nama')->label('Nama')
                ->required(),
                Forms\Components\TextInput::make('no_hp')->label('Nomor Handphone')
                ->required()->unique(ignoreRecord: true)->tel(),
                Forms\Components\TextInput::make('email')->label('Email')
                ->required()->email(),
                Forms\Components\Textarea::make('alamat')->label('Alamat')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_perusahaan')->label('Nama Customer')
                ->searchable(true),
                Tables\Columns\TextColumn::make('nama')->label('Nama'),
                Tables\Columns\TextColumn::make('no_hp')->label('Nomor Handphone')->searchable(true),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable(true),
                Tables\Columns\TextColumn::make('alamat')->searchable(true),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupliers::route('/'),
            'create' => Pages\CreateSuplier::route('/create'),
            'edit' => Pages\EditSuplier::route('/{record}/edit'),
        ];
    }
}
