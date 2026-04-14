#!/bin/bash
set -e

echo "Pulling latest..."
git pull

echo "Building assets..."
npm run build

echo "Clearing Symfony cache..."
php bin/console cache:clear

echo "Done."
