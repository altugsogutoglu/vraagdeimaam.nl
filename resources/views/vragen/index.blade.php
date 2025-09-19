@extends('layouts.app')

@section('title', 'Vragen - Vraag de Imaam')
@section('description', 'Bekijk alle islamitische vragen en antwoorden. Zoek per categorie, tag of trefwoord.')

@section('content')
<!-- Header Section -->
<section class="relative py-20 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#FDF7E7] via-white to-[#F7F3E9]"></div>
    <div class="absolute inset-0 ottoman-pattern opacity-20"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-bold font-arabic text-[#8B1538] mb-6">
                الأسئلة الإسلامية
            </h1>
            <h2 class="text-3xl md:text-4xl font-semibold text-[#1B4B4C] mb-6">
                Islamitische Vragen
            </h2>
            <p class="text-xl text-ottoman-subtitle max-w-3xl mx-auto leading-relaxed mb-8">
                Vind antwoorden op je islamitische vragen of stel een nieuwe vraag anoniem
            </p>
            <div class="crescent-divider mb-8"></div>
            
            <!-- Search and Filter Bar -->
            <div class="max-w-4xl mx-auto">
                <form method="GET" action="{{ route('vragen.index') }}" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Zoek in vragen en antwoorden..."
                               class="form-ottoman w-full px-6 py-4 text-lg font-medium placeholder-[#722F37]/60">
                    </div>
                    <div class="flex gap-2">
                        <select name="category" class="form-ottoman px-6 py-4 text-lg font-medium">
                            <option value="">Alle categorieën</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        <select name="sort" class="form-ottoman px-6 py-4 text-lg font-medium">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Nieuwste eerst</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oudste eerst</option>
                            <option value="most_viewed" {{ request('sort') == 'most_viewed' ? 'selected' : '' }}>Meest bekeken</option>
                            <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Uitgelicht</option>
                        </select>
                        <button type="submit" class="btn-ottoman px-8 py-4 text-lg font-semibold">
                            🔍 Zoeken
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Categories Filter -->
@if($categories->count() > 0)
<section class="py-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-[#F7F3E9] via-white to-[#F7F3E9]"></div>
    <div class="absolute inset-0 ottoman-geometric opacity-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-3 justify-center">
            <a href="{{ route('vragen.index') }}"
               class="px-6 py-3 rounded-full text-sm font-medium transition-all duration-300 {{ !request('category') ? 'bg-gradient-to-r from-[#D4AF37] to-[#B87333] text-white shadow-lg' : 'bg-white text-[#722F37] border-2 border-[#D4AF37]/30 hover:border-[#D4AF37] hover:shadow-md' }}">
                ✦ Alle categorieën
            </a>
            @foreach($categories as $category)
            <a href="{{ route('vragen.index', ['category' => $category->id] + request()->except('category')) }}"
               class="px-6 py-3 rounded-full text-sm font-medium transition-all duration-300 {{ request('category') == $category->id ? 'bg-gradient-to-r from-[#8B1538] to-[#722F37] text-white shadow-lg transform scale-105' : 'bg-white text-[#722F37] border-2 border-[#D4AF37]/30 hover:border-[#8B1538] hover:shadow-md hover:transform hover:scale-105' }}">
                {{ $category->name }}
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Questions Section -->
<section class="py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-white via-[#FDF7E7]/30 to-white"></div>
    <div class="absolute inset-0 ottoman-pattern opacity-15"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($questions->count() > 0)
            <!-- Results Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold font-arabic text-[#8B1538] mb-2">
                        {{ $questions->total() }} {{ $questions->total() == 1 ? 'vraag' : 'vragen' }} gevonden
                    </h2>
                    @if(request('search'))
                    <p class="text-[#722F37] text-lg">Zoekresultaten voor "{{ request('search') }}"</p>
                    @endif
                </div>
                <button onclick="openQuestionModal()" class="btn-ottoman inline-flex items-center space-x-2 font-semibold py-3 px-8">
                    <span>🌙 Stel een Vraag</span>
                </button>
            </div>
            
            <!-- Questions List -->
            <div class="space-y-6">
                @foreach($questions as $question)
                <div class="group">
                    <div class="ottoman-card p-8 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center mb-3">
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-[#D4AF37]/20 text-[#8B1538] border border-[#D4AF37]/30 mr-3">
                                    {{ $question->category->name }}
                                </span>
                                @if($question->is_featured)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-[#D4AF37]/20 to-[#D4AF37]/30 text-[#8B1538] border border-[#D4AF37] mr-3">
                                    ⭐ Uitgelicht
                                </span>
                                @endif
                                <span class="text-sm text-[#722F37] flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $question->created_at->diffForHumans() }}</span>
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-semibold font-arabic text-[#0F1419] mb-4 leading-relaxed">
                                <a href="{{ route('vragen.show', $question) }}" class="hover:text-[#8B1538] transition-colors duration-200 group-hover:text-[#8B1538]">
                                    {{ $question->question }}
                                </a>
                            </h3>
                            
                            @if($question->answer)
                            <p class="text-[#722F37] mb-4 line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($question->answer), 200) }}
                            </p>
                            @endif
                            
                            @if($question->tags->count() > 0)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($question->tags as $tag)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#1B4B4C]/10 text-[#1B4B4C] border border-[#1B4B4C]/20">
                                    {{ $tag->name }}
                                </span>
                                @endforeach
                            </div>
                            @endif
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4 text-sm text-[#722F37]/70">
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

                                <a href="{{ route('vragen.show', $question) }}" class="text-[#D4AF37] hover:text-[#8B1538] font-medium transition-colors duration-200 group-hover:text-[#8B1538]">
                                    Lees meer →
                                </a>
                            </div>
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
            <div class="text-center py-20">
                <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-[#D4AF37]/20 to-[#8B1538]/20 rounded-full flex items-center justify-center border-4 border-[#D4AF37]/30">
                    <svg class="w-16 h-16 text-[#8B1538]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold font-arabic text-[#8B1538] mb-6">Geen vragen gevonden</h3>
                <p class="text-xl text-[#722F37] mb-10 max-w-lg mx-auto leading-relaxed">
                    @if(request('search'))
                        Er zijn geen vragen gevonden die overeenkomen met je zoekopdracht.
                    @else
                        Er zijn nog geen vragen beschikbaar. Wees de eerste om een vraag te stellen!
                    @endif
                </p>
                <button onclick="openQuestionModal()" class="btn-ottoman inline-flex items-center space-x-2 font-semibold py-4 px-10 text-lg">
                    <span>🌙 Stel de Eerste Vraag</span>
                </button>
            </div>
        @endif
    </div>
</section>

<!-- Question Modal -->
<div id="questionModal" class="fixed inset-0 bg-black bg-opacity-60 hidden z-50 backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-gradient-to-br from-[#FDF7E7] to-white border-2 border-[#D4AF37] rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Decorative header border -->
            <div class="h-2 bg-gradient-to-r from-[#D4AF37] via-[#8B1538] to-[#D4AF37] rounded-t-2xl"></div>

            <div class="p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-3xl font-bold font-arabic text-[#8B1538] mb-2">Stel een Vraag</h3>
                        <p class="text-sm text-[#1B4B4C] font-arabic">اسأل سؤالاً</p>
                    </div>
                    <button onclick="closeQuestionModal()" class="text-[#722F37] hover:text-[#8B1538] transition-colors duration-200">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <form id="questionForm" action="{{ route('question.store') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="question" class="block text-lg font-medium text-[#8B1538] mb-3">
                                Jouw Vraag *
                            </label>
                            <textarea id="question" name="question" rows="4" required
                                class="form-ottoman w-full px-4 py-3 text-lg"
                                placeholder="Stel hier je islamitische vraag..."></textarea>
                        </div>
                        
                        <div>
                            <label for="category_id" class="block text-lg font-medium text-[#8B1538] mb-3">
                                Categorie *
                            </label>
                            <select id="category_id" name="category_id" required
                                class="form-ottoman w-full px-4 py-3 text-lg">
                                <option value="">Selecteer een categorie</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-lg font-medium text-[#8B1538] mb-3">
                                    Naam (anoniem)
                                </label>
                                <input type="text" id="name" name="name"
                                    class="form-ottoman w-full px-4 py-3 text-lg"
                                    placeholder="Je naam wordt niet getoond (optioneel)">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-lg font-medium text-[#8B1538] mb-3">
                                    E-mail (anoniem)
                                </label>
                                <input type="email" id="email" name="email"
                                    class="form-ottoman w-full px-4 py-3 text-lg"
                                    placeholder="Je e-mail wordt niet getoond (optioneel)">
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-[#9CAF88]/10 to-[#9CAF88]/20 border-2 border-[#9CAF88]/30 rounded-xl p-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-[#9CAF88]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-lg text-[#1B4B4C] font-medium">
                                        <strong>🔒 Privacy gegarandeerd:</strong> Je naam en e-mailadres worden gehashed en zijn nooit zichtbaar voor anderen.
                                        Alleen je vraag wordt getoond na goedkeuring.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="closeQuestionModal()"
                                class="px-6 py-3 text-[#722F37] bg-white border-2 border-[#722F37]/30 hover:bg-[#722F37]/10 rounded-lg transition-colors duration-200 font-medium">
                                Annuleren
                            </button>
                            <button type="submit"
                                class="btn-ottoman px-8 py-3 font-semibold text-lg">
                                🌙 Vraag Indienen
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
