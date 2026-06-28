# Adarsha SB monorepo — corrected layout

This bundle is the corrected version of the earlier suggestions.

## What changed

- `AGENTS.md` is the primary Jules context file.
- Per-year separation is handled by folder boundaries plus path-filtered GitHub Actions.
- `jules.yaml` is intentionally omitted because the official Jules docs I checked explicitly document `AGENTS.md`, repo selection, and optional setup scripts, but not a required `jules.yaml` schema.
- `scripts/` contains reusable setup helpers and optional subtree helpers.
- `archive/2024` and `archive/2025` remain separate folders inside `archive/`, while `2026/` stays active.

## Recommended operating model

- `2026/` is the active project.
- `archive/2024/` and `archive/2025/` are read-only snapshots unless you intentionally update them.
- Jules should be pointed at the repo root and guided through `AGENTS.md`.
- GitHub Actions should only run the workflow for the folder that changed.

## Usage

1. Copy these files into the repo.
2. Commit them on a branch.
3. Open a PR.
4. In Jules, select the repository and branch, then give a task prompt.
