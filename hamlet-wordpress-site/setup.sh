#!/bin/bash

# Hamlet WordPress Setup Script
# This script helps set up the Hamlet WordPress website

echo "🎭 Hamlet WordPress Website Setup"
echo "================================="
echo ""

# Check if MySQL is running
if ! command -v mysql &> /dev/null; then
    echo "❌ MySQL is not installed or not in PATH"
    echo "Please install MySQL first:"
    echo "  Ubuntu/Debian: sudo apt-get install mysql-server"
    echo "  CentOS/RHEL: sudo yum install mysql-server"
    echo "  macOS: brew install mysql"
    exit 1
fi

echo "✅ MySQL found"

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo "❌ PHP is not installed or not in PATH"
    echo "Please install PHP first:"
    echo "  Ubuntu/Debian: sudo apt-get install php php-mysql"
    echo "  CentOS/RHEL: sudo yum install php php-mysql"
    echo "  macOS: brew install php"
    exit 1
fi

echo "✅ PHP found"

# Set up database
echo ""
echo "📊 Setting up database..."
echo "Please enter your MySQL root password when prompted:"

mysql -u root -p < install.sql

if [ $? -eq 0 ]; then
    echo "✅ Database setup completed successfully!"
else
    echo "❌ Database setup failed. Please check your MySQL credentials."
    exit 1
fi

# Set permissions
echo ""
echo "🔐 Setting up file permissions..."

# Make sure WordPress files are readable
find . -type f -name "*.php" -exec chmod 644 {} \;
find . -type f -name "*.css" -exec chmod 644 {} \;
find . -type f -name "*.js" -exec chmod 644 {} \;

# Make directories writable
chmod 755 wp-content/
chmod 755 wp-content/themes/
chmod 755 wp-content/plugins/
chmod 755 wp-content/uploads/

echo "✅ File permissions set"

# Create uploads directory
mkdir -p wp-content/uploads/2024/10
chmod 755 wp-content/uploads/2024/10

echo "✅ Uploads directory created"

echo ""
echo "🎉 Setup completed successfully!"
echo ""
echo "Next steps:"
echo "1. Start your web server (Apache/Nginx)"
echo "2. Navigate to: http://localhost/hamlet-wordpress-site"
echo "3. Follow the WordPress installation wizard"
echo "4. Use these database credentials:"
echo "   - Database: hamlet_wordpress_db"
echo "   - Username: hamlet_user"
echo "   - Password: hamlet_password_2024"
echo "   - Host: localhost"
echo ""
echo "5. After installation, activate the 'Hamlet Theme'"
echo "6. Import content from hamlet-content.xml"
echo ""
echo "🎭 Welcome to your Hamlet WordPress website!"