#!/usr/bin/env bash
set -euo pipefail

if [ $# -lt 2 ]; then
  echo "Usage: $0 <prefix-dir> <remote-url> [remote-branch]"
  echo "Example: $0 archive/2024 git@github.com:org/repo.git main"
  exit 1
fi

PREFIX="$1"
REMOTE_URL="$2"
REMOTE_BRANCH="${3:-main}"

git subtree pull --prefix="$PREFIX" "$REMOTE_URL" "$REMOTE_BRANCH" --squash
