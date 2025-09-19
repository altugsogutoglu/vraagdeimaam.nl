@extends('layouts.app')

@section('title', 'Vraag de Imaam - Islamitische Vragen en Antwoorden')
@section('description', 'Stel anoniem je islamitische vragen en krijg betrouwbare antwoorden van deskundigen. Een veilige plek voor alle moslims om te leren en te groeien.')

@section('content')
<!-- Hero Section -->
<section class="relative py-24 overflow-hidden">
    <!-- Background with Ottoman patterns -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#FDF7E7] via-[#F7F3E9] to-[#FDF7E7]"></div>
    <div class="absolute inset-0 ottoman-pattern opacity-30"></div>

    <!-- Decorative elements -->
    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#D4AF37] via-[#8B1538] to-[#1B4B4C]"></div>

    <!-- Floating geometric shapes -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-[#D4AF37]/10 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-32 h-32 bg-[#8B1538]/10 rounded-full blur-xl animate-pulse delay-1000"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Main Title with Ottoman styling -->
            <div class="mb-8">
                <h1 class="text-ottoman-title mb-4">
                    Vraag de Imaam
                </h1>
                <div class="flex items-center justify-center space-x-4 mb-4">
                    <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent flex-1 max-w-xs"></div>
                    <span class="text-2xl text-[#D4AF37]">✦</span>
                    <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent flex-1 max-w-xs"></div>
                </div>
                <p class="text-xl font-arabic text-[#1B4B4C] mb-2">سأل الإمام</p>
            </div>

            <p class="text-xl md:text-2xl text-ottoman-subtitle mb-12 max-w-4xl mx-auto leading-relaxed">
                Stel anoniem je islamitische vragen en krijg betrouwbare antwoorden van deskundigen.
                Een veilige plek voor alle moslims om te leren en te groeien in hun geloof.
            </p>

            <!-- Call to Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-12">
                <a href="{{ route('vragen.index') }}" class="btn-ottoman group relative">
                    <span class="relative z-10 flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span>Bekijk Vragen</span>
                    </span>
                </a>

                <button onclick="openQuestionModal()" class="btn-ottoman-secondary group relative">
                    <span class="relative z-10 flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Stel een Vraag</span>
                    </span>
                </button>
            </div>

            <!-- Islamic Quote -->
            <div class="max-w-2xl mx-auto p-6 bg-white/50 border-2 border-[#D4AF37]/30 rounded-xl shadow-lg backdrop-blur-sm">
                <p class="text-lg font-arabic text-[#8B1538] mb-2">
                    "وَمَن يُؤْتَ الْحِكْمَةَ فَقَدْ أُوتِيَ خَيْرًا كَثِيرًا"
                </p>
                <p class="text-sm text-[#1B4B4C]">
                    "En wie wijsheid wordt gegeven, heeft veel goeds ontvangen" - Quran 2:269
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-r from-white via-[#F7F3E9] to-white"></div>
    <div class="absolute inset-0 ottoman-geometric opacity-20"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold font-arabic text-[#8B1538] mb-4">Onze Impact</h2>
            <div class="crescent-divider"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Stat Card 1 -->
            <div class="group relative">
                <div class="ottoman-card p-8 text-center h-full transform group-hover:scale-105 transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#D4AF37] to-[#B87333] rounded-xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-5xl font-bold text-[#8B1538] mb-3 counter">{{ number_format($stats['total_questions']) }}</div>
                    <div class="text-[#1B4B4C] font-medium">Vragen Beantwoord</div>
                    <div class="text-sm text-[#722F37] mt-2">Met zorg en expertise</div>
                </div>
            </div>

            <!-- Stat Card 2 -->
            <div class="group relative">
                <div class="ottoman-card p-8 text-center h-full transform group-hover:scale-105 transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#8B1538] to-[#722F37] rounded-xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <div class="text-5xl font-bold text-[#8B1538] mb-3 counter">{{ number_format($stats['total_categories']) }}</div>
                    <div class="text-[#1B4B4C] font-medium">Categorieën</div>
                    <div class="text-sm text-[#722F37] mt-2">Breed scala aan onderwerpen</div>
                </div>
            </div>

            <!-- Stat Card 3 -->
            <div class="group relative">
                <div class="ottoman-card p-8 text-center h-full transform group-hover:scale-105 transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#1B4B4C] to-[#1B2951] rounded-xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-5xl font-bold text-[#8B1538] mb-3 counter">{{ number_format($stats['answered_questions']) }}</div>
                    <div class="text-[#1B4B4C] font-medium">Vragen Met Antwoord</div>
                    <div class="text-sm text-[#722F37] mt-2">Betrouwbare kennis</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Questions Section -->
@if($featuredQuestions->count() > 0)
<section class="py-20 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#F7F3E9] to-white"></div>
    <div class="absolute inset-0 ottoman-pattern opacity-20"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold font-arabic text-[#8B1538] mb-6">Uitgelichte Vragen</h2>
            <p class="text-xl text-ottoman-subtitle max-w-3xl mx-auto leading-relaxed">
                Bekijk enkele van de meest gestelde en belangrijke islamitische vragen die door onze gemeenschap zijn gedeeld
            </p>
            <div class="crescent-divider"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredQuestions as $question)
            <div class="group">
                <div class="ottoman-card p-6 h-full flex flex-col">
                    <!-- Category Badge -->
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-[#D4AF37]/20 text-[#8B1538] border border-[#D4AF37]/30">
                            {{ $question->category->name }}
                        </span>
                        <span class="text-xs text-[#722F37]">{{ $question->created_at->diffForHumans() }}</span>
                    </div>

                    <!-- Question Title -->
                    <h3 class="text-lg font-semibold text-[#0F1419] mb-4 line-clamp-2 flex-grow font-arabic">
                        {{ Str::limit($question->question, 100) }}
                    </h3>

                    <!-- Answer Preview -->
                    @if($question->answer)
                    <p class="text-[#1B4B4C] text-sm mb-6 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($question->answer), 150) }}
                    </p>
                    @endif

                    <!-- Footer -->
                    <div class="flex items-center justify-between pt-4 border-t border-[#D4AF37]/20 mt-auto">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span class="text-sm text-[#722F37]">{{ $question->views_count }} keer bekeken</span>
                        </div>
                        <a href="{{ route('vragen.show', $question) }}" class="group-hover:bg-[#8B1538] bg-[#D4AF37] text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:shadow-lg">
                            Lees meer →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Categories Section -->
@if($categories->count() > 0)
<section class="py-20 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-r from-white via-[#FDF7E7] to-white"></div>
    <div class="absolute inset-0 ottoman-geometric opacity-15"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold font-arabic text-[#8B1538] mb-6">Categorieën</h2>
            <p class="text-xl text-ottoman-subtitle max-w-3xl mx-auto leading-relaxed">
                Verken verschillende aspecten van de Islam door onze zorgvuldig ingedeelde onderwerpen
            </p>
            <div class="crescent-divider"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <a href="{{ route('vragen.index', ['category' => $category->id]) }}" class="group block">
                <div class="relative p-6 bg-white border-2 border-[#D4AF37]/30 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                    <!-- Decorative corner -->
                    <div class="absolute top-0 right-0 w-16 h-16 bg-gradient-to-br from-[#D4AF37]/20 to-[#8B1538]/20 transform rotate-45 translate-x-8 -translate-y-8"></div>

                    <!-- Category Icon -->
                    <div class="w-12 h-12 bg-gradient-to-br from-[#D4AF37] to-[#B87333] rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>

                    <!-- Header -->
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-semibold font-arabic text-[#0F1419] group-hover:text-[#8B1538] transition-colors duration-200">
                            {{ $category->name }}
                        </h3>
                        <span class="bg-[#D4AF37]/20 text-[#8B1538] text-sm px-2 py-1 rounded-full font-medium">
                            {{ $category->approved_questions_count }}
                        </span>
                    </div>

                    <!-- Description -->
                    @if($category->description)
                    <p class="text-[#1B4B4C] text-sm leading-relaxed">{{ Str::limit($category->description, 80) }}</p>
                    @endif

                    <!-- Hover Arrow -->
                    <div class="mt-4 flex items-center text-[#D4AF37] opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-sm font-medium">Bekijk vragen</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Recent Questions Section -->
@if($recentQuestions->count() > 0)
<section class="py-20 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-r from-white via-[#FDF7E7] to-white"></div>
    <div class="absolute inset-0 ottoman-pattern opacity-15"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold font-arabic text-[#8B1538] mb-6">Recente Vragen</h2>
            <p class="text-xl text-ottoman-subtitle max-w-3xl mx-auto leading-relaxed">
                Ontdek de nieuwste vragen die door onze gemeenschap zijn gesteld en beantwoord
            </p>
            <div class="crescent-divider"></div>
        </div>
        
        <div class="space-y-4">
            @foreach($recentQuestions as $question)
            <div class="group">
                <div class="ottoman-card p-8 hover:shadow-xl transition-all duration-300">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-[#D4AF37]/20 text-[#8B1538] border border-[#D4AF37]/30">
                                    {{ $question->category->name }}
                                </span>
                                <span class="text-sm text-[#722F37] flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $question->created_at->diffForHumans() }}</span>
                                </span>
                            </div>
                        </div>
                        
                        <h3 class="text-xl font-semibold font-arabic text-[#0F1419] mb-4 leading-relaxed">
                            <a href="{{ route('vragen.show', $question) }}" class="hover:text-[#8B1538] transition-colors duration-200 group-hover:text-[#8B1538]">
                                {{ $question->question }}
                            </a>
                        </h3>
                        
                        @if($question->tags->count() > 0)
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($question->tags->take(3) as $tag)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#1B4B4C]/10 text-[#1B4B4C] border border-[#1B4B4C]/20">
                                {{ $tag->name }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                        
                        <div class="flex items-center text-sm text-[#722F37]/70">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            {{ $question->views_count }} keer bekeken
                        </div>
                    </div>
                    
                    @if($question->answer)
                    <div class="ml-4">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-[#9CAF88]/20 to-[#9CAF88]/30 text-[#1B4B4C] border border-[#9CAF88]/50">
                            ✓ Beantwoord
                        </span>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('vragen.index') }}" class="btn-ottoman inline-flex items-center space-x-2 font-semibold py-4 px-8 text-lg">
                <span>Bekijk Alle Vragen</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Question Modal -->
<div id="questionModal" class="fixed inset-0 bg-gradient-to-br from-[#1B4B4C]/40 via-[#8B1538]/30 to-[#1B4B4C]/40 hidden z-50 backdrop-blur-sm">
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
                    <button onclick="closeQuestionModal()" class="p-2 text-[#722F37] hover:text-[#8B1538] hover:bg-[#D4AF37]/10 rounded-full transition-all duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form id="questionForm" action="{{ route('question.store') }}" method="POST" class="form-ottoman">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="question" class="block text-sm font-medium text-[#0F1419] mb-3 font-arabic">
                                Jouw Vraag *
                            </label>
                            <textarea id="question" name="question" rows="4" required
                                class="w-full px-4 py-3 border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300"
                                placeholder="Stel hier je islamitische vraag... Wees zo specifiek mogelijk zodat we je de beste hulp kunnen bieden."></textarea>
                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-medium text-[#0F1419] mb-3 font-arabic">
                                Categorie *
                            </label>
                            <select id="category_id" name="category_id" required
                                class="w-full px-4 py-3 border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300">
                                <option value="">Selecteer een categorie</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-[#0F1419] mb-3">
                                    Naam (anoniem)
                                </label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-3 border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300"
                                    placeholder="Optioneel (wordt niet getoond)">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-[#0F1419] mb-3">
                                    E-mail (anoniem)
                                </label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-4 py-3 border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300"
                                    placeholder="Optioneel (wordt niet getoond)">
                            </div>
                        </div>

                        <!-- Privacy Notice -->
                        <div class="bg-[#D4AF37]/10 border-2 border-[#D4AF37]/30 rounded-xl p-6">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="h-6 w-6 text-[#8B1538]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-[#8B1538] mb-2">Privacy Gegarandeerd</h4>
                                    <p class="text-sm text-[#1B4B4C] leading-relaxed">
                                        Je persoonlijke gegevens worden volledig anoniem gehouden en nooit gedeeld.
                                        Alleen je vraag wordt na goedkeuring zichtbaar voor anderen om van te leren.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="button" onclick="closeQuestionModal()"
                                class="px-6 py-3 text-[#722F37] bg-white border-2 border-[#D4AF37]/30 hover:bg-[#D4AF37]/5 rounded-xl transition-all duration-200 font-medium">
                                Annuleren
                            </button>
                            <button type="submit" class="btn-ottoman">
                                <span class="flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    <span>Vraag Indienen</span>
                                </span>
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
