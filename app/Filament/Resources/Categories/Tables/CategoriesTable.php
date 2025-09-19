<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn as TableTextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CategoriesTable
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
                
                TextColumn::make('description')
                    ->label('Beschrijving')
                    ->limit(50)
                    ->tooltip(function (TableTextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),
                
                ColorColumn::make('color')
                    ->label('Kleur'),
                
                TextColumn::make('sort_order')
                    ->label('Volgorde')
                    ->sortable(),
                
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
            ->defaultSort('sort_order');
    }
}