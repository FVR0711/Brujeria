<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriaResource\Pages;
use App\Filament\Resources\GaleriaResource\RelationManagers;
use App\Models\Galeria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class GaleriaResource extends Resource
{
    protected static ?string $model = Galeria::class;

    protected static ?string $label = 'Galeria';

    protected static ?string $navigationIcon = 'solar-gallery-broken';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("nombre")
                    ->required()
                    ->label("Nombre"),
                FileUpload::make('contenido')
                    ->label("Imagen")
                    ->required()
                    ->getUploadedFileNameForStorageUsing(
                    fn (TemporaryUploadedFile $file,$get): string => (string) str($get("nombre").".".$file->getClientOriginalExtension()??$file->getClientOriginalName()),
                    ),
                TextInput::make("alt")
                    ->required()
                    ->label("Descripcion de la imagen")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id")
                    ->label("ID"),
                TextColumn::make("nombre")
                    ->label("Nombre"),
                ImageColumn::make('contenido')
                    ->square()
                    ->label("Imagen"),
                TextColumn::make("alt")
                    ->label("Descripcion De Imagen")
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
            'index' => Pages\ListGalerias::route('/'),
            'create' => Pages\CreateGaleria::route('/create'),
            'edit' => Pages\EditGaleria::route('/{record}/edit'),
        ];
    }
}
