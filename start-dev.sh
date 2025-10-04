#!/bin/bash

# WordPress Development Environment Startup Script

echo "🚀 Starting WordPress Development Environment..."

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker is not running. Please start Docker first."
    exit 1
fi

# Create necessary directories
mkdir -p wp-content/themes wp-content/plugins wp-content/uploads

# Start the development environment
echo "📦 Starting Docker containers..."
docker-compose up -d

# Wait for WordPress to be ready
echo "⏳ Waiting for WordPress to be ready..."
sleep 10

# Check if WordPress is accessible
if curl -s http://localhost:8080 > /dev/null; then
    echo "✅ WordPress is ready!"
    echo ""
    echo "🌐 WordPress Site: http://localhost:8080"
    echo "🗄️  phpMyAdmin: http://localhost:8081"
    echo "📧 MailHog: http://localhost:8025"
    echo ""
    echo "📝 Default login credentials:"
    echo "   Username: admin"
    echo "   Password: admin"
    echo ""
    echo "🔧 Development tools:"
    echo "   - WordPress debug logs: wp-content/debug.log"
    echo "   - Theme development: wp-content/themes/"
    echo "   - Plugin development: wp-content/plugins/"
    echo ""
    echo "🛑 To stop the environment: docker-compose down"
else
    echo "❌ WordPress failed to start. Check the logs with: docker-compose logs"
fi