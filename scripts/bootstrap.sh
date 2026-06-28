#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
PROJECTS=(
  "2026"
  "archive/2024"
  "archive/2025"
)

for project in "${PROJECTS[@]}"; do
  if [ -d "$ROOT/$project" ]; then
    "$ROOT/scripts/setup-project.sh" "$ROOT/$project"
  fi
done

echo "All project setups finished."
