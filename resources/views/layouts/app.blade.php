<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Vraag de Imaam - Islamitische Vragen en Antwoorden')</title>
    <meta name="description" content="@yield('description', 'Stel anoniem je islamitische vragen en krijg betrouwbare antwoorden van deskundigen. Een veilige plek voor alle moslims om te leren en te groeien.')">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Additional Meta Tags -->
    <meta name="robots" content="index, follow">
    <meta name="author" content="Vraag de Imaam">
    <meta property="og:title" content="@yield('title', 'Vraag de Imaam - Islamitische Vragen en Antwoorden')">
    <meta property="og:description" content="@yield('description', 'Stel anoniem je islamitische vragen en krijg betrouwbare antwoorden van deskundigen.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Vraag de Imaam">
    
    @stack('head')
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">Vraag de Imaam</span>
                    </a>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-900 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-green-600 bg-green-50' : '' }}">
                            Home
                        </a>
                        <a href="{{ route('vragen.index') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('vragen.*') ? 'text-green-600 bg-green-50' : '' }}">
                            Vragen
                        </a>
                        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-green-600 bg-green-50' : '' }}">
                            Contact
                        </a>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-button bg-gray-100 inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-green-600 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                <a href="{{ route('home') }}" class="text-gray-900 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'text-green-600 bg-green-50' : '' }}">
                    Home
                </a>
                <a href="{{ route('vragen.index') }}" class="text-gray-700 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('vragen.*') ? 'text-green-600 bg-green-50' : '' }}">
                    Vragen
                </a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact') ? 'text-green-600 bg-green-50' : '' }}">
                    Contact
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold">Vraag de Imaam</span>
                    </div>
                    <p class="text-gray-300 text-sm">
                        Een veilige plek voor moslims om anoniem vragen te stellen en betrouwbare antwoorden te krijgen over de Islam.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Navigatie</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition-colors duration-200">Home</a></li>
                        <li><a href="{{ route('vragen.index') }}" class="text-gray-300 hover:text-white transition-colors duration-200">Vragen</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition-colors duration-200">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <p class="text-gray-300 text-sm mb-2">
                        Heb je een vraag? Stel hem anoniem via onze website.
                    </p>
                    <p class="text-gray-300 text-sm">
                        Alle vragen worden vertrouwelijk behandeld.
                    </p>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} Vraag de Imaam. Alle rechten voorbehouden.
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript for mobile menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
    @livewireScripts
    @stack('scripts')
</body>
</html>
