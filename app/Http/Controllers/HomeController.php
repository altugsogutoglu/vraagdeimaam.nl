<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredQuestions = Question::approved()
            ->featured()
            ->with(['category', 'tags'])
            ->latest()
            ->limit(6)
            ->get();

        $recentQuestions = Question::approved()
            ->with(['category', 'tags'])
            ->latest()
            ->limit(8)
            ->get();

        $categories = Category::active()
            ->withCount('approvedQuestions')
            ->having('approved_questions_count', '>', 0)
            ->ordered()
            ->limit(8)
            ->get();

        $stats = [
            'total_questions' => Question::approved()->count(),
            'total_categories' => Category::active()->count(),
            'answered_questions' => Question::approved()->answered()->count(),
        ];

        return view('home', compact('featuredQuestions', 'recentQuestions', 'categories', 'stats'));
    }
}