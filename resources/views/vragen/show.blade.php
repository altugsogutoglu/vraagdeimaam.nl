@extends('layouts.app')

@section('title', $question->question . ' - Vraag de Imaam')
@section('description', Str::limit(strip_tags($question->answer ?? $question->question), 160))

@section('content')
<!-- Question Header -->
<section class="relative py-16 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#FDF7E7] via-white to-[#F7F3E9]"></div>
    <div class="absolute inset-0 ottoman-pattern opacity-20"></div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center mb-6">
            <a href="{{ route('vragen.index') }}" class="text-[#D4AF37] hover:text-[#8B1538] font-medium text-lg flex items-center transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                </svg>
                Terug naar vragen
            </a>
        </div>
        
        <div class="flex items-center mb-8">
            <span class="inline-flex items-center px-6 py-3 rounded-full text-lg font-medium bg-[#D4AF37]/20 text-[#8B1538] border border-[#D4AF37]/30 mr-4">
                {{ $question->category->name }}
            </span>
            @if($question->is_featured)
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-[#D4AF37]/20 to-[#D4AF37]/30 text-[#8B1538] border border-[#D4AF37] mr-4">
                ⭐ Uitgelicht
            </span>
            @endif
            <span class="text-lg text-[#722F37] flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ $question->created_at->diffForHumans() }}</span>
            </span>
        </div>
        
        <h1 class="text-4xl md:text-5xl font-bold font-arabic text-[#8B1538] mb-8 leading-tight">
            {{ $question->question }}
        </h1>
        
        <div class="flex items-center text-lg text-[#722F37]/80 space-x-8">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                {{ $question->views_count }} keer bekeken
            </div>
            @if($question->answered_at)
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Beantwoord {{ $question->answered_at->diffForHumans() }}
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Question Content -->
<section class="py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-white via-[#FDF7E7]/30 to-white"></div>
    <div class="absolute inset-0 ottoman-pattern opacity-15"></div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="ottoman-card p-10">
                    @if($question->answer)
                        <div class="mb-8">
                            <h2 class="text-3xl font-bold font-arabic text-[#8B1538] mb-8 flex items-center">
                                <svg class="w-8 h-8 text-[#9CAF88] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Antwoord
                            </h2>
                            <div class="prose prose-lg max-w-none text-[#0F1419] leading-relaxed">
                                @php
                                    $content = $question->answer;
                                    // Convert line breaks
                                    $content = nl2br($content);
                                    // Convert bold markdown
                                    $content = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $content);
                                    // Convert lines ending with : to headings
                                    $content = preg_replace('/^(.+):$/m', '<h3 class="text-lg font-semibold text-gray-900 mt-6 mb-3">$1</h3>', $content);
                                    // Convert bullet points to list items
                                    $content = preg_replace('/^- (.+)$/m', '<li class="ml-4">$1</li>', $content);
                                    // Wrap consecutive list items in ul tags
                                    $content = preg_replace('/(<li[^>]*>.*<\/li>)(\s*<li[^>]*>.*<\/li>)*/s', '<ul class="list-disc list-inside space-y-1 mb-4">$0</ul>', $content);
                                @endphp
                                {!! $content !!}
                            </div>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-[#D4AF37]/20 to-[#8B1538]/20 rounded-full flex items-center justify-center border-4 border-[#D4AF37]/30">
                                <svg class="w-12 h-12 text-[#8B1538]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-semibold font-arabic text-[#8B1538] mb-4">Nog geen antwoord</h3>
                            <p class="text-xl text-[#722F37] leading-relaxed">Deze vraag wacht nog op een antwoord van onze deskundigen.</p>
                        </div>
                    @endif
                    
                    @if($question->tags->count() > 0)
                    <div class="border-t-2 border-[#D4AF37]/30 pt-8">
                        <h3 class="text-xl font-semibold font-arabic text-[#8B1538] mb-6">Tags</h3>
                        <div class="flex flex-wrap gap-3">
                            @foreach($question->tags as $tag)
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-[#1B4B4C]/10 text-[#1B4B4C] border border-[#1B4B4C]/20">
                                {{ $tag->name }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Related Questions -->
                @if($relatedQuestions->count() > 0)
                <div class="mt-12">
                    <h3 class="text-3xl font-bold font-arabic text-[#8B1538] mb-8">Gerelateerde Vragen</h3>
                    <div class="space-y-6">
                        @foreach($relatedQuestions as $relatedQuestion)
                        <div class="group">
                            <div class="ottoman-card p-8 hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center mb-3">
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-[#D4AF37]/20 text-[#8B1538] border border-[#D4AF37]/30 mr-3">
                                    {{ $relatedQuestion->category->name }}
                                </span>
                                <span class="text-sm text-[#722F37] flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $relatedQuestion->created_at->diffForHumans() }}</span>
                                </span>
                            </div>
                            
                            <h4 class="text-xl font-semibold font-arabic text-[#0F1419] mb-3 leading-relaxed">
                                <a href="{{ route('vragen.show', $relatedQuestion) }}" class="hover:text-[#8B1538] transition-colors duration-200 group-hover:text-[#8B1538]">
                                    {{ Str::limit($relatedQuestion->question, 100) }}
                                </a>
                            </h4>
                            
                            @if($relatedQuestion->answer)
                            <p class="text-[#722F37] text-base mb-4 leading-relaxed">
                                {{ Str::limit(strip_tags($relatedQuestion->answer), 150) }}
                            </p>
                            @endif
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-[#722F37]/70">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    {{ $relatedQuestion->views_count }} keer bekeken
                                </div>
                                <a href="{{ route('vragen.show', $relatedQuestion) }}" class="text-[#D4AF37] hover:text-[#8B1538] font-medium text-sm transition-colors duration-200 group-hover:text-[#8B1538]">
                                    Lees meer →
                                </a>
                            </div>
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
                    <div class="ottoman-card p-8">
                        <div class="text-center">
                            <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-[#D4AF37] to-[#B87333] rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold font-arabic text-[#8B1538] mb-4">Heb je een vraag?</h3>
                            <p class="text-[#722F37] text-base mb-6 leading-relaxed">
                                Stel anoniem je eigen islamitische vraag en krijg een betrouwbaar antwoord.
                            </p>
                            <button onclick="openQuestionModal()" class="btn-ottoman w-full py-3 font-semibold text-lg">
                                🌙 Stel een Vraag
                            </button>
                        </div>
                    </div>
                    
                    <!-- Category Info -->
                    <div class="ottoman-card p-8">
                        <h3 class="text-xl font-semibold font-arabic text-[#8B1538] mb-6">Categorie</h3>
                        <div class="flex items-center mb-4">
                            <div class="w-6 h-6 rounded-full mr-4 bg-gradient-to-br from-[#D4AF37] to-[#8B1538]"></div>
                            <span class="font-medium text-[#0F1419] text-lg">{{ $question->category->name }}</span>
                        </div>
                        @if($question->category->description)
                        <p class="text-[#722F37] text-base leading-relaxed mb-4">{{ $question->category->description }}</p>
                        @endif
                        <a href="{{ route('vragen.index', ['category' => $question->category->id]) }}" class="text-[#D4AF37] hover:text-[#8B1538] font-medium text-base mt-4 inline-block transition-colors duration-200">
                            Bekijk meer vragen in deze categorie →
                        </a>
                    </div>
                    
                    <!-- Share -->
                    <div class="ottoman-card p-8">
                        <h3 class="text-xl font-semibold font-arabic text-[#8B1538] mb-6">Deel deze vraag</h3>
                        <div class="space-y-3">
                            <button onclick="shareOnFacebook()" class="w-full bg-gradient-to-r from-[#1877F2] to-[#166FE5] hover:from-[#166FE5] hover:to-[#1565C0] text-white font-medium py-3 px-4 rounded-lg transition-all duration-200 flex items-center justify-center space-x-2">
                                <span>📻 Facebook</span>
                            </button>
                            <button onclick="shareOnTwitter()" class="w-full bg-gradient-to-r from-[#1DA1F2] to-[#0D8BD9] hover:from-[#0D8BD9] hover:to-[#0A7BC4] text-white font-medium py-3 px-4 rounded-lg transition-all duration-200 flex items-center justify-center space-x-2">
                                <span>🐦 Twitter</span>
                            </button>
                            <button onclick="copyLink()" class="w-full bg-gradient-to-r from-[#722F37] to-[#8B1538] hover:from-[#8B1538] hover:to-[#722F37] text-white font-medium py-3 px-4 rounded-lg transition-all duration-200 flex items-center justify-center space-x-2">
                                <span>🔗 Kopieer Link</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                @foreach(\App\Models\Category::active()->ordered()->get() as $category)
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
