# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.3] - 2026-10-22

### Security
- Match email domains exactly, ignoring case, when assigning profile types and roles, so an address only matches a mapping when its domain is identical. Thanks to Antonio Alonso-Stepanov for responsibly reporting this through HackerOne. ([#24](https://github.com/Automattic/buddypress-profile-type-assigner/pull/24))

### Maintenance
- Publish a GitHub Release with an installable ZIP whenever a version is tagged. ([#25](https://github.com/Automattic/buddypress-profile-type-assigner/pull/25))
- Add a security policy pointing to the HackerOne program. ([#22](https://github.com/Automattic/buddypress-profile-type-assigner/pull/22))
- Add CI for coding standards, linting and tests across supported WordPress and PHP versions, and a wp-env setup for local development. ([#8](https://github.com/Automattic/buddypress-profile-type-assigner/pull/8), [#9](https://github.com/Automattic/buddypress-profile-type-assigner/pull/9), [#10](https://github.com/Automattic/buddypress-profile-type-assigner/pull/10), [#12](https://github.com/Automattic/buddypress-profile-type-assigner/pull/12))
- Add agent guidance and move Dependabot reviewers to CODEOWNERS. ([#11](https://github.com/Automattic/buddypress-profile-type-assigner/pull/11), [#14](https://github.com/Automattic/buddypress-profile-type-assigner/pull/14))
- Update GitHub Actions. ([#13](https://github.com/Automattic/buddypress-profile-type-assigner/pull/13), [#15](https://github.com/Automattic/buddypress-profile-type-assigner/pull/15), [#16](https://github.com/Automattic/buddypress-profile-type-assigner/pull/16), [#19](https://github.com/Automattic/buddypress-profile-type-assigner/pull/19), [#20](https://github.com/Automattic/buddypress-profile-type-assigner/pull/20), [#23](https://github.com/Automattic/buddypress-profile-type-assigner/pull/23))

## [1.0.2] - 2025-05-05

### Fixed
- fix: Update class references in namespaced file by @GaryJones in https://github.com/Automattic/BuddyPress-Profile-Type-Assigner/pull/5

## [1.0.1] - 2025-05-05

### Fixed
- fix: Make hook use namespaces by @GaryJones in https://github.com/Automattic/BuddyPress-Profile-Type-Assigner/pull/2

## 1.0.0 - 2025-04-30

Initial release of BuddyPress Profile Type Assigner.

[1.0.3]: https://github.com/Automattic/buddypress-profile-type-assigner/compare/1.0.2...1.0.3
[1.0.2]: https://github.com/automattic/buddypress-profile-type-assigner/compare/1.0.1...1.0.2
[1.0.1]: https://github.com/automattic/buddypress-profile-type-assigner/compare/1.0.0...1.0.1
