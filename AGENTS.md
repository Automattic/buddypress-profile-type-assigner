# BuddyPress Profile Type Assigner

Assigns BuddyPress profile types based on email domain.

## Project Knowledge

| Property | Value |
|----------|-------|
| **Main file** | `buddypress-profile-type-assigner.php` |
| **Text domain** | `buddypress-profile-type-assigner` |
| **Namespace** | `Automattic\BuddyPressProfileTypeAssigner` (tests only) |
| **Source directory** | Root level (single-file plugin) |
| **Version** | 1.0.3 |
| **Requires PHP** | 8.2+ |

### Directory Structure

```
buddypress-profile-type-assigner/
├── tests/
│   ├── Unit/               # Unit tests
│   └── Integration/        # Integration tests (wp-env)
├── languages/              # Translation files
├── .github/workflows/      # CI: cs-lint, integration
└── .phpcs.xml.dist         # PHPCS configuration
```

### Dependencies

- **Runtime**: BuddyPress (required — plugin does nothing without it)
- **Dev**: `automattic/vipwpcs`, `yoast/wp-test-utils`

## Commands

```bash
composer cs                # Check code standards (PHPCS)
composer cs-fix            # Auto-fix code standard violations
composer lint              # PHP syntax lint
composer test:unit         # Run unit tests
composer test:integration  # Run integration tests (requires wp-env)
composer test:integration-ms  # Run multisite integration tests
composer coverage          # Run tests with HTML coverage report
```

## Conventions

- **Commits**: Every commit must be signed; `develop` and `main` reject unsigned commits. Use a [Conventional Commits](https://www.conventionalcommits.org/) prefix (`fix:`, `feat:`, `test:`, `docs:`, `ci:`, `chore:` and so on) with an imperative subject of about 50 characters, and a body that explains why the change was needed rather than what changed. One concern per commit.
- **PRs**: Open against `develop`. The title describes the outcome in sentence case, without a conventional commit prefix. The description explains the problem first, then how the PR solves it. PRs land as merge commits, not squashed, so every commit message reaches `develop` as written.
- **Testing**: Write integration tests for WordPress-dependent behavior, unit tests for isolated logic. Extend `tests/Integration/TestCase.php` (`Yoast\WPTestUtils\WPIntegration\TestCase`) for integration tests and `tests/Unit/TestCase.php` (`Yoast\WPTestUtils\BrainMonkey\TestCase`) for unit tests.
- **Code style**: WordPress coding standards via PHPCS. Tabs for indentation.
- **i18n**: All user-facing strings must use the `buddypress-profile-type-assigner` text domain.

## Architectural Decisions

- **Single-file plugin**: All plugin logic lives in the main PHP file at the root. This is intentional given the plugin's small scope — do not split into multiple classes unless complexity genuinely warrants it.
- **Email domain matching**: The core logic matches user email domains to BuddyPress profile types. Changes to matching logic should be careful not to break existing assignments.
- **BuddyPress dependency**: Assumes BuddyPress is active. No fallback behaviour without it.

## Common Pitfalls

- Do not edit WordPress core files or BuddyPress core files.
- This plugin depends on BuddyPress — test environments must have BuddyPress installed and active.
- Run `composer cs` before committing. CI will reject code standard violations.
- Integration tests require `npx wp-env start` running first.
- Be careful with email domain matching logic — changes could inadvertently reassign profile types for existing users.
- Do not add complex class hierarchies to a single-file plugin. If the plugin grows significantly, propose a restructure rather than bolting on classes.
