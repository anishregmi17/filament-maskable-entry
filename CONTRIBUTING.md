# Contributing to Filament Maskable Entry

Thank you for considering contributing to Filament Maskable Entry! We appreciate your interest in making this package better.

## Code of Conduct

Please be respectful and constructive in all interactions. We want to maintain a welcoming environment for everyone.

## How Can I Contribute?

### Reporting Bugs

If you find a bug, please open an issue on GitHub with:

- A clear, descriptive title
- Steps to reproduce the issue
- Expected behavior
- Actual behavior
- Your environment (PHP version, Laravel version, Filament version)
- Any relevant code samples or error messages

### Suggesting Enhancements

We welcome suggestions for new features or improvements! Please open an issue describing:

- The use case for the enhancement
- How it would benefit users
- Any implementation ideas you have

### Pull Requests

1. **Fork the repository** and create your branch from `main`
2. **Install dependencies**: `composer install`
3. **Make your changes** following our coding standards
4. **Add tests** if applicable
5. **Run quality checks**:
   ```bash
   composer format      # Format code with Pint
   composer analyse     # Run static analysis
   composer test        # Run tests
   ```
6. **Commit your changes** with clear, descriptive messages
7. **Push to your fork** and submit a pull request

## Development Setup

```bash
# Clone your fork
git clone https://github.com/YOUR-USERNAME/filament-maskable-entry.git
cd filament-maskable-entry

# Install dependencies
composer install

# Run tests
composer test

# Format code
composer format

# Run static analysis
composer analyse
```

## Coding Standards

- Follow **PSR-12** coding standards
- Use **Laravel Pint** for code formatting (`composer format`)
- Add **PHPDoc comments** for all public methods
- Write **clear, descriptive variable and method names**
- Keep methods **focused and single-purpose**

## Testing

- Add tests for new features
- Ensure all tests pass before submitting PR
- Aim for good test coverage of critical functionality

## Documentation

- Update README.md if you add new features
- Add PHPDoc comments to new methods
- Update CHANGELOG.md following Keep a Changelog format

## Commit Messages

- Use the present tense ("Add feature" not "Added feature")
- Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
- Reference issues and pull requests when relevant
- Keep the first line under 72 characters

## Questions?

Feel free to open an issue if you have questions about contributing!

## License

By contributing, you agree that your contributions will be licensed under the MIT License.
