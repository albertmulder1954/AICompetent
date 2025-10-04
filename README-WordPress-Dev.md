# WordPress Development Environment

Een complete WordPress development omgeving voor comfortabel coden, gebouwd met Docker.

## 🚀 Quick Start

### Vereisten
- Docker en Docker Compose geïnstalleerd
- Git (optioneel)

### Starten van de omgeving

```bash
# Start de WordPress development omgeving
./start-dev.sh

# Of handmatig met Docker Compose
docker-compose up -d
```

### Toegang tot de applicaties

- **WordPress Site**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081
- **MailHog** (email testing): http://localhost:8025

## 🛠️ Development Tools

### Custom Development Theme
- Locatie: `wp-content/themes/custom-dev-theme/`
- Moderne, responsive theme met development helpers
- Inclusief debug functies en development shortcuts

### Dev Helper Plugin
- Locatie: `wp-content/plugins/dev-helper-plugin/`
- Handige debugging tools en development informatie
- Shortcodes: `[dev_info]` en `[debug_query]`

### Debug Configuratie
- WordPress debug mode ingeschakeld
- Debug logs in: `wp-content/debug.log`
- Development info bar onderaan de pagina (alleen voor admins)

## 📁 Project Structuur

```
/workspace/
├── docker-compose.yml          # Docker configuratie
├── .env                       # Environment variabelen
├── start-dev.sh              # Start script
├── wp-config-local.php       # WordPress configuratie
├── uploads.ini               # PHP upload instellingen
├── wp-content/
│   ├── themes/
│   │   └── custom-dev-theme/ # Custom development theme
│   ├── plugins/
│   │   └── dev-helper-plugin/ # Development helper plugin
│   └── uploads/              # Media uploads
└── README-WordPress-Dev.md   # Deze documentatie
```

## 🔧 Development Workflow

### Theme Development
1. Bewerk bestanden in `wp-content/themes/custom-dev-theme/`
2. Wijzigingen zijn direct zichtbaar op http://localhost:8080
3. Gebruik browser developer tools voor debugging

### Plugin Development
1. Maak nieuwe plugins in `wp-content/plugins/`
2. Activeer plugins via WordPress admin
3. Gebruik de Dev Helper Plugin voor debugging info

### Database Management
- Toegang via phpMyAdmin: http://localhost:8081
- Gebruikersnaam: `wordpress`
- Wachtwoord: `wordpress`

### Email Testing
- Alle emails worden onderschept door MailHog
- Bekijk emails op: http://localhost:8025
- Perfect voor testing van contact formulieren, etc.

## 🐛 Debugging

### Debug Logs
```bash
# Bekijk WordPress debug logs
tail -f wp-content/debug.log

# Bekijk Docker container logs
docker-compose logs wordpress
```

### Development Helpers
- `dev_log($message)` - Log berichten naar debug.log
- `dev_dump($var)` - Dump variabelen naar scherm
- `[dev_info]` shortcode - Toon WordPress info
- `[debug_query]` shortcode - Toon query informatie

## 🛑 Stoppen van de omgeving

```bash
# Stop alle containers
docker-compose down

# Stop en verwijder volumes (LET OP: dit verwijdert alle data!)
docker-compose down -v
```

## 🔄 Herstarten

```bash
# Herstart containers
docker-compose restart

# Herstart specifieke service
docker-compose restart wordpress
```

## 📝 Handige Commands

```bash
# Bekijk container status
docker-compose ps

# Bekijk logs van alle services
docker-compose logs

# Bekijk logs van specifieke service
docker-compose logs wordpress

# Ga de WordPress container in
docker-compose exec wordpress bash

# Ga de database container in
docker-compose exec db mysql -u wordpress -p wordpress
```

## 🎯 Development Tips

1. **Hot Reload**: Wijzigingen aan theme/plugin bestanden zijn direct zichtbaar
2. **Debug Mode**: Altijd ingeschakeld voor development
3. **Error Logging**: Alle errors worden gelogd in `wp-content/debug.log`
4. **Memory Limit**: Verhoogd naar 256M voor development
5. **File Permissions**: Automatisch geregeld door Docker

## 🔒 Security

⚠️ **BELANGRIJK**: Deze setup is alleen voor development! Gebruik nooit deze configuratie voor productie.

- Debug mode ingeschakeld
- Zwakke security keys
- File editing toegestaan
- Alle development tools actief

## 🆘 Troubleshooting

### WordPress niet toegankelijk
```bash
# Controleer of containers draaien
docker-compose ps

# Bekijk logs voor errors
docker-compose logs wordpress
```

### Database problemen
```bash
# Herstart database
docker-compose restart db

# Bekijk database logs
docker-compose logs db
```

### Permission problemen
```bash
# Fix file permissions
docker-compose exec wordpress chown -R www-data:www-data /var/www/html/wp-content
```

## 📚 Meer Informatie

- [WordPress Developer Documentation](https://developer.wordpress.org/)
- [Docker WordPress Documentation](https://hub.docker.com/_/wordpress)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)

---

**Veel plezier met coden! 🎉**