<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class VragenController extends Controller
{
    public function index(Request $request)
    {
        $query = Question::approved()->with(['category', 'tags']);

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Category filter
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        // Tag filter
        if ($request->filled('tags')) {
            $tagIds = is_array($request->tags) ? $request->tags : explode(',', $request->tags);
            $query->withTags($tagIds);
        }

        // Sort options
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'most_viewed':
                $query->orderBy('views_count', 'desc');
                break;
            case 'featured':
                $query->featured();
                break;
            default:
                $query->latest();
        }

        $questions = $query->paginate(12)->withQueryString()->withPath(route('vragen.index'));

        $categories = Category::active()
            ->withCount('approvedQuestions')
            ->having('approved_questions_count', '>', 0)
            ->ordered()
            ->get();

        $tags = Tag::active()
            ->withCount('questions')
            ->having('questions_count', '>', 0)
            ->ordered()
            ->get();

        return view('vragen.index', compact('questions', 'categories', 'tags'));
    }

    public function show(Question $question)
    {
        // Only show approved questions
        if (!$question->is_approved) {
            abort(404);
        }

        // Increment view count
        $question->incrementViews();

        $relatedQuestions = Question::approved()
            ->where('id', '!=', $question->id)
            ->where('category_id', $question->category_id)
            ->with(['category', 'tags'])
            ->limit(6)
            ->get();

        return view('vragen.show', compact('question', 'relatedQuestions'));
    }
}