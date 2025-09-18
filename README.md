# Vraag de Imaam - Islamitische Vragen en Antwoorden

Een mooie, moderne website waar moslims anoniem islamitische vragen kunnen stellen en betrouwbare antwoorden kunnen krijgen van deskundigen.

## 🚀 Features

### Voor Gebruikers
- **Anonieme Vragen Stellen** - Stel vragen zonder je identiteit prijs te geven
- **Privacy Gegarandeerd** - Namen en e-mailadressen worden gehashed en zijn nooit zichtbaar
- **Categorieën** - Vragen zijn georganiseerd in verschillende islamitische categorieën
- **Tags** - Zoek en filter vragen op specifieke onderwerpen
- **Zoekfunctionaliteit** - Vind antwoorden op je vragen door te zoeken
- **Responsive Design** - Werkt perfect op alle apparaten
- **Moderne UI** - Mooie, schone interface met Tailwind CSS

### Voor Administrators
- **Filament Admin Panel** - Volledig beheer via een moderne admin interface
- **Vraagbeheer** - Goedkeuren, beantwoorden en beheren van vragen
- **Categoriebeheer** - Beheer categorieën met kleuren en beschrijvingen
- **Tagbeheer** - Organiseer vragen met tags
- **Privacy Focus** - Alleen vragen zijn zichtbaar, geen persoonlijke gegevens

## 🛠️ Technische Details

### Backend
- **Laravel 12** - Moderne PHP framework
- **Filament 4.0** - Admin panel
- **MySQL** - Database
- **Tailwind CSS 4.0** - Styling
- **Vite** - Asset bundling

### Database Structuur
- **Questions** - Vragen met gehashte persoonlijke gegevens
- **Categories** - Categorieën met kleuren en beschrijvingen
- **Tags** - Tags voor organisatie
- **Question-Tag** - Many-to-many relatie

### Privacy Features
- Namen en e-mailadressen worden gehashed met SHA-256
- Alleen goedgekeurde vragen zijn zichtbaar
- Geen persoonlijke gegevens in de frontend
- Anonieme vraagstelling

## 📁 Project Structuur

```
app/
├── Http/Controllers/          # Controllers voor public pages
├── Models/                    # Eloquent models
└── Filament/Resources/        # Filament admin resources

resources/
├── views/
│   ├── layouts/              # Main layout
│   ├── home.blade.php        # Homepage
│   ├── contact.blade.php     # Contact page
│   └── vragen/               # Questions pages
├── css/app.css              # Custom styles
└── js/app.js                # JavaScript functionality

database/
├── migrations/              # Database migrations
└── seeders/                # Sample data
```

## 🎨 Design Features

- **Groen Kleurenschema** - Islamitische kleuren (groen, wit)
- **Moderne Typografie** - Inter font voor leesbaarheid
- **Responsive Grid** - Werkt op alle schermformaten
- **Smooth Animations** - Subtiele hover effecten
- **Accessibility** - Toegankelijk voor alle gebruikers
- **Mobile-First** - Geoptimaliseerd voor mobiele apparaten

## 🔧 Installatie

1. **Dependencies installeren:**
   ```bash
   composer install
   npm install
   ```

2. **Environment configureren:**
   ```bash
   cp .env.example .env
   # Pas database instellingen aan in .env
   ```

3. **Database setup:**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

4. **Assets builden:**
   ```bash
   npm run build
   ```

5. **Server starten:**
   ```bash
   php artisan serve
   ```

## 📱 Pagina's

### Homepage (`/`)
- Hero sectie met call-to-action
- Statistieken
- Uitgelichte vragen
- Categorieën overzicht
- Recente vragen

### Vragen (`/vragen`)
- Overzicht van alle goedgekeurde vragen
- Zoekfunctionaliteit
- Filter op categorie en tags
- Sorteer opties
- Paginatie

### Individuele Vraag (`/vragen/{id}`)
- Volledige vraag en antwoord
- Gerelateerde vragen
- Categorie informatie
- Deel functionaliteit
- Vraag stellen modal

### Contact (`/contact`)
- Contact formulier
- FAQ sectie
- Informatie over de website

## 🔐 Admin Panel

Toegang via `/admin` (na Filament setup):

- **Vragen beheren** - Goedkeuren, beantwoorden, uitlichten
- **Categorieën** - Toevoegen, bewerken, kleuren instellen
- **Tags** - Beheren van tags
- **Privacy** - Geen toegang tot persoonlijke gegevens

## 🌟 Highlights

- **100% Anoniem** - Geen persoonlijke gegevens zichtbaar
- **Modern Design** - Schone, professionele uitstraling
- **Mobile Responsive** - Perfect op alle apparaten
- **SEO Geoptimaliseerd** - Goede zoekmachine optimalisatie
- **Snel en Veilig** - Geoptimaliseerd voor prestaties
- **Nederlandse Interface** - Volledig in het Nederlands

## 📞 Support

Voor vragen over de website, gebruik het contact formulier op de website of neem contact op via de admin panel.

---

**Vraag de Imaam** - Een veilige plek voor moslims om te leren en te groeien. 🤲