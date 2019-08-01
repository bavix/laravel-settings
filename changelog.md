# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2019-08-01
### Added
- `HasSettings` - Contains attitude and nothing more. Simple and easy.
- `HasSetSettings` - The trait for quick settings recording is needed to reduce the amount of your code.
- `HasGetSettings` - Trait for quickly getting settings by type.
- `ReadableService` - Service for reading settings from the model. Needed for quick inheritance, makes the code cleaner and more readable.
- `WritableService` - Service record settings for the model.
- `SettingService` - Working with the settings model.
- Unit-cases. 

[Unreleased]: https://github.com/bavix/laravel-settings/compare/1.0.0...HEAD
[1.0.0]: https://github.com/bavix/laravel-settings/compare/2f0bfa32acbbb5912ffa2e5dcaa7cf2f845f620b...1.0.0
