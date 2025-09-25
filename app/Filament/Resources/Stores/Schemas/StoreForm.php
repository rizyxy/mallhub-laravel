<?php

namespace App\Filament\Resources\Stores\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('floor_id')
                    ->relationship('floor', 'id')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('logo_url')
                    ->url()
                    ->required(),
            ]);
    }
}
