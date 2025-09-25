<?php

namespace App\Filament\Resources\Stores\Schemas;

use App\Models\Store;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;

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
                TextEntry::make('floor.id')
                    ->label('Floor'),
                TextEntry::make('name'),
                ImageEntry::make('logo_url'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn(Store $record): bool => $record->trashed()),
            ]);
    }
}
