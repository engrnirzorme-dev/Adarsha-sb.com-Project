#!/usr/bin/env bash
set -euo pipefail

if [ $# -lt 1 ]; then
  echo "Usage: $0 <project-directory>"
  exit 1
fi

PROJECT_DIR="$1"

if [ ! -d "$PROJECT_DIR" ]; then
  echo "Project directory not found: $PROJECT_DIR"
  exit 1
fi

cd "$PROJECT_DIR"

echo "Setting up: $PROJECT_DIR"

if [ -f composer.json ]; then
  composer install --no-interaction --no-progress
fi

if [ -f package.json ]; then
  if [ -f package-lock.json ]; then
    npm ci
  else
    npm install
  fi
fi

echo "Setup complete: $PROJECT_DIR"
