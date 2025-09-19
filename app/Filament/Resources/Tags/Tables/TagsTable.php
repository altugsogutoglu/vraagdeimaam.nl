<?php

namespace App\Filament\Resources\Tags\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TagsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Naam')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                
                ColorColumn::make('color')
                    ->label('Kleur'),
                
                IconColumn::make('is_active')
                    ->label('Actief')
                    ->boolean(),
                
                TextColumn::make('questions_count')
                    ->label('Vragen')
                    ->counts('questions'),
                
                TextColumn::make('created_at')
                    ->label('Aangemaakt')
                    ->dateTime('d-m-Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        1 => 'Actief',
                        0 => 'Inactief',
                    ]),
            ])
            ->defaultSort('name');
    }
}