<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vraag de Imaam - Islamitische Vragen Anoniem Stellen</title>
    <meta name="description" content="VraagDeImaam.nl is een non-profit platform waar u volledig anoniem vragen kunt stellen aan ervaren Imaams. Open communicatie, respect en begrip tussen diverse achtergronden.">
    <meta name="keywords" content="vraag de imaam, islamitische vragen, imam, islam, vragen stellen, anoniem, moslim, fatwa, religieuze vragen, non-profit">
    <meta name="author" content="VraagDeImaam.nl">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Vraag de Imaam - Islamitische Vragen Anoniem Stellen">
    <meta property="og:description" content="VraagDeImaam.nl is een non-profit platform waar u volledig anoniem vragen kunt stellen aan ervaren Imaams.">
    <meta property="og:site_name" content="VraagDeImaam.nl">
    <meta property="og:locale" content="nl_NL">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Vraag de Imaam - Islamitische Vragen Anoniem Stellen">
    <meta name="twitter:description" content="VraagDeImaam.nl is een non-profit platform waar u volledig anoniem vragen kunt stellen aan ervaren Imaams.">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Language -->
    <link rel="alternate" hreflang="nl" href="{{ url()->current() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VVECT8BFX2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-VVECT8BFX2');
    </script>
</head>

<body class="font-sans antialiased bg-gradient-to-br from-[#FDF7E7] via-white to-[#F7F3E9] text-[#0F1419]">
    <!-- Hero Section -->
    <section class="relative py-12 sm:py-16 md:py-20 lg:py-24 overflow-hidden min-h-screen flex items-center">
        <!-- Background with Ottoman patterns -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#FDF7E7] via-[#F7F3E9] to-[#FDF7E7]"></div>
        <div class="absolute inset-0 ottoman-pattern opacity-30"></div>

        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-full h-1 sm:h-2 bg-gradient-to-r from-[#D4AF37] via-[#8B1538] to-[#1B4B4C]"></div>

        <!-- Floating geometric shapes - hidden on mobile for performance -->
        <div class="hidden sm:block absolute top-20 left-10 w-20 h-20 bg-[#D4AF37]/10 rounded-full blur-xl animate-pulse"></div>
        <div class="hidden sm:block absolute bottom-20 right-10 w-32 h-32 bg-[#8B1538]/10 rounded-full blur-xl animate-pulse delay-1000"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <!-- Header -->
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <div class="mb-6 sm:mb-8">
                    <h1 class="text-ottoman-title mb-3 sm:mb-4 px-2">
                        Vraag de Imaam
                    </h1>
                    <div class="flex items-center justify-center space-x-2 sm:space-x-4 mb-3 sm:mb-4">
                        <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent flex-1 max-w-[100px] sm:max-w-xs"></div>
                        <span class="text-xl sm:text-2xl text-[#D4AF37]">✦</span>
                        <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent flex-1 max-w-[100px] sm:max-w-xs"></div>
                    </div>
                    <p class="text-lg sm:text-xl font-arabic text-[#1B4B4C] mb-2">سأل الإمام</p>
                </div>

                <p class="text-lg sm:text-xl md:text-2xl text-ottoman-subtitle mb-6 sm:mb-8 leading-relaxed px-2">
                    Wijsheid binnen Handbereik: Vraag het de Imaam
                </p>

                <!-- Welcome Section -->
                <div class="max-w-2xl mx-auto mb-8 sm:mb-10 md:mb-12">
                    <h2 class="text-xl sm:text-2xl font-bold text-[#8B1538] mb-3 sm:mb-4 px-2">Welkom bij vraagdeimaam.nl</h2>
                    <p class="text-sm sm:text-base text-[#1B4B4C] leading-relaxed mb-4 sm:mb-6 px-2">
                        VraagDeImaam.nl is een non-profitorganisatie die mensen de mogelijkheid biedt om volledig anoniem vragen te stellen aan ervaren Imaams. Ons platform streeft naar open communicatie, respect en begrip tussen mensen met diverse achtergronden en geloofsovertuigingen. We bieden een veilige ruimte waar iedereen zijn of haar kennis kan verrijken door vragen te stellen.
                    </p>
                </div>

                <!-- Islamic Quote -->
                <div class="max-w-2xl mx-auto p-4 sm:p-6 bg-white/50 border-2 border-[#D4AF37]/30 rounded-xl shadow-lg backdrop-blur-sm mb-8 sm:mb-10 md:mb-12 mx-4">
                    <p class="text-base sm:text-lg font-arabic text-[#8B1538] mb-2">
                        "وَمَن يُؤْتَ الْحِكْمَةَ فَقَدْ أُوتِيَ خَيْرًا كَثِيرًا"
                    </p>
                    <p class="text-xs sm:text-sm text-[#1B4B4C]">
                        "En wie wijsheid wordt gegeven, heeft veel goeds ontvangen" - Quran 2:269
                    </p>
                </div>
            </div>

            <!-- Vision & Mission Section -->
            <div class="mb-8 sm:mb-10 md:mb-12 space-y-6 sm:space-y-8">
                <!-- Vision -->
                <div class="ottoman-card p-4 sm:p-6 md:p-8">
                    <h2 class="text-xl sm:text-2xl font-bold font-arabic text-[#8B1538] mb-3 sm:mb-4">Visie</h2>
                    <p class="text-sm sm:text-base text-[#1B4B4C] leading-relaxed">
                        Onze visie is om een wereld te creëren waarin mensen met diverse achtergronden en geloofsovertuigingen elkaar begrijpen en respecteren. Bij VraagDeImaam.nl streven we ernaar om open communicatie te bevorderen, kennis te delen en wijsheid toegankelijk te maken voor iedereen. Door een veilige omgeving te bieden waar mensen volledig anoniem vragen kunnen stellen, hopen we een positieve en verbindende impact te hebben op individuen en gemeenschappen, en zo bij te dragen aan een vreedzamere en begripvolle samenleving.
                    </p>
                </div>

                <!-- Mission -->
                <div class="ottoman-card p-4 sm:p-6 md:p-8">
                    <h2 class="text-xl sm:text-2xl font-bold font-arabic text-[#8B1538] mb-3 sm:mb-4">Missie</h2>
                    <p class="text-sm sm:text-base text-[#1B4B4C] leading-relaxed">
                        Onze missie bij VraagDeImaam.nl is om een verenigde wereld te bevorderen, waar mensen van diverse achtergronden en geloofsovertuigingen elkaar begrijpen en respecteren. Met open communicatie als fundament streven we ernaar kennis te delen en wijsheid toegankelijk te maken voor iedereen. Door een veilige en anonieme omgeving te bieden waar mensen vrijuit vragen kunnen stellen, willen we een positieve en verbindende impact hebben op individuen en gemeenschappen, om zo bij te dragen aan een vreedzamere en begripvolle samenleving.
                    </p>
                </div>

                <!-- About Imam -->
                <div class="ottoman-card p-4 sm:p-6 md:p-8">
                    <h2 class="text-xl sm:text-2xl font-bold font-arabic text-[#8B1538] mb-3 sm:mb-4">Over de Imam</h2>
                    <p class="text-sm sm:text-base text-[#1B4B4C] leading-relaxed">
                        Ik ben geboren in Nederland en ben hier opgegroeid tot aan mijn imamopleiding. Na mijn opleiding ben ik begonnen als imam in ons mooie land, Nederland. Als sociaal imam hoor ik vaak het volgende van mensen die de islam niet zo goed kennen: "We wisten niet dat we zo makkelijk met een religieuze voorzitter konden praten, al onze vragen konden stellen en dan ook leuke antwoorden zouden krijgen. We dachten dat er een hoge drempel zou zijn, maar we zien dat er eigenlijk helemaal geen drempel is".
                        <br><br>
                        Ja, het klopt dat er geen drempel is, want een imam moet voor de hele mensheid dienen. Ik geloof in pluralisme. Dat betekent dat ik geloof dat elke kleur en elke ideologie naast elkaar kan leven en samen een mooie samenleving kunnen vormen. Om een mooie samenleving te creëren hebben we iedereen nodig. Een samenleving verbeteren kan alleen als we elkaar steunen. Ik denk dat wanneer we kunnen communiceren, we een betere samenleving kunnen opbouwen.
                    </p>
                </div>
            </div>

            <!-- Question Form -->
            <div class="relative">
                <div class="ottoman-card p-4 sm:p-6 md:p-8">
                    @livewire('question-form')
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative bg-gradient-to-br from-[#1B2951] via-[#0F1419] to-[#1B4B4C] text-white overflow-hidden">
        <div class="absolute inset-0 ottoman-geometric opacity-10"></div>
        <div class="h-1 bg-gradient-to-r from-[#D4AF37] via-[#8B1538] to-[#D4AF37]"></div>

        <div class="relative max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37] to-[#B87333] rounded-xl flex items-center justify-center shadow-lg border-2 border-[#D4AF37]/30">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9.822 2.238a1 1 0 0 1 1.356 0l1.732 1.5a1 1 0 0 0 .848.242l2.314-.347a1 1 0 0 1 1.153.854l.347 2.314a1 1 0 0 0 .242.848l1.5 1.732a1 1 0 0 1 0 1.356l-1.5 1.732a1 1 0 0 0-.242.848l.347 2.314a1 1 0 0 1-.854 1.153l-2.314.347a1 1 0 0 0-.848.242l-1.732 1.5a1 1 0 0 1-1.356 0l-1.732-1.5a1 1 0 0 0-.848-.242l-2.314.347a1 1 0 0 1-1.153-.854l-.347-2.314a1 1 0 0 0-.242-.848l-1.5-1.732a1 1 0 0 1 0-1.356l1.5-1.732a1 1 0 0 0 .242-.848l-.347-2.314a1 1 0 0 1 .854-1.153l2.314-.347a1 1 0 0 0 .848-.242l1.732-1.5z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-xl font-bold font-arabic text-[#D4AF37]">Vraag de Imaam</span>
                        <div class="text-sm text-gray-300 font-arabic">سأل الإمام</div>
                    </div>
                </div>

                <p class="text-gray-300 text-sm mb-6 leading-relaxed max-w-2xl mx-auto">
                    Een veilige plek voor moslims om anoniem vragen te stellen over de Islam
                </p>

                <!-- Social Media Links -->
                <div class="flex items-center justify-center space-x-6 mb-6">
                    <a href="https://www.linkedin.com/in/mehmet-nurullah-canatan-306234227/?originalSubdomain=nl" target="_blank" rel="noopener noreferrer" class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200">
                        <span class="sr-only">LinkedIn</span>
                        <x-fab-linkedin class="w-6 h-6" />
                    </a>
                    <a href="https://www.instagram.com/mehnur__ossenaar/?hl=sv" target="_blank" rel="noopener noreferrer" class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200">
                        <span class="sr-only">Instagram</span>
                        <x-fab-instagram class="w-6 h-6" />
                    </a>
                    <a href="https://realworldadventures.com/wp-content/uploads/2021/07/youtube-coming-soon-01.png" target="_blank" rel="noopener noreferrer" class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200">
                        <span class="sr-only">YouTube</span>
                        <x-fab-youtube class="w-6 h-6" />
                    </a>
                </div>

                <div class="inline-block p-4 bg-[#D4AF37]/10 border-l-4 border-[#D4AF37] rounded-r-lg mb-6">
                    <p class="text-sm text-[#D4AF37] font-arabic italic">
                        "طلب العلم فريضة على كل مسلم"
                    </p>
                    <p class="text-xs text-gray-400 mt-1">
                        Het zoeken naar kennis is een plicht voor elke moslim
                    </p>
                </div>

                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} Vraag de Imaam. Alle rechten voorbehouden.
                </p>
                <p class="text-gray-500 text-xs mt-1">
                    بارك الله فيكم - Moge Allah jullie zegenen
                </p>
            </div>
        </div>
    </footer>

    @fluxScripts
</body>

</html>
