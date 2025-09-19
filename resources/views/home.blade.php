@extends('layouts.app')

@section('title', 'Vraag de Imaam - Islamitische Vragen en Antwoorden')
@section('description', 'Stel anoniem je islamitische vragen en krijg betrouwbare antwoorden van deskundigen. Een veilige plek voor alle moslims om te leren en te groeien.')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-green-50 to-green-100 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                Vraag de <span class="text-green-600">Imaam</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-700 mb-8 max-w-3xl mx-auto">
                Stel anoniem je islamitische vragen en krijg betrouwbare antwoorden van deskundigen. 
                Een veilige plek voor alle moslims om te leren en te groeien.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('vragen.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 shadow-lg">
                    Bekijk Vragen
                </a>
                <button onclick="openQuestionModal()" class="bg-white hover:bg-gray-50 text-green-600 font-semibold py-3 px-8 rounded-lg border-2 border-green-600 transition-colors duration-200 shadow-lg">
                    Stel een Vraag
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="p-6">
                <div class="text-4xl font-bold text-green-600 mb-2">{{ number_format($stats['total_questions']) }}</div>
                <div class="text-gray-600">Vragen Beantwoord</div>
            </div>
            <div class="p-6">
                <div class="text-4xl font-bold text-green-600 mb-2">{{ number_format($stats['total_categories']) }}</div>
                <div class="text-gray-600">Categorieën</div>
            </div>
            <div class="p-6">
                <div class="text-4xl font-bold text-green-600 mb-2">{{ number_format($stats['answered_questions']) }}</div>
                <div class="text-gray-600">Vragen Met Antwoord</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Questions Section -->
@if($featuredQuestions->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Uitgelichte Vragen</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Bekijk enkele van de meest gestelde en belangrijke islamitische vragen
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredQuestions as $question)
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 p-6">
                <div class="flex items-center mb-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium" style="background-color: {{ $question->category->color }}20; color: {{ $question->category->color }};">
                        {{ $question->category->name }}
                    </span>
                    <span class="ml-2 text-xs text-gray-500">{{ $question->created_at->diffForHumans() }}</span>
                </div>
                
                <h3 class="text-lg font-semibold text-gray-900 mb-3 line-clamp-2">
                    {{ Str::limit($question->question, 100) }}
                </h3>
                
                @if($question->answer)
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                    {{ Str::limit(strip_tags($question->answer), 150) }}
                </p>
                @endif
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span class="text-sm text-gray-500">{{ $question->views_count }} keer bekeken</span>
                    </div>
                    <a href="{{ route('vragen.show', $question) }}" class="text-green-600 hover:text-green-700 font-medium text-sm">
                        Lees meer →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Categories Section -->
@if($categories->count() > 0)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Categorieën</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Vind vragen per onderwerp en categorie
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <a href="{{ route('vragen.index', ['category' => $category->id]) }}" class="group">
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-200 p-6 border-l-4" style="border-left-color: {{ $category->color }};">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-green-600 transition-colors duration-200">
                            {{ $category->name }}
                        </h3>
                        <span class="text-sm text-gray-500">{{ $category->approved_questions_count }} vragen</span>
                    </div>
                    @if($category->description)
                    <p class="text-gray-600 text-sm">{{ Str::limit($category->description, 80) }}</p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Recent Questions Section -->
@if($recentQuestions->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Recente Vragen</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                De nieuwste vragen die zijn gesteld en beantwoord
            </p>
        </div>
        
        <div class="space-y-4">
            @foreach($recentQuestions as $question)
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 p-6">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center mb-3">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium mr-3" style="background-color: {{ $question->category->color }}20; color: {{ $question->category->color }};">
                                {{ $question->category->name }}
                            </span>
                            <span class="text-sm text-gray-500">{{ $question->created_at->diffForHumans() }}</span>
                        </div>
                        
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">
                            <a href="{{ route('vragen.show', $question) }}" class="hover:text-green-600 transition-colors duration-200">
                                {{ $question->question }}
                            </a>
                        </h3>
                        
                        @if($question->tags->count() > 0)
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($question->tags->take(3) as $tag)
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                {{ $tag->name }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                        
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            {{ $question->views_count }} keer bekeken
                        </div>
                    </div>
                    
                    @if($question->answer)
                    <div class="ml-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            Beantwoord
                        </span>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-8">
            <a href="{{ route('vragen.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 shadow-lg">
                Bekijk Alle Vragen
            </a>
        </div>
    </div>
</section>
@endif

<!-- Question Modal -->
<div id="questionModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Stel een Vraag</h3>
                    <button onclick="closeQuestionModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <form id="questionForm" action="{{ route('question.store') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="question" class="block text-sm font-medium text-gray-700 mb-2">
                                Jouw Vraag *
                            </label>
                            <textarea id="question" name="question" rows="4" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                placeholder="Stel hier je islamitische vraag..."></textarea>
                        </div>
                        
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Categorie *
                            </label>
                            <select id="category_id" name="category_id" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Selecteer een categorie</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Naam (anoniem)
                                </label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    placeholder="Je naam wordt niet getoond (optioneel)">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    E-mail (anoniem)
                                </label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    placeholder="Je e-mail wordt niet getoond (optioneel)">
                            </div>
                        </div>
                        
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-green-800">
                                        <strong>Privacy gegarandeerd:</strong> Je naam en e-mailadres worden gehashed en zijn nooit zichtbaar voor anderen. 
                                        Alleen je vraag wordt getoond na goedkeuring.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeQuestionModal()"
                                class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">
                                Annuleren
                            </button>
                            <button type="submit"
                                class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors duration-200">
                                Vraag Indienen
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openQuestionModal() {
    document.getElementById('questionModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeQuestionModal() {
    document.getElementById('questionModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Handle form submission
document.getElementById('questionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitButton = this.querySelector('button[type="submit"]');
    const originalText = submitButton.textContent;
    
    submitButton.textContent = 'Bezig met indienen...';
    submitButton.disabled = true;
    
    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            this.reset();
            closeQuestionModal();
        } else {
            alert('Er is een fout opgetreden: ' + (data.message || 'Onbekende fout'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Er is een fout opgetreden. Probeer het later opnieuw.');
    })
    .finally(() => {
        submitButton.textContent = originalText;
        submitButton.disabled = false;
    });
});
</script>
@endpush
