@extends('layouts.app')

@section('title', $question->question . ' - Vraag de Imaam')
@section('description', Str::limit(strip_tags($question->answer ?? $question->question), 160))

@section('content')
<!-- Question Header -->
<section class="bg-white border-b py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center mb-4">
            <a href="{{ route('vragen.index') }}" class="text-green-600 hover:text-green-700 font-medium text-sm flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Terug naar vragen
            </a>
        </div>
        
        <div class="flex items-center mb-6">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium mr-4" style="background-color: {{ $question->category->color }}20; color: {{ $question->category->color }};">
                {{ $question->category->name }}
            </span>
            @if($question->is_featured)
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 mr-4">
                ⭐ Uitgelicht
            </span>
            @endif
            <span class="text-sm text-gray-500">{{ $question->created_at->diffForHumans() }}</span>
        </div>
        
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
            {{ $question->question }}
        </h1>
        
        <div class="flex items-center text-sm text-gray-500 space-x-6">
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
    </div>
</section>

<!-- Question Content -->
<section class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-8">
                    @if($question->answer)
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Antwoord
                            </h2>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                {!! nl2br(e($question->answer)) !!}
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-16 h-16 mx-auto mb-4 bg-yellow-100 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Nog geen antwoord</h3>
                            <p class="text-gray-600">Deze vraag wacht nog op een antwoord van onze deskundigen.</p>
                        </div>
                    @endif
                    
                    @if($question->tags->count() > 0)
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($question->tags as $tag)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                {{ $tag->name }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Related Questions -->
                @if($relatedQuestions->count() > 0)
                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Gerelateerde Vragen</h3>
                    <div class="space-y-4">
                        @foreach($relatedQuestions as $relatedQuestion)
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 p-6">
                            <div class="flex items-center mb-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium mr-3" style="background-color: {{ $relatedQuestion->category->color }}20; color: {{ $relatedQuestion->category->color }};">
                                    {{ $relatedQuestion->category->name }}
                                </span>
                                <span class="text-sm text-gray-500">{{ $relatedQuestion->created_at->diffForHumans() }}</span>
                            </div>
                            
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">
                                <a href="{{ route('vragen.show', $relatedQuestion) }}" class="hover:text-green-600 transition-colors duration-200">
                                    {{ Str::limit($relatedQuestion->question, 100) }}
                                </a>
                            </h4>
                            
                            @if($relatedQuestion->answer)
                            <p class="text-gray-600 text-sm mb-3">
                                {{ Str::limit(strip_tags($relatedQuestion->answer), 150) }}
                            </p>
                            @endif
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    {{ $relatedQuestion->views_count }} keer bekeken
                                </div>
                                <a href="{{ route('vragen.show', $relatedQuestion) }}" class="text-green-600 hover:text-green-700 font-medium text-sm">
                                    Lees meer →
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="space-y-6">
                    <!-- Ask Question CTA -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Heb je een vraag?</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Stel anoniem je eigen islamitische vraag en krijg een betrouwbaar antwoord.
                        </p>
                        <button onclick="openQuestionModal()" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                            Stel een Vraag
                        </button>
                    </div>
                    
                    <!-- Category Info -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Categorie</h3>
                        <div class="flex items-center mb-3">
                            <div class="w-4 h-4 rounded-full mr-3" style="background-color: {{ $question->category->color }};"></div>
                            <span class="font-medium text-gray-900">{{ $question->category->name }}</span>
                        </div>
                        @if($question->category->description)
                        <p class="text-gray-600 text-sm">{{ $question->category->description }}</p>
                        @endif
                        <a href="{{ route('vragen.index', ['category' => $question->category->id]) }}" class="text-green-600 hover:text-green-700 font-medium text-sm mt-3 inline-block">
                            Bekijk meer vragen in deze categorie →
                        </a>
                    </div>
                    
                    <!-- Share -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Deel deze vraag</h3>
                        <div class="flex space-x-3">
                            <button onclick="shareOnFacebook()" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded text-sm transition-colors duration-200">
                                Facebook
                            </button>
                            <button onclick="shareOnTwitter()" class="flex-1 bg-blue-400 hover:bg-blue-500 text-white font-medium py-2 px-3 rounded text-sm transition-colors duration-200">
                                Twitter
                            </button>
                            <button onclick="copyLink()" class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-3 rounded text-sm transition-colors duration-200">
                                Kopieer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                @foreach(\App\Models\Category::active()->ordered()->get() as $category)
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

// Share functions
function shareOnFacebook() {
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
}

function shareOnTwitter() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent('{{ $question->question }}');
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
}

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        alert('Link gekopieerd naar klembord!');
    });
}
</script>
@endpush
