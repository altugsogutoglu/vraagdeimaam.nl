<?php

namespace App\Filament\Resources\Questions\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn as TableTextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Actions\Action;
use Filament\Tables\Table;

class QuestionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('question')
                    ->label('Vraag')
                    ->limit(100)
                    ->tooltip(function (TableTextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 100) {
                            return null;
                        }
                        return $state;
                    })
                    ->searchable(),
                
                TextColumn::make('category.name')
                    ->label('Categorie')
                    ->badge()
                    ->color(fn ($record) => $record->category->color ?? 'gray'),
                
                TextColumn::make('tags.name')
                    ->label('Tags')
                    ->badge()
                    ->separator(','),
                
                IconColumn::make('is_approved')
                    ->label('Goedgekeurd')
                    ->boolean(),
                
                IconColumn::make('is_featured')
                    ->label('Uitgelicht')
                    ->boolean(),
                
                TextColumn::make('views_count')
                    ->label('Bekeken')
                    ->sortable(),
                
                TextColumn::make('answered_at')
                    ->label('Beantwoord')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('Aangemaakt')
                    ->dateTime('d-m-Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Categorie')
                    ->relationship('category', 'name'),
                
                TernaryFilter::make('is_approved')
                    ->label('Goedgekeurd')
                    ->placeholder('Alle vragen')
                    ->trueLabel('Alleen goedgekeurd')
                    ->falseLabel('Alleen niet goedgekeurd'),
                
                TernaryFilter::make('answer')
                    ->label('Beantwoord')
                    ->placeholder('Alle vragen')
                    ->trueLabel('Alleen beantwoord')
                    ->falseLabel('Alleen niet beantwoord')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('answer'),
                        false: fn ($query) => $query->whereNull('answer'),
                    ),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Goedkeuren')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->action(fn ($record) => $record->update(['is_approved' => true]))
                    ->visible(fn ($record) => !$record->is_approved),
                
                Action::make('feature')
                    ->label('Uitlichten')
                    ->icon('heroicon-o-star')
                    ->color('warning')
                    ->action(fn ($record) => $record->update(['is_featured' => !$record->is_featured]))
                    ->visible(fn ($record) => $record->is_approved),
                
            ])
            ->defaultSort('created_at', 'desc');
    }
}