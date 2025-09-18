<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:2000',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ], [
            'question.required' => 'Vraag is verplicht',
            'question.max' => 'Vraag mag maximaal 2000 tekens bevatten',
            'category_id.required' => 'Categorie is verplicht',
            'category_id.exists' => 'Geselecteerde categorie bestaat niet',
            'name.required' => 'Naam is verplicht',
            'email.required' => 'E-mailadres is verplicht',
            'email.email' => 'E-mailadres moet geldig zijn',
            'tags.array' => 'Tags moeten een lijst zijn',
            'tags.*.exists' => 'Een of meer geselecteerde tags bestaan niet',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create question with hashed personal data
            $question = Question::createWithHashedData([
                'question' => $request->question,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // Attach tags if provided
            if ($request->filled('tags')) {
                $question->tags()->attach($request->tags);
            }

            return response()->json([
                'success' => true,
                'message' => 'Uw vraag is succesvol ingediend en wacht op goedkeuring.'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error creating question', [
                'error' => $e->getMessage(),
                'request' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Er is een fout opgetreden. Probeer het later opnieuw.'
            ], 500);
        }
    }

    public function getCategories()
    {
        $categories = Category::active()
            ->ordered()
            ->get(['id', 'name', 'color']);

        return response()->json($categories);
    }

    public function getTags()
    {
        $tags = Tag::active()
            ->ordered()
            ->get(['id', 'name', 'color']);

        return response()->json($tags);
    }
}