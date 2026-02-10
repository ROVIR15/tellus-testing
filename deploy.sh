#!/bin/bash

# Stop script on first error
set -e

echo "🚀 Starting deployment..."

# Enter maintenance mode
echo "🚫 Entering maintenance mode..."
(php artisan down) || true

# Pull latest changes
if [ -d .git ]; then
  echo "📦 Pulling latest changes..."
  git pull origin main
else
  echo "⚠️  Not a git repository, skipping git pull."
fi

# Install PHP dependencies
echo "🔧 Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader

# Build frontend assets
echo "🎨 Building frontend assets..."
if [ -f pnpm-lock.yaml ]; then
    pnpm install
    pnpm run build
elif [ -f yarn.lock ]; then
    yarn install
    yarn run build
else
    npm install
    npm run build
fi

# Run database migrations
echo "🗄️  Running migrations..."
php artisan migrate --force

# Optimize application
echo "🧹 Optimizing cache..."
php artisan optimize

# Upgrade Filament (publishes assets, etc.)
echo "🔄 Upgrading Filament..."
php artisan filament:upgrade

# Restart queue worker
echo "🔁 Restarting queues..."
php artisan queue:restart

# Exit maintenance mode
echo "✅ Exiting maintenance mode..."
php artisan up

echo "🎉 Deployment finished successfully!"