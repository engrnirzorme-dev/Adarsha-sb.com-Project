#!/usr/bin/env bash
set -euo pipefail

if [ $# -lt 2 ]; then
  echo "Usage: $0 <prefix-dir> <remote-url> [remote-branch]"
  echo "Example: $0 archive/2026 git@github.com:org/repo.git main"
  exit 1
fi

PREFIX="$1"
REMOTE_URL="$2"
REMOTE_BRANCH="${3:-main}"
SAFE_NAME="${PREFIX//\//-}"
BRANCH="split-${SAFE_NAME}"

git fetch origin

git subtree split --prefix="$PREFIX" -b "$BRANCH"

if git remote get-url tmpremote >/dev/null 2>&1; then
  git remote set-url tmpremote "$REMOTE_URL"
else
  git remote add tmpremote "$REMOTE_URL"
fi

git push tmpremote "$BRANCH:$REMOTE_BRANCH"

echo "Split branch pushed: $BRANCH -> $REMOTE_BRANCH"
