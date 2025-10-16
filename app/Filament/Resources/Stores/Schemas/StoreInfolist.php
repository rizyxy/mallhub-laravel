<?php

namespace App\Filament\Resources\Stores\Schemas;

use App\Models\Store;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class StoreInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('name'),
                TextEntry::make('logo_url'),
                ImageEntry::make('logo_url'),
                TextEntry::make('floor.name')
                    ->label('Floor'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn(Store $record): bool => $record->trashed()),
            ]);
    }
}
