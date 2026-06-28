# AGENTS.md

This repository is a folder-based monorepo with one active year and archived year snapshots.

## Layout

- `2026/` — active application code and current work.
- `archive/2025/` — archived snapshot for 2025.
- `archive/2024/` — archived snapshot for 2024.

## How to work in this repo

- Prefer path-scoped changes. Do not modify unrelated year folders unless the task explicitly requires it.
- Keep archive folders stable unless you are fixing documentation or restoring historical accuracy.
- Use the setup helper scripts in `scripts/` before asking Jules to make changes.
- Keep secrets out of the repository. Use GitHub Secrets or local `.env` files that are not committed.

## Suggested setup commands

- Active project: `./scripts/setup-project.sh 2026`
- Archived snapshot checks:
  - `./scripts/setup-project.sh archive/2024`
  - `./scripts/setup-project.sh archive/2025`

## Expected behavior for agents

- Treat each year folder as an independent work surface.
- Use the relevant folder README before editing code.
- If a task mentions a previous year, inspect the corresponding archive folder first.
