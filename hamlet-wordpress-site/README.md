# Hamlet WordPress Website

Een complete WordPress website gewijd aan William Shakespeare's meesterwerk "Hamlet". Deze website bevat een custom theme, Hamlet-specifieke content en een moderne, responsive design.

## Features

- **Custom Hamlet Theme**: Speciaal ontworpen theme met Shakespeare-inspiratie
- **Responsive Design**: Werkt perfect op desktop, tablet en mobiel
- **Hamlet Content**: Uitgebreide pagina's over het toneelstuk, personages en citaten
- **Custom Post Types**: Speciale content types voor personages en citaten
- **Modern UI**: Elegant design met gradienten en animaties
- **SEO Ready**: Geoptimaliseerd voor zoekmachines

## Installatie

### Vereisten
- PHP 7.4 of hoger
- MySQL 5.7 of hoger
- Apache/Nginx webserver
- WordPress 5.0+

### Stappen

1. **Database Setup**
   ```sql
   CREATE DATABASE hamlet_wordpress_db;
   CREATE USER 'hamlet_user'@'localhost' IDENTIFIED BY 'hamlet_password_2024';
   GRANT ALL PRIVILEGES ON hamlet_wordpress_db.* TO 'hamlet_user'@'localhost';
   FLUSH PRIVILEGES;
   ```

2. **WordPress Installatie**
   - Upload alle bestanden naar je webserver
   - Configureer de database instellingen in `wp-config.php`
   - Ga naar `http://jouw-domein.com/wp-admin/install.php`
   - Volg de WordPress installatie wizard

3. **Theme Activatie**
   - Ga naar Appearance > Themes in de WordPress admin
   - Activeer het "Hamlet Theme"
   - Configureer het menu via Appearance > Menus

4. **Content Import**
   - Importeer de Hamlet content via Tools > Import > WordPress
   - Upload het `hamlet-content.xml` bestand

## Theme Features

### Custom Post Types
- **Personages**: Voor gedetailleerde karakterbeschrijvingen
- **Citaten**: Voor beroemde citaten uit het stuk

### Widget Areas
- Primary Sidebar met Hamlet-specifieke widgets
- Customizable footer widgets

### Menu Support
- Primary navigation menu
- Mobile-responsive menu
- Custom menu locations

## Content Structuur

### Hoofdpagina's
- **Home**: Welkomstpagina met overzicht
- **Over Hamlet**: Uitgebreide inleiding op het toneelstuk
- **Personages**: Gedetailleerde beschrijvingen van alle hoofdpersonages
- **Citaten**: Beroemde citaten met context en uitleg
- **Acten**: Overzicht van de vijf acten van het stuk

### Blog Posts
- Analyses van verschillende aspecten van Hamlet
- Moderne interpretaties en adaptaties
- Academische artikelen over het stuk

## Customization

### Kleuren Aanpassen
Bewerk `style.css` om de kleurenschema aan te passen:
- Primary: #2c3e50 (donkerblauw)
- Secondary: #8e44ad (paars)
- Accent: #f39c12 (oranje)

### Typography
Het theme gebruikt:
- Headers: Playfair Display (Google Fonts)
- Body text: Lora (Google Fonts)
- Fallback: Times New Roman

### JavaScript Features
- Smooth scrolling
- Fade-in animaties
- Interactive hover effects
- Mobile menu toggle

## Browser Support

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+
- Internet Explorer 11 (basisondersteuning)

## Performance

Het theme is geoptimaliseerd voor snelheid:
- Minimale CSS en JavaScript
- Optimized images
- Clean HTML markup
- Efficient database queries

## Security

- WordPress security best practices
- Sanitized inputs en outputs
- Nonce verification
- Capability checks

## Ondersteuning

Voor vragen of problemen:
1. Controleer de WordPress documentatie
2. Bekijk de theme documentatie
3. Controleer de browser console voor JavaScript errors
4. Controleer de WordPress debug log

## Licentie

Dit theme is vrijgegeven onder de GPL v2 licentie, net als WordPress zelf.

## Credits

- **WordPress**: Het content management systeem
- **Shakespeare**: Voor het meesterwerk Hamlet
- **Google Fonts**: Voor de typography
- **Custom Development**: Voor het theme en de content

---

*"To be, or not to be, that is the question"* - Hamlet, Act III, Scene 1