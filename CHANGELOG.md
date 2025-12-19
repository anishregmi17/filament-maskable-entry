# Changelog

All notable changes to `maskable-entry` will be documented in this file.

## [Unreleased]

### Added
- Configuration file support for global defaults
- `emptyStateText()` method to customize placeholder text for empty values
- `showIcon()` and `hideIcon()` methods for custom toggle icons
- Comprehensive PHPDoc comments for all public methods
- Support for non-digit characters in mask patterns (improved regex)
- ARIA labels and keyboard navigation support for better accessibility
- Focus ring styling for better keyboard navigation
- Dark mode support with proper color contrast
- GitHub Actions CI workflow for automated quality checks
- Laravel Pint configuration for consistent code style
- PHPStan configuration for static analysis
- PHPUnit configuration for testing
- CONTRIBUTING.md guide for contributors
- SECURITY.md policy for security vulnerability reporting
- .editorconfig for consistent coding style across editors
- Troubleshooting section in README
- Configuration publishing documentation

### Changed
- Improved button hover colors (fixed invalid `text-black-100` class)
- Enhanced trait with better documentation and organization
- Updated README with more comprehensive documentation
- Fixed CSS import directive typo in README (from `@source` to `@import`)
- Improved regex pattern matching to support any character type
- Added transition effects for better UX

### Fixed
- Invalid color class in toggle button
- Missing accessibility attributes
- Regex pattern only supporting digits

## [1.0.0] - 2024-12-19

### Added
- Initial stable release
- 🔒 Maskable Display — Hide sensitive data with custom mask patterns
- 👁️ Toggle Visibility — One click to reveal or hide the actual value
- 🎨 Native Filament v4 Integration — Works like any infolist entry
- ⚙️ Fully Configurable — Custom patterns, masking characters, closures
- 📱 Responsive — Works across all device sizes

