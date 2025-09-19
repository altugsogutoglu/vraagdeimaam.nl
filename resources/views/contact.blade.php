@extends('layouts.app')

@section('title', 'Contact - Vraag de Imaam')
@section('description', 'Neem contact op met Vraag de Imaam voor vragen, suggesties of feedback.')

@section('content')
<!-- Header Section -->
<section class="relative py-20 overflow-hidden">
    <!-- Background with Ottoman patterns -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#FDF7E7] via-[#F7F3E9] to-[#FDF7E7]"></div>
    <div class="absolute inset-0 ottoman-pattern opacity-30"></div>

    <!-- Decorative elements -->
    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#D4AF37] via-[#8B1538] to-[#1B4B4C]"></div>

    <!-- Floating geometric shapes -->
    <div class="absolute top-16 left-10 w-16 h-16 bg-[#D4AF37]/10 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-16 right-10 w-24 h-24 bg-[#8B1538]/10 rounded-full blur-xl animate-pulse delay-1000"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Main Title with Ottoman styling -->
            <div class="mb-8">
                <h1 class="text-ottoman-title mb-4">
                    Contact
                </h1>
                <div class="flex items-center justify-center space-x-4 mb-4">
                    <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent flex-1 max-w-xs"></div>
                    <span class="text-2xl text-[#D4AF37]">✦</span>
                    <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent flex-1 max-w-xs"></div>
                </div>
                <p class="text-lg font-arabic text-[#1B4B4C] mb-2">اتصل بنا</p>
            </div>

            <p class="text-xl text-ottoman-subtitle mb-8 max-w-3xl mx-auto leading-relaxed">
                Heb je een vraag, suggestie of feedback? We horen graag van je en helpen je graag verder!
            </p>

            <!-- Islamic Quote -->
            <div class="max-w-2xl mx-auto p-4 bg-white/50 border-2 border-[#D4AF37]/30 rounded-xl shadow-lg backdrop-blur-sm">
                <p class="text-sm font-arabic text-[#8B1538] mb-1">
                    "وَتَعَاوَنُوا عَلَى الْبِرِّ وَالتَّقْوَىٰ"
                </p>
                <p class="text-xs text-[#1B4B4C]">
                    "En help elkaar in goedheid en godsvrezendheid" - Quran 5:2
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-20 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-r from-white via-[#F7F3E9] to-white"></div>
    <div class="absolute inset-0 ottoman-geometric opacity-15"></div>

    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Contact Form -->
            <div class="relative">
                <div class="ottoman-card p-8">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold font-arabic text-[#8B1538] mb-4">Stuur ons een bericht</h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-[#D4AF37] to-[#8B1538] rounded-full"></div>
                    </div>

                    @if(session('success'))
                    <div class="mb-8 bg-[#D4AF37]/10 border-2 border-[#D4AF37]/30 rounded-xl p-6">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="h-6 w-6 text-[#8B1538]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-[#8B1538] mb-1">Bericht verzonden!</h4>
                                <p class="text-sm text-[#1B4B4C]">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="form-ottoman space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-[#0F1419] mb-3 font-arabic">
                                    Naam (optioneel)
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="w-full px-4 py-3 border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300 @error('name') border-red-500 @enderror"
                                    placeholder="Je volledige naam (optioneel)">
                                @error('name')
                                <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 000 2v4a1 1 0 102 0V7a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-[#0F1419] mb-3 font-arabic">
                                    E-mailadres (optioneel)
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="w-full px-4 py-3 border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300 @error('email') border-red-500 @enderror"
                                    placeholder="je@email.com (optioneel)">
                                @error('email')
                                <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 000 2v4a1 1 0 102 0V7a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-[#0F1419] mb-3 font-arabic">
                                Onderwerp *
                            </label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                                class="w-full px-4 py-3 border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300 @error('subject') border-red-500 @enderror"
                                placeholder="Waar gaat je bericht over?">
                            @error('subject')
                            <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 000 2v4a1 1 0 102 0V7a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ $message }}</span>
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-[#0F1419] mb-3 font-arabic">
                                Bericht *
                            </label>
                            <textarea id="message" name="message" rows="6" required
                                class="w-full px-4 py-3 border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300 resize-none @error('message') border-red-500 @enderror"
                                placeholder="Vertel ons wat je wilt weten of delen. Wees zo specifiek mogelijk zodat we je de beste hulp kunnen bieden.">{{ old('message') }}</textarea>
                            @error('message')
                            <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 000 2v4a1 1 0 102 0V7a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ $message }}</span>
                            </p>
                            @enderror
                        </div>

                        <div class="bg-[#1B4B4C]/10 border-2 border-[#1B4B4C]/20 rounded-xl p-6">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="h-6 w-6 text-[#1B4B4C]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-[#1B4B4C] mb-2">Voor islamitische vragen</h4>
                                    <p class="text-sm text-[#1B4B4C] leading-relaxed">
                                        Voor islamitische vragen kun je ook direct een vraag stellen via onze
                                        <a href="{{ route('vragen.index') }}" class="text-[#8B1538] hover:text-[#D4AF37] font-medium transition-colors duration-200 underline">vragen pagina</a>.
                                        Daar kun je anoniem vragen stellen.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-ottoman w-full">
                            <span class="flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                <span>Verstuur Bericht</span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div class="space-y-8">
                <div class="relative">
                    <div class="mb-8">
                        <h3 class="text-3xl font-bold font-arabic text-[#8B1538] mb-4">Waarom contact opnemen?</h3>
                        <div class="w-20 h-1 bg-gradient-to-r from-[#D4AF37] to-[#8B1538] rounded-full"></div>
                    </div>

                    <div class="space-y-6">
                        <div class="group">
                            <div class="flex items-start space-x-4 p-6 bg-white border-2 border-[#D4AF37]/30 rounded-xl hover:shadow-lg transition-all duration-300 hover:border-[#D4AF37]/60">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#D4AF37] to-[#B87333] rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold font-arabic text-[#0F1419] mb-2">Vragen over de website</h4>
                                    <p class="text-[#1B4B4C] text-sm leading-relaxed">Heb je technische problemen of vragen over hoe de website werkt? We helpen je graag verder.</p>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <div class="flex items-start space-x-4 p-6 bg-white border-2 border-[#D4AF37]/30 rounded-xl hover:shadow-lg transition-all duration-300 hover:border-[#D4AF37]/60">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#8B1538] to-[#722F37] rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold font-arabic text-[#0F1419] mb-2">Feedback en suggesties</h4>
                                    <p class="text-[#1B4B4C] text-sm leading-relaxed">We horen graag hoe we de website kunnen verbeteren en welke nieuwe functies je zou willen zien.</p>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <div class="flex items-start space-x-4 p-6 bg-white border-2 border-[#D4AF37]/30 rounded-xl hover:shadow-lg transition-all duration-300 hover:border-[#D4AF37]/60">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#1B4B4C] to-[#1B2951] rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold font-arabic text-[#0F1419] mb-2">Rapporteer problemen</h4>
                                    <p class="text-[#1B4B4C] text-sm leading-relaxed">Zie je iets dat niet klopt of werkt niet goed? Laat het ons weten zodat we het kunnen oplossen.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Islamic Questions Card -->
                <div class="ottoman-card p-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#D4AF37] to-[#B87333] rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold font-arabic text-[#8B1538] mb-3">Voor islamitische vragen</h4>
                            <p class="text-[#1B4B4C] text-sm leading-relaxed mb-4">
                                Voor islamitische vragen kun je het beste gebruik maken van onze vragen pagina.
                                Daar kun je anoniem vragen stellen en antwoorden van deskundigen krijgen.
                            </p>
                            <a href="{{ route('vragen.index') }}" class="inline-flex items-center space-x-2 text-[#8B1538] hover:text-[#D4AF37] font-medium transition-colors duration-200 group">
                                <span>Ga naar vragen pagina</span>
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Privacy Card -->
                <div class="bg-[#8B1538]/10 border-2 border-[#8B1538]/20 rounded-xl p-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-[#8B1538] rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-[#8B1538] mb-3">Privacy gegarandeerd</h4>
                            <p class="text-[#1B4B4C] text-sm leading-relaxed">
                                Je contactgegevens worden vertrouwelijk behandeld en alleen gebruikt om je bericht te beantwoorden.
                                We delen je gegevens nooit met derden en respecteren je privacy volledig.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Islamic Quote -->
                <div class="bg-gradient-to-r from-[#D4AF37]/10 to-[#8B1538]/10 border-2 border-[#D4AF37]/30 rounded-xl p-6">
                    <div class="text-center">
                        <p class="text-lg font-arabic text-[#8B1538] mb-2">
                            "وَالَّذِينَ يُؤْمِنُونَ بِمَا أُنزِلَ إِلَيْكَ"
                        </p>
                        <p class="text-sm text-[#1B4B4C]">
                            "En degenen die geloven in wat tot jou is geopenbaard"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#F7F3E9] to-white"></div>
    <div class="absolute inset-0 ottoman-pattern opacity-20"></div>

    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold font-arabic text-[#8B1538] mb-6">Veelgestelde Vragen</h2>
            <p class="text-xl text-ottoman-subtitle max-w-3xl mx-auto leading-relaxed">
                Antwoorden op veelgestelde vragen over onze website en diensten
            </p>
            <div class="crescent-divider"></div>
        </div>

        <div class="space-y-8">
            <!-- FAQ Item 1 -->
            <div class="group">
                <div class="ottoman-card p-8 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#D4AF37] to-[#B87333] rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold font-arabic text-[#0F1419] mb-4">Hoe kan ik een islamitische vraag stellen?</h3>
                            <p class="text-[#1B4B4C] leading-relaxed">
                                Ga naar onze
                                <a href="{{ route('vragen.index') }}" class="text-[#8B1538] hover:text-[#D4AF37] font-medium transition-colors duration-200 underline">vragen pagina</a>
                                en klik op "Stel een Vraag". Je kunt volledig anoniem vragen stellen - je naam en e-mailadres worden gehashed en zijn nooit zichtbaar voor anderen.
                                Alleen je vraag wordt na goedkeuring getoond.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="group">
                <div class="ottoman-card p-8 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#8B1538] to-[#722F37] rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold font-arabic text-[#0F1419] mb-4">Hoe lang duurt het voordat mijn vraag wordt beantwoord?</h3>
                            <p class="text-[#1B4B4C] leading-relaxed">
                                We streven ernaar om vragen binnen 1-3 werkdagen te beantwoorden. Complexere vragen over fiqh of theologische onderwerpen kunnen iets langer duren omdat we zorgvuldige research doen.
                                Je ontvangt een e-mail wanneer je vraag is beantwoord (als je een e-mailadres hebt opgegeven).
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="group">
                <div class="ottoman-card p-8 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#1B4B4C] to-[#1B2951] rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold font-arabic text-[#0F1419] mb-4">Zijn mijn gegevens veilig?</h3>
                            <p class="text-[#1B4B4C] leading-relaxed">
                                Ja, absoluut. Je privacy is onze hoogste prioriteit. Je naam en e-mailadres worden gehashed en zijn nooit zichtbaar voor anderen.
                                Alleen je vraag wordt getoond na goedkeuring door onze moderators. We volgen alle GDPR-richtlijnen en bewaren geen onnodige persoonlijke gegevens.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="group">
                <div class="ottoman-card p-8 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#9CAF88] to-[#722F37] rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold font-arabic text-[#0F1419] mb-4">Kan ik mijn vraag later bewerken of verwijderen?</h3>
                            <p class="text-[#1B4B4C] leading-relaxed">
                                Nee, eenmaal ingediende vragen kunnen niet worden bewerkt of verwijderd. Dit is om de integriteit van onze Q&A-database te waarborgen en ervoor te zorgen dat antwoorden in de juiste context blijven.
                                Als je een belangrijke fout hebt gemaakt, kun je contact met ons opnemen via dit formulier.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-16">
            <div class="bg-gradient-to-r from-[#D4AF37]/10 to-[#8B1538]/10 border-2 border-[#D4AF37]/30 rounded-2xl p-8">
                <h3 class="text-2xl font-bold font-arabic text-[#8B1538] mb-4">Nog meer vragen?</h3>
                <p class="text-[#1B4B4C] mb-6 leading-relaxed">
                    Kon je het antwoord op je vraag niet vinden? Gebruik het contactformulier om ons een bericht te sturen.
                </p>
                <a href="#questionForm" class="btn-ottoman inline-block">
                    <span class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <span>Stel je vraag</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
