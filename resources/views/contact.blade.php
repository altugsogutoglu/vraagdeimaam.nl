@extends('layouts.app')

@section('title', 'Contact - Vraag de Imaam')
@section('description', 'Neem contact op met Vraag de Imaam voor vragen, suggesties of feedback.')

@section('content')
<!-- Header Section -->
<section class="bg-gradient-to-br from-green-50 to-green-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Contact
            </h1>
            <p class="text-xl text-gray-700 mb-8 max-w-3xl mx-auto">
                Heb je een vraag, suggestie of feedback? We horen graag van je!
            </p>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Stuur ons een bericht</h2>
                
                @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Naam *
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('name') border-red-500 @enderror">
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                E-mailadres *
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('email') border-red-500 @enderror">
                            @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                            Onderwerp *
                        </label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('subject') border-red-500 @enderror"
                            placeholder="Waar gaat je bericht over?">
                        @error('subject')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Bericht *
                        </label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('message') border-red-500 @enderror"
                            placeholder="Vertel ons wat je wilt weten...">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-800">
                                    <strong>Tip:</strong> Voor islamitische vragen kun je ook direct een vraag stellen via onze 
                                    <a href="{{ route('vragen.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">vragen pagina</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 shadow-lg">
                        Verstuur Bericht
                    </button>
                </form>
            </div>
            
            <!-- Contact Info -->
            <div class="space-y-8">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Waarom contact opnemen?</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900">Vragen over de website</h4>
                                <p class="text-gray-600">Heb je technische problemen of vragen over hoe de website werkt?</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900">Feedback en suggesties</h4>
                                <p class="text-gray-600">We horen graag hoe we de website kunnen verbeteren.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900">Rapporteer problemen</h4>
                                <p class="text-gray-600">Zie je iets dat niet klopt of werkt niet goed? Laat het ons weten.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Voor islamitische vragen</h4>
                    <p class="text-gray-600 mb-4">
                        Voor islamitische vragen kun je het beste gebruik maken van onze 
                        <a href="{{ route('vragen.index') }}" class="text-green-600 hover:text-green-700 font-medium">vragen pagina</a>.
                        Daar kun je anoniem vragen stellen en antwoorden van deskundigen krijgen.
                    </p>
                    <a href="{{ route('vragen.index') }}" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                        Ga naar vragen pagina
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div class="bg-green-50 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Privacy</h4>
                    <p class="text-gray-600 text-sm">
                        Je contactgegevens worden vertrouwelijk behandeld en alleen gebruikt om je bericht te beantwoorden. 
                        We delen je gegevens niet met derden.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Veelgestelde Vragen</h2>
            <p class="text-gray-600">Antwoorden op veelgestelde vragen over onze website</p>
        </div>
        
        <div class="space-y-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Hoe kan ik een islamitische vraag stellen?</h3>
                <p class="text-gray-600">
                    Ga naar onze <a href="{{ route('vragen.index') }}" class="text-green-600 hover:text-green-700 font-medium">vragen pagina</a> 
                    en klik op "Stel een Vraag". Je kunt anoniem vragen stellen - je naam en e-mailadres worden gehashed en zijn nooit zichtbaar voor anderen.
                </p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Hoe lang duurt het voordat mijn vraag wordt beantwoord?</h3>
                <p class="text-gray-600">
                    We streven ernaar om vragen binnen 1-3 werkdagen te beantwoorden. Complexere vragen kunnen langer duren. 
                    Je ontvangt een e-mail wanneer je vraag is beantwoord.
                </p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Zijn mijn gegevens veilig?</h3>
                <p class="text-gray-600">
                    Ja, absoluut. Je naam en e-mailadres worden gehashed en zijn nooit zichtbaar voor anderen. 
                    Alleen je vraag wordt getoond na goedkeuring door onze moderators.
                </p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Kan ik mijn vraag later bewerken of verwijderen?</h3>
                <p class="text-gray-600">
                    Nee, eenmaal ingediende vragen kunnen niet worden bewerkt of verwijderen. Dit is om de integriteit van de Q&A te waarborgen. 
                    Als je een fout hebt gemaakt, neem dan contact met ons op.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
