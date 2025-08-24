# Mijn Platform - Laravel Web Applicatie

## Inhoudsopgave
1. [Projectbeschrijving](#projectbeschrijving)
2. [Gebruikte Technologieën](#gebruikte-technologieën)
3. [Functionaliteiten](#functionaliteiten)
4. [Installatie](#installatie)
5. [Screenshots](#screenshots)
6. [Architectuur](#architectuur)
7. [Beveiliging](#beveiliging)
8. [Deployment](#deployment)
9. [Ondersteuning](#ondersteuning)

## Projectbeschrijving

**Mijn Platform** is een volledig functionele webapplicatie ontwikkeld met Laravel 12 die dient als een contentmanagementsysteem met uitgebreide gebruikersfunctionaliteiten. De applicatie biedt een moderne, gebruiksvriendelijke interface voor het beheren van nieuws, FAQ's, gebruikersprofielen en contactberichten.

Het platform is ontworpen om zowel reguliere bezoekers als geauthenticeerde gebruikers te bedienen, met speciale administratieve functionaliteiten voor beheerders. De applicatie volgt moderne webontwikkelingsstandaarden en best practices voor beveiliging, gebruikservaring en onderhoudbaarheid.

## Gebruikte Technologieën

### Backend Framework
- **Laravel 12** - Het primaire PHP framework
- **PHP 8.2+** - Voor moderne syntax en optimale prestaties
- **SQLite** - Database voor ontwikkeling en productie
- **Eloquent ORM** - Database interacties

### Frontend Technologieën
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lichtgewicht JavaScript framework
- **Vite** - Moderne build tool voor assets
- **Blade Templates** - Laravel's templating engine

### Authenticatie & Beveiliging
- **Laravel Breeze** - Authenticatie scaffolding
- **CSRF Protection** - Cross-site request forgery bescherming
- **Bcrypt Hashing** - Wachtwoordbeveiliging
- **Role-based Middleware** - Toegangscontrole

## Functionaliteiten

### 1. Authenticatie & Gebruikersbeheer
- Volledige registratie en login functionaliteit
- Wachtwoord reset via email
- Rol-gebaseerd toegangssysteem (Gebruiker/Administrator)
- Sessie management met beveiliging

### 2. Gebruikersprofielen
- Publieke profielen voor alle gebruikers
- Uitgebreide profiel aanpassingen
- Profielfoto upload functionaliteit
- Persoonlijke beschrijving en geboortedatum

### 3. Nieuwsmanagementsysteem
- Publieke toegang tot nieuws voor alle bezoekers
- Volledig CRUD systeem voor administrators
- Rich text content ondersteuning
- Auteur attribution en timestamps

### 4. FAQ Systeem
- Georganiseerd per categorieën
- Beheer van categorieën en vragen door administrators
- Gebruiksvriendelijke Q&A presentatie
- Categoriegebaseerde filtering

### 5. Contactsysteem
- Publiek toegankelijk contactformulier
- Admin inbox voor berichten beheer
- Formulier validatie en spam bescherming
- Gestructureerde opslag van contactgegevens

## Installatie

### Vereisten
```bash
PHP >= 8.2
Composer
Node.js >= 18.0
npm >= 8.0
```

### Installatiestappen
```bash
# Repository klonen
git clone [repository-url]
cd mijn-platform

# Dependencies installeren
composer install
npm install

# Environment configuratie
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate --seed
php artisan storage:link

# Assets compileren
npm run build

# Development server starten
php artisan serve
```

### Standaard Accounts
- **Administrator**: admin@ehb.be / Password!321
- **Test Gebruiker**: test@example.com / password

## Screenshots

### Authenticatie

#### Registratiepagina
![Registratie](<Screenshot 2025-08-24 at 22.56.29.png>)
*Clean registratie interface met Laravel logo, naam, email, wachtwoord en bevestiging velden. Inclusief "Already registered?" link voor bestaande gebruikers.*

#### Startpagina met Publieke Profielen
![Startpagina met profielen](<Screenshot 2025-08-24 at 22.57.17.png>)
*Ma Platforme startpagina toont publiek toegankelijke gebruikersprofielen met profielfoto's en "Voir le profil" knoppen. Connexion en Inscription knoppen in de header voor niet-ingelogde bezoekers.*

### Gebruikersbeheer

#### Profiel Bewerken (Uitgebreid)
![Profiel bewerken](<Screenshot 2025-08-24 at 23.00.30.png>)
*Uitgebreide profiel bewerkingspagina, met naam, email, geboortedatum, "À propos de moi" tekstveld en profielfoto upload functionaliteit.*



#### Admin Berichten Inbox
![Berichtenbox](<Screenshot 2025-08-24 at 23.03.27.png>)
*Administrator interface voor het beheren van ontvangen contactberichten, toont afzender info, email adressen en berichten met timestamps.*

#### Nieuwe Gebruiker Aanmaken
![Gebruiker aanmaken](<Screenshot 2025-08-24 at 23.05.09.png>)
*Administrator formulier voor het aanmaken van nieuwe gebruikers met naam, email, wachtwoord velden en rol selectie dropdown.*

#### Gebruikersbeheer Overzicht
![Gebrukersbeheer](<Screenshot 2025-08-24 at 23.06.08.png>)
*Overzicht van alle gebruikers met rol indicators (Admin/Utilisateur badges), registratie datums en promotie/degradatie knoppen.*

### FAQ & Categorieën

#### FAQ Categorie Aanmaken
![Faq](<Screenshot 2025-08-24 at 23.08.48.png>) ![Faq](<Screenshot 2025-08-24 at 23.07.42.png>)
*Formulier voor het aanmaken van nieuwe FAQ categorieën met naam en optionele beschrijving velden.*

#### FAQ Categorie Bewerken
![FAQ Categorie Bewerken]![Faq](<Screenshot 2025-08-24 at 23.08.48.png>) 
*Bewerkingsformulier voor bestaande categorieën, hier "Questions concernant le respect" met ingevulde beschrijving.*

#### FAQ Categorieën Beheer
![Faq](<Screenshot 2025-08-24 at 23.11.00.png>)
*Overzicht van alle FAQ categorieën met aantal FAQ's per categorie en Modifier/Supprimer opties voor beheer.*

#### Eigen Profiel Bewerken
![Eigen profiel bewerken](<Screenshot 2025-08-24 at 23.12.53.png>)
*Gebruiker's eigen profiel bewerkingspagina met alle persoonlijke gegevens en profielfoto upload mogelijkheid.*

#### Gebruikersprofiel Weergave
![Gebruikersprofiel](screenshots/12-gebruikersprofiel.png)
*Publieke weergave van gebruikersprofiel (Fifa) met profielfoto, lid-sinds informatie, administrator badge en "Modifier mon profil" knop voor eigenaar.*

#### Contactformulier
![Contactformulier](<Screenshot 2025-08-24 at 23.15.02.png>)
*Publiek toegankelijk contactformulier met naam, email en bericht velden plus duidelijke "Envoyer le message" knop.*

#### FAQ Categorieën Overzicht
![FAQ Overzicht](screenshots/14-faq-overzicht.png)
*Hoofdoverzicht van FAQ categorieën management met bestaande categorieën en hun FAQ aantallen.*

#### FAQ Toevoegen
![FAQ Toevoegen](screenshots/15-faq-toevoegen.png)
*Formulier voor het toevoegen van nieuwe FAQ's met categorie selectie dropdown, vraag en antwoord velden.*

#### FAQ Publieke Weergave
![Publieke FAQ](<Screenshot 2025-08-24 at 23.17.26.png>)
*Publieke FAQ pagina georganiseerd per categorieën met Q&A formaat en admin beheer knoppen voor beheerderes.*

### Nieuwssysteem

#### Nieuws Artikel Detailpagina
![Nieuws artikel](<Screenshot 2025-08-24 at 23.18.12.png>)
*Gedetailleerde weergave van nieuwsartikel "Man (23) bijt hond" met publicatiedatum, inhoud en admin beheer knoppen (Modifier/Supprimer).*

#### Nieuws Bewerken
![Nieuws bewerken](<Screenshot 2025-08-24 at 23.19.54.png>)
*Administrator interface voor het bewerken van bestaande nieuwsartikelen met titel en inhoud velden.*

#### Nieuw Artikel Aanmaken
![Nieuws aanmaken](<Screenshot 2025-08-24 at 23.21.38.png>)
*Clean interface voor het aanmaken van nieuwe nieuwsartikelen met titel en inhoud velden plus Opslaan knop.*

#### Nieuws Overzicht

*Overzichtspagina van alle nieuwsartikelen met "Nieuw Bericht" knop voor administrators en Bekijk/Bewerk/Verwijder opties per artikel.*

## Architectuur

### MVC Patroon
De applicatie volgt het Model-View-Controller patroon:

**Models:**
- `User` - Gebruikers met rollen en profielgegevens
- `News` - Nieuwsartikelen met auteur relaties
- `FAQ` - Veelgestelde vragen met categorieën
- `Category` - FAQ categorieën
- `Contact` - Contactberichten

**Controllers:**
- `ProfileController` - Profielbeheer
- `NewsController` - Nieuwsartikelen CRUD
- `FAQController` - FAQ beheer
- `CategoryController` - Categoriebeheer
- `ContactController` - Contactberichten

**Views:**
- Blade templates met Tailwind CSS
- Responsive design voor alle apparaten
- Component-based herbruikbare elementen

### Database Schema
```sql
-- Belangrijkste tabellen
users (id, name, email, password, role, profielfoto, verjaardag, over_mij)
news (id, user_id, titel, nieuwsbericht, timestamps)
categories (id, naam, beschrijving, timestamps)
faqs (id, user_id, category_id, vraag, antwoord, timestamps)
contacts (id, user_id, formulier, timestamps)
```

### Relaties
- User → News (1:n)
- User → FAQ (1:n)
- Category → FAQ (1:n)
- User → Contact (1:n)

## Beveiliging

### Authenticatie
- Bcrypt wachtwoord hashing
- Sessie regeneratie bij login
- Rate limiting op login pogingen
- Remember me functionaliteit

### Autorisatie
- Rol-gebaseerd toegangssysteem
- Middleware voor admin routes
- CSRF bescherming op alle formulieren
- XSS preventie door output escaping

### File Upload Beveiliging
- Type validatie (alleen images)
- Grootte beperking (max 2MB)
- Veilige opslag buiten public directory
- Automatische bestandsnaam generatie

### Input Validatie
- Server-side validatie op alle formulieren
- HTML sanitisatie
- Email validatie
- Lengte beperkingen op text velden

## Deployment

### Productie Setup
```bash
# Productie dependencies
composer install --optimize-autoloader --no-dev

# Assets voor productie
npm run build

# Laravel optimalisaties
php artisan config:cache
php artisan route:cache
php artisan view:cache

# File permissions
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### Server Vereisten
- PHP 8.2+ met vereiste extensies
- Web server (Apache/Nginx)
- Database (MySQL/PostgreSQL/SQLite)
- SSL certificaat voor HTTPS

### Environment Configuratie
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://jouwdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=mijnplatform
DB_USERNAME=username
DB_PASSWORD=password
```

## Ondersteuning

### Documentatie
- **GitHub Repository**: https://github.com/Tyvian10/mijn-backendweb-project-laravel/tree/testbeanch
- **Issue Tracker**: Voor bug reports en feature requests


### Veelvoorkomende Problemen

**Database Connection Errors:**
```bash
php artisan config:clear
php artisan cache:clear
```

**Asset Compilation Issues:**
```bash
rm -rf node_modules package-lock.json
npm install
npm run build
```

**Permission Problems:**
```bash
sudo chown -R www-data:www-data storage/
sudo chmod -R 755 storage/
```

### Contact
Voor vragen of ondersteuning, maak een issue aan op GitHub of neem contact op via het contactformulier in de applicatie.

---

*Documentatie laatst bijgewerkt: Augustus 2024*
*Versie: 1.0.0*