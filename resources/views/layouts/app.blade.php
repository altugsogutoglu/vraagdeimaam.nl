<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Vraag de Imaam - Islamitische Vragen en Antwoorden')</title>
    <meta name="description" content="@yield('description', 'Stel anoniem je islamitische vragen en krijg betrouwbare antwoorden van deskundigen. Een veilige plek voor alle moslims om te leren en te groeien.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

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


    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VVECT8BFX2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-VVECT8BFX2');
    </script>


</head>

<body
    class="font-sans antialiased bg-gradient-to-br from-[#FDF7E7] via-white to-[#F7F3E9] text-[#0F1419] ottoman-pattern">
    <!-- Navigation -->
    <nav class="nav-ottoman sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-[#D4AF37] to-[#B87333] rounded-xl flex items-center justify-center shadow-lg border-2 border-[#D4AF37]/30">
                            <!-- Islamic Star and Crescent -->
                            <div class="relative">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M9.822 2.238a1 1 0 0 1 1.356 0l1.732 1.5a1 1 0 0 0 .848.242l2.314-.347a1 1 0 0 1 1.153.854l.347 2.314a1 1 0 0 0 .242.848l1.5 1.732a1 1 0 0 1 0 1.356l-1.5 1.732a1 1 0 0 0-.242.848l.347 2.314a1 1 0 0 1-.854 1.153l-2.314.347a1 1 0 0 0-.848.242l-1.732 1.5a1 1 0 0 1-1.356 0l-1.732-1.5a1 1 0 0 0-.848-.242l-2.314.347a1 1 0 0 1-1.153-.854l-.347-2.314a1 1 0 0 0-.242-.848l-1.5-1.732a1 1 0 0 1 0-1.356l1.5-1.732a1 1 0 0 0 .242-.848l-.347-2.314a1 1 0 0 1 .854-1.153l2.314-.347a1 1 0 0 0 .848-.242l1.732-1.5z" />
                                </svg>
                                <div class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-white/20"></div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xl font-bold font-arabic text-[#8B1538]">Vraag de Imaam</span>
                            <span class="text-xs text-[#1B4B4C] font-medium">سأل الإمام</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="{{ route('home') }}"
                            class="relative px-4 py-2 text-sm font-medium transition-all duration-300 {{ request()->routeIs('home') ? 'text-[#8B1538] bg-[#D4AF37]/10 border-b-2 border-[#D4AF37]' : 'text-[#1B4B4C] hover:text-[#8B1538] hover:bg-[#D4AF37]/5' }} rounded-md">
                            <span class="relative z-10">Home</span>
                        </a>
                        <a href="{{ route('vragen.index') }}"
                            class="relative px-4 py-2 text-sm font-medium transition-all duration-300 {{ request()->routeIs('vragen.*') ? 'text-[#8B1538] bg-[#D4AF37]/10 border-b-2 border-[#D4AF37]' : 'text-[#1B4B4C] hover:text-[#8B1538] hover:bg-[#D4AF37]/5' }} rounded-md">
                            <span class="relative z-10">Vragen</span>
                        </a>
                        <a href="{{ route('contact') }}"
                            class="relative px-4 py-2 text-sm font-medium transition-all duration-300 {{ request()->routeIs('contact') ? 'text-[#8B1538] bg-[#D4AF37]/10 border-b-2 border-[#D4AF37]' : 'text-[#1B4B4C] hover:text-[#8B1538] hover:bg-[#D4AF37]/5' }} rounded-md">
                            <span class="relative z-10">Contact</span>
                        </a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button"
                        class="mobile-menu-button bg-[#D4AF37]/10 inline-flex items-center justify-center p-2 rounded-md text-[#1B4B4C] hover:text-[#8B1538] hover:bg-[#D4AF37]/20 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#D4AF37] border border-[#D4AF37]/30">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden">
            <div
                class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gradient-to-r from-[#FDF7E7] to-white border-t-2 border-[#D4AF37]">
                <a href="{{ route('home') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium transition-all duration-300 {{ request()->routeIs('home') ? 'text-[#8B1538] bg-[#D4AF37]/10 border-l-4 border-[#D4AF37]' : 'text-[#1B4B4C] hover:text-[#8B1538] hover:bg-[#D4AF37]/5' }}">
                    Home
                </a>
                <a href="{{ route('vragen.index') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium transition-all duration-300 {{ request()->routeIs('vragen.*') ? 'text-[#8B1538] bg-[#D4AF37]/10 border-l-4 border-[#D4AF37]' : 'text-[#1B4B4C] hover:text-[#8B1538] hover:bg-[#D4AF37]/5' }}">
                    Vragen
                </a>
                <a href="{{ route('contact') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium transition-all duration-300 {{ request()->routeIs('contact') ? 'text-[#8B1538] bg-[#D4AF37]/10 border-l-4 border-[#D4AF37]' : 'text-[#1B4B4C] hover:text-[#8B1538] hover:bg-[#D4AF37]/5' }}">
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
    <footer class="relative bg-gradient-to-br from-[#1B2951] via-[#0F1419] to-[#1B4B4C] text-white overflow-hidden">
        <!-- Ottoman Pattern Overlay -->
        <div class="absolute inset-0 ottoman-geometric opacity-10"></div>

        <!-- Decorative Top Border -->
        <div class="h-1 bg-gradient-to-r from-[#D4AF37] via-[#8B1538] to-[#D4AF37]"></div>

        <div class="relative max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-[#D4AF37] to-[#B87333] rounded-xl flex items-center justify-center shadow-lg border-2 border-[#D4AF37]/30">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.822 2.238a1 1 0 0 1 1.356 0l1.732 1.5a1 1 0 0 0 .848.242l2.314-.347a1 1 0 0 1 1.153.854l.347 2.314a1 1 0 0 0 .242.848l1.5 1.732a1 1 0 0 1 0 1.356l-1.5 1.732a1 1 0 0 0-.242.848l.347 2.314a1 1 0 0 1-.854 1.153l-2.314.347a1 1 0 0 0-.848.242l-1.732 1.5a1 1 0 0 1-1.356 0l-1.732-1.5a1 1 0 0 0-.848-.242l-2.314.347a1 1 0 0 1-1.153-.854l-.347-2.314a1 1 0 0 0-.242-.848l-1.5-1.732a1 1 0 0 1 0-1.356l1.5-1.732a1 1 0 0 0 .242-.848l-.347-2.314a1 1 0 0 1 .854-1.153l2.314-.347a1 1 0 0 0 .848-.242l1.732-1.5z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xl font-bold font-arabic text-[#D4AF37]">Vraag de Imaam</span>
                            <div class="text-sm text-gray-300 font-arabic">سأل الإمام</div>
                        </div>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Een veilige plek voor moslims om anoniem vragen te stellen en betrouwbare antwoorden te krijgen
                        over de Islam.
                    </p>

                    <!-- Islamic Quote -->
                    <div class="mt-6 p-4 bg-[#D4AF37]/10 border-l-4 border-[#D4AF37] rounded-r-lg">
                        <p class="text-sm text-[#D4AF37] font-arabic italic">
                            "طلب العلم فريضة على كل مسلم"
                        </p>
                        <p class="text-xs text-gray-400 mt-1">
                            Het zoeken naar kennis is een plicht voor elke moslim
                        </p>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6 text-[#D4AF37] islamic-star">Navigatie</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}"
                                class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200 flex items-center space-x-2">
                                <span class="w-2 h-2 bg-[#D4AF37] rounded-full"></span>
                                <span>Home</span>
                            </a></li>
                        <li><a href="{{ route('vragen.index') }}"
                                class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200 flex items-center space-x-2">
                                <span class="w-2 h-2 bg-[#D4AF37] rounded-full"></span>
                                <span>Vragen</span>
                            </a></li>
                        <li><a href="{{ route('contact') }}"
                                class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200 flex items-center space-x-2">
                                <span class="w-2 h-2 bg-[#D4AF37] rounded-full"></span>
                                <span>Contact</span>
                            </a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6 text-[#D4AF37] islamic-star">Contact</h3>
                    <div class="space-y-4">
                        <div class="p-3 bg-[#8B1538]/20 border border-[#8B1538]/30 rounded-lg">
                            <p class="text-gray-300 text-sm mb-2">
                                Heb je een vraag? Stel hem anoniem via onze website.
                            </p>
                            <p class="text-gray-400 text-xs">
                                Alle vragen worden vertrouwelijk behandeld.
                            </p>
                        </div>

                        <div class="flex items-center space-x-2 text-sm">
                            <svg class="w-4 h-4 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-300">100% Anoniem & Veilig</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Decorative Divider -->
            {{-- <div class="crescent-divider mt-12"></div> --}}

            <div class="text-center pt-8">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} Vraag de Imaam. Alle rechten voorbehouden.
                </p>
                <p class="text-gray-500 text-xs mt-1">
                    بارك الله فيكم - Moge Allah jullie zegenen
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
