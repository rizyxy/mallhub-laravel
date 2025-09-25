<?php

namespace App\Filament\Resources\Stores\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class StoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('floor_id')
                    ->relationship('floor', 'level')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                FileUpload::make('logo_url')
                    ->required(),
            ]);
    }
}
