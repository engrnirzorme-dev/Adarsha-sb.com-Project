# Monorepo decision note

## Final design

Use a single repository with folder-level isolation.

### Why this is better than the earlier `jules.yaml` idea

The official Jules docs I checked explicitly say Jules:

- looks for `AGENTS.md` in the root of the repository,
- uses the repo selector and branch selection to scope work,
- runs tasks in a short-lived VM that clones the repo, installs dependencies, and runs tests,
- can use `AGENTS.md` or `README.md` as setup hints,
- and supports an optional setup script for more complex environments.

That makes `AGENTS.md` + setup scripts the correct primary mechanism for repo guidance.

### Practical consequence

- Do not rely on a custom per-year manifest unless you later confirm a Jules-specific schema.
- Use folder boundaries, README files, setup scripts, and path-filtered GitHub Actions instead.
- Keep any history-splitting behavior optional and separate from day-to-day development.
