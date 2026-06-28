# Adarsha-sb.com-Project (Monorepo)

এই রিপোজিটরিটি কয়েকটি বছরের (versions) প্রকল্প একসাথে রাখে। মূল উদ্দেশ্য — একই রিপোতে 2024/2025/2026 ইত্যাদি আলাদা-স্বতন্ত্র প্রকল্প হিসেবে রাখা, যাতে প্রতিটি আলাদাভাবে টেস্ট/বিল্ড/ডিপ্লয় করা যায় কিন্তু প্রয়োজন হলে একে অপরকে রেফার করা যায়।

Short summary (English):
- Monorepo containing multiple year-based projects.
- Each year folder is treated as a separate project root for CI/automation if it contains a manifest (composer.json, package.json or jules.yaml).

Stack
- Languages: PHP (CodeIgniter), JavaScript, HTML, Less/CSS
- Framework: CodeIgniter (PHP)

How this repository is organized
```
2026/            CodeIgniter-based project (project root)
archive/        archived year-folders
  2025/         archive for 2025 (project root can be here)
  2024/         archive for 2024 (project root can be here)
scripts/        helper scripts for subtree operations and bootstrapping
.github/         workflows for per-folder CI
README.md       (this file)
CODEOWNERS
```

Decisions and recommendations
- Treat each year folder as an independent project by adding a small project manifest (jules.yaml) to each project root.
- Use path-filtered GitHub Actions workflows so only the relevant workflow runs when a folder changes.
- Keep `archive/2024` and `archive/2025` where they are, or if you prefer make them top-level `2024/` and `2025/` (both approaches supported). Current workflows use the actual paths.
- If you need separate Git histories later, use the provided `scripts/split_subtree.sh` to split a folder's history into a branch and push to another remote.

How to run (examples)
- Install dependencies for a specific project (example for 2026):

```bash
cd 2026
composer install --no-interaction --no-progress
```

- Bootstrap all projects (provided script)

```bash
./scripts/bootstrap.sh
```

Subtree helpers
- To split `2026/` into a separate branch and push to an external repo: see `scripts/split_subtree.sh`.

Notes for jules.google.com
- Each project includes `jules.yaml` (project manifest). If jules requires a different manifest shape, update those files accordingly.

If you want, I can open a PR that adds these files as a single commit; or push directly to the default branch if you prefer. Let me know which workflow you prefer.
