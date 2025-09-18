<?php

namespace App\Filament\Resources\Questions\Schemas;

use App\Models\Category;
use App\Models\Tag;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Schema;

class QuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Vraag Informatie')
                    ->schema([
                        Textarea::make('question')
                            ->label('Vraag')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Select::make('category_id')
                            ->label('Categorie')
                            ->options(Category::active()->pluck('name', 'id'))
                            ->required()
                            ->searchable(),
                        
                        TagsInput::make('tags')
                            ->label('Tags')
                            ->suggestions(Tag::active()->pluck('name')->toArray())
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                
                Section::make('Antwoord')
                    ->schema([
                        Textarea::make('answer')
                            ->label('Antwoord')
                            ->rows(6)
                            ->columnSpanFull(),
                    ]),
                
                Section::make('Status & Instellingen')
                    ->schema([
                        Toggle::make('is_approved')
                            ->label('Goedgekeurd')
                            ->default(false),
                        
                        Toggle::make('is_featured')
                            ->label('Uitgelicht')
                            ->default(false),
                    ])
                    ->columns(2),
            ]);
    }
}