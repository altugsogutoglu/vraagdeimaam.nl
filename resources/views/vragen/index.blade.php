@extends('layouts.app')

@section('title', 'Vragen - Vraag de Imaam')
@section('description', 'Bekijk alle islamitische vragen en antwoorden. Zoek per categorie, tag of trefwoord.')

@section('content')
<!-- Header Section -->
<section class="bg-gradient-to-br from-green-50 to-green-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Islamitische Vragen
            </h1>
            <p class="text-xl text-gray-700 mb-8 max-w-3xl mx-auto">
                Vind antwoorden op je islamitische vragen of stel een nieuwe vraag anoniem
            </p>
            
            <!-- Search and Filter Bar -->
            <div class="max-w-4xl mx-auto">
                <form method="GET" action="{{ route('vragen.index') }}" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Zoek in vragen en antwoorden..."
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div class="flex gap-2">
                        <select name="category" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            <option value="">Alle categorieën</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        <select name="sort" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Nieuwste eerst</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oudste eerst</option>
                            <option value="most_viewed" {{ request('sort') == 'most_viewed' ? 'selected' : '' }}>Meest bekeken</option>
                            <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Uitgelicht</option>
                        </select>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200">
                            Zoeken
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Categories Filter -->
@if($categories->count() > 0)
<section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-2 justify-center">
            <a href="{{ route('vragen.index') }}" 
               class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200 {{ !request('category') ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Alle categorieën
            </a>
            @foreach($categories as $category)
            <a href="{{ route('vragen.index', ['category' => $category->id] + request()->except('category')) }}" 
               class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200 {{ request('category') == $category->id ? 'text-white' : 'text-gray-700 hover:bg-gray-100' }}"
               style="{{ request('category') == $category->id ? 'background-color: ' . $category->color : '' }}">
                {{ $category->name }}
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Questions Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($questions->count() > 0)
            <!-- Results Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        {{ $questions->total() }} {{ $questions->total() == 1 ? 'vraag' : 'vragen' }} gevonden
                    </h2>
                    @if(request('search'))
                    <p class="text-gray-600">Zoekresultaten voor "{{ request('search') }}"</p>
                    @endif
                </div>
                <button onclick="openQuestionModal()" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200 shadow-lg">
                    Stel een Vraag
                </button>
            </div>
            
            <!-- Questions List -->
            <div class="space-y-6">
                @foreach($questions as $question)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center mb-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium mr-3" style="background-color: {{ $question->category->color }}20; color: {{ $question->category->color }};">
                                    {{ $question->category->name }}
                                </span>
                                @if($question->is_featured)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mr-3">
                                    ⭐ Uitgelicht
                                </span>
                                @endif
                                <span class="text-sm text-gray-500">{{ $question->created_at->diffForHumans() }}</span>
                            </div>
                            
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">
                                <a href="{{ route('vragen.show', $question) }}" class="hover:text-green-600 transition-colors duration-200">
                                    {{ $question->question }}
                                </a>
                            </h3>
                            
                            @if($question->answer)
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($question->answer), 200) }}
                            </p>
                            @endif
                            
                            @if($question->tags->count() > 0)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($question->tags as $tag)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    {{ $tag->name }}
                                </span>
                                @endforeach
                            </div>
                            @endif
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        {{ $question->views_count }} keer bekeken
                                    </div>
                                    @if($question->answered_at)
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Beantwoord {{ $question->answered_at->diffForHumans() }}
                                    </div>
                                    @endif
                                </div>
                                
                                <a href="{{ route('vragen.show', $question) }}" class="text-green-600 hover:text-green-700 font-medium">
                                    Lees meer →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                {{ $questions->links('vendor.pagination.tailwind') }}
            </div>
            
        @else
            <!-- No Results -->
            <div class="text-center py-16">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Geen vragen gevonden</h3>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">
                    @if(request('search'))
                        Er zijn geen vragen gevonden die overeenkomen met je zoekopdracht.
                    @else
                        Er zijn nog geen vragen beschikbaar. Wees de eerste om een vraag te stellen!
                    @endif
                </p>
                <button onclick="openQuestionModal()" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 shadow-lg">
                    Stel de Eerste Vraag
                </button>
            </div>
        @endif
    </div>
</section>

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
