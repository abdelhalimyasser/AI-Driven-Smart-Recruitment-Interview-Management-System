# Contributing to the Recruitment Management System

First off, thank you for considering contributing to this project! 

## Branch Naming Conventions
Please do not push directly to the `main` branch. Create a new branch for your work:
* **Features:** `feature/your-feature-name` (e.g., `feature/dynamic-scoring-engine`)
* **Bug Fixes:** `bugfix/issue-name` (e.g., `bugfix/candidate-login-error`)

## Commit Message Guidelines
We use Conventional Commits. Please prefix your commits with one of the following:
* `feat:` A new feature
* `fix:` A bug fix
* `docs:` Documentation only changes
* `refactor:` A code change that neither fixes a bug nor adds a feature
* `style:` Changes that do not affect the meaning of the code (white-space, formatting, etc.)

## Development Standards
1. **Language:** PHP 8.1 or higher.
2. **Architecture:** Strict MVC + Service Layer. Business logic MUST go into `src/services`, not controllers.
3. **Typing:** Strict typing is mandatory. Always define return types and argument types.
