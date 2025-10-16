<?php

namespace App\Filament\Resources\Stores\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('logo_url')
                    ->image()
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->directory('store-logos')
                    ->visibility('public'),
                Select::make('floor_id')
                    ->relationship('floor', 'name')
                    ->required(),
            ]);
    }
}
