<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@vraagdeimaam.nl',
        ]);

        // Create categories
        $categories = [
            [
                'name' => 'Geloof (Aqidah)',
                'slug' => 'geloof-aqidah',
                'description' => 'Vragen over de fundamenten van het islamitische geloof',
                'color' => '#3B82F6',
                'sort_order' => 1,
            ],
            [
                'name' => 'Aanbidding (Ibadah)',
                'slug' => 'aanbidding-ibadah',
                'description' => 'Vragen over gebed, vasten, zakat en andere vormen van aanbidding',
                'color' => '#10B981',
                'sort_order' => 2,
            ],
            [
                'name' => 'Jurisprudentie (Fiqh)',
                'slug' => 'jurisprudentie-fiqh',
                'description' => 'Vragen over islamitische wetgeving en jurisprudentie',
                'color' => '#F59E0B',
                'sort_order' => 3,
            ],
            [
                'name' => 'Ethiek en Gedrag (Akhlaq)',
                'slug' => 'ethiek-gedrag-akhlaq',
                'description' => 'Vragen over islamitische ethiek en goed gedrag',
                'color' => '#8B5CF6',
                'sort_order' => 4,
            ],
            [
                'name' => 'Familie en Huwelijk',
                'slug' => 'familie-huwelijk',
                'description' => 'Vragen over familie, huwelijk en relaties',
                'color' => '#EF4444',
                'sort_order' => 5,
            ],
            [
                'name' => 'Dagelijks Leven',
                'slug' => 'dagelijks-leven',
                'description' => 'Vragen over het dagelijks leven als moslim',
                'color' => '#06B6D4',
                'sort_order' => 6,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Create tags
        $tags = [
            ['name' => 'Gebed', 'slug' => 'gebed', 'color' => '#10B981'],
            ['name' => 'Vasten', 'slug' => 'vasten', 'color' => '#F59E0B'],
            ['name' => 'Zakat', 'slug' => 'zakat', 'color' => '#3B82F6'],
            ['name' => 'Hadj', 'slug' => 'hadj', 'color' => '#8B5CF6'],
            ['name' => 'Halal', 'slug' => 'halal', 'color' => '#10B981'],
            ['name' => 'Haram', 'slug' => 'haram', 'color' => '#EF4444'],
            ['name' => 'Huwelijk', 'slug' => 'huwelijk', 'color' => '#F59E0B'],
            ['name' => 'Scheiding', 'slug' => 'scheiding', 'color' => '#EF4444'],
            ['name' => 'Kinderen', 'slug' => 'kinderen', 'color' => '#06B6D4'],
            ['name' => 'Werk', 'slug' => 'werk', 'color' => '#8B5CF6'],
            ['name' => 'Onderwijs', 'slug' => 'onderwijs', 'color' => '#3B82F6'],
            ['name' => 'Gezondheid', 'slug' => 'gezondheid', 'color' => '#10B981'],
        ];

        foreach ($tags as $tagData) {
            Tag::create($tagData);
        }

        // Create sample questions
        $questions = [
            [
                'question' => 'Wat is de juiste manier om het ochtendgebed (Fajr) te verrichten?',
                'answer' => 'Het ochtendgebed (Fajr) bestaat uit 2 raka\'at (eenheden). Hier is de juiste volgorde:\n\n1. Niyyah (intentie) maken in je hart\n2. Takbir al-Ihram (Allahu Akbar zeggen)\n3. Eerste raka\'a: Al-Fatiha reciteren gevolgd door een korte soera\n4. Ruku\' (buiging) met de juiste dhikr\n5. Qiyam (rechtop staan)\n6. Sujud (knieling) met de juiste dhikr\n7. Jalsa (zitten tussen de twee sujud)\n8. Tweede sujud\n9. Tweede raka\'a: herhaal stappen 3-8\n10. Tashahhud en Taslim\n\nHet is belangrijk om de juiste tijden te volgen en de gebeden met concentratie te verrichten.',
                'category_id' => 2, // Aanbidding
                'is_approved' => true,
                'is_featured' => true,
                'views_count' => 1250,
                'answered_at' => now()->subDays(2),
            ],
            [
                'question' => 'Is het toegestaan om te werken in een bank die rente berekent?',
                'answer' => 'Het werken in een bank die rente (riba) berekent is een complexe kwestie die afhangt van de specifieke functie en omstandigheden:\n\n**Niet toegestaan:**\n- Direct betrokken zijn bij het berekenen of uitbetalen van rente\n- Het promoten van rente-gerelateerde producten\n- Functies die direct bijdragen aan het riba-systeem\n\n**Mogelijk toegestaan:**\n- IT-functies die geen directe betrokkenheid hebben bij rente\n- Schoonmaak of beveiliging\n- Functies in islamitische bankafdelingen\n\nHet is belangrijk om een lokale imam of islamitische geleerde te raadplegen voor specifieke adviezen, omdat de omstandigheden per situatie kunnen verschillen.',
                'category_id' => 3, // Jurisprudentie
                'is_approved' => true,
                'is_featured' => true,
                'views_count' => 890,
                'answered_at' => now()->subDays(5),
            ],
            [
                'question' => 'Hoe kan ik mijn kinderen leren over de Islam op een leuke manier?',
                'answer' => 'Het onderwijzen van kinderen over de Islam kan op veel creatieve en leuke manieren:\n\n**Voor jonge kinderen (3-8 jaar):**\n- Verhalen vertellen over de profeten\n- Islamitische liedjes en nasheeds\n- Kleurplaten met islamitische thema\'s\n- Eenvoudige gebeden en dhikr\n\n**Voor oudere kinderen (8-12 jaar):**\n- Interactieve games en apps\n- Bezoeken aan moskeeën en islamitische centra\n- Ramadan en feestdagen vieren\n- Samen koken van halal gerechten\n\n**Voor tieners:**\n- Discussies over islamitische ethiek\n- Deelname aan jeugdgroepen\n- Vrijwilligerswerk in de gemeenschap\n- Studie van de Koran en Hadith\n\nBelangrijk is om geduldig te zijn en het goede voorbeeld te geven.',
                'category_id' => 5, // Familie en Huwelijk
                'is_approved' => true,
                'is_featured' => false,
                'views_count' => 567,
                'answered_at' => now()->subDays(7),
            ],
            [
                'question' => 'Wat zijn de voorwaarden voor een geldig islamitisch huwelijk?',
                'answer' => 'Een geldig islamitisch huwelijk heeft verschillende voorwaarden:\n\n**Essentiële voorwaarden:**\n1. **Wali (voogd)** - Een mannelijke voogd voor de bruid\n2. **Twee getuigen** - Twee volwassen moslimmannen\n3. **Mahr** - Bruidsschat die aan de bruid wordt gegeven\n4. **Wederzijdse instemming** - Beide partijen moeten vrijwillig instemmen\n5. **Publieke aankondiging** - Het huwelijk moet bekend worden gemaakt\n\n**Aanbevolen elementen:**\n- Walima (bruiloftsfeest)\n- Khutbah (huwelijkspreek)\n- Dua (smeekbede) voor het huwelijk\n\n**Verboden huwelijken:**\n- Bloedverwanten (moeder, zus, tante, etc.)\n- Aangetrouwde familieleden\n- Vrouwen die al getrouwd zijn\n- Vrouwen in wachttijd (iddah)\n\nHet is belangrijk om lokale wetten en tradities te respecteren naast de islamitische vereisten.',
                'category_id' => 5, // Familie en Huwelijk
                'is_approved' => true,
                'is_featured' => false,
                'views_count' => 432,
                'answered_at' => now()->subDays(10),
            ],
            [
                'question' => 'Hoe kan ik mijn iman (geloof) versterken?',
                'answer' => 'Het versterken van iman is een continu proces. Hier zijn enkele praktische stappen:\n\n**Dagelijkse praktijken:**\n- Regelmatig gebed verrichten met concentratie\n- Dagelijks Koran lezen en bestuderen\n- Dhikr (herinnering aan Allah) beoefenen\n- Vasten op vrijwillige basis (maandag/donderdag)\n\n**Spirituele ontwikkeling:**\n- Tawbah (berouw) tonen voor zonden\n- Dua maken voor leiding en kracht\n- Goede daden verrichten\n- Negatieve invloeden vermijden\n\n**Kennis vergaren:**\n- Islamitische boeken lezen\n- Lezingen bijwonen\n- Met geleerden spreken\n- Online islamitische cursussen volgen\n\n**Gemeenschap:**\n- Tijd doorbrengen met vrome moslims\n- Deelname aan moskee-activiteiten\n- Vrijwilligerswerk in de gemeenschap\n\nOnthoud dat iman fluctueert - wees geduldig en blijf volharden.',
                'category_id' => 1, // Geloof
                'is_approved' => true,
                'is_featured' => true,
                'views_count' => 2100,
                'answered_at' => now()->subDays(3),
            ],
        ];

        foreach ($questions as $questionData) {
            $question = Question::create([
                'question' => $questionData['question'],
                'answer' => $questionData['answer'],
                'name_hash' => hash('sha256', 'Anonieme Gebruiker'),
                'email_hash' => hash('sha256', 'anoniem@example.com'),
                'category_id' => $questionData['category_id'],
                'is_approved' => $questionData['is_approved'],
                'is_featured' => $questionData['is_featured'],
                'views_count' => $questionData['views_count'],
                'answered_at' => $questionData['answered_at'],
            ]);

            // Attach random tags to questions
            $randomTags = Tag::inRandomOrder()->limit(rand(1, 3))->get();
            $question->tags()->attach($randomTags);
        }
    }
}