<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Categorie Informatie')
                    ->schema([
                        TextInput::make('name')
                            ->label('Naam')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('slug')
                            ->label('Slug')
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        
                        Textarea::make('description')
                            ->label('Beschrijving')
                            ->rows(3),
                        
                        ColorPicker::make('color')
                            ->label('Kleur')
                            ->default('#3B82F6'),
                        
                        TextInput::make('sort_order')
                            ->label('Sorteer Volgorde')
                            ->numeric()
                            ->default(0),
                        
                        Toggle::make('is_active')
                            ->label('Actief')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}