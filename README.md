![Filament Maskable-Entry](https://raw.githubusercontent.com/anishregminaglibang/maskable-entry/main/art/maskable-entry.png)

# Filament Maskable-Entry

A powerful Filament PHP infolist component that enables seamless maskable entry. Features include maskable entry, preview functionality, and easy integration with Laravel. Perfect for displaying sensitive data like passwords, social security numbers, and credit card numbers in Filament infolists.

## Features

-   🔒 **Maskable Display**: Hide sensitive values with customizable mask patterns
-   👁️ **Toggle Visibility**: Click to reveal/hide the actual value
-   🎨 **Filament Integration**: Seamlessly integrates with Filament v4 infolists
-   ⚙️ **Flexible Configuration**: Customize mask patterns and masking characters
-   📱 **Responsive**: Works perfectly on all screen sizes

## Requirements

-   PHP 8.1 or higher
-   Laravel 10.0 or higher
-   Filament 4.0 or higher

## Installation

You can install the package via Composer:

composer require anish/maskable-entryThe package will automatically register its service provider using Laravel's package auto-discovery.

## Usage

### Basic Usage

Use `MaskableEntry` in your Filament infolist schemas just like any other entry component:

use Anish\MaskableEntry\Components\MaskableEntry;
use Filament\Schemas\Schema;

public static function configure(Schema $schema): Schema
{
    return $schema
        ->components([
            MaskableEntry::make('social_security_number')
                ->maskValue('XXX-XX-XXXX')
                ->actualValue(fn ($record) => $record->social_security_number)
->label('Social Security Number'),
]);
}### Advanced Usage

#### With Custom Mask Pattern

hp
MaskableEntry::make('credit_card')
->maskValue('XXXX-XXXX-XXXX-XXXX')
->actualValue(fn ($record) => $record->credit_card_number)
->label('Credit Card Number')#### With Closure for Actual Value
p
MaskableEntry::make('password')
->maskValue('XXXXXXXX')
->actualValue(fn (User $record) => $record->password)
->label('Password')#### With Custom Masking Character

MaskableEntry::make('api_key')
->maskValue('\***\*-\*\***-\***\*-\*\***')
->actualValue(fn ($record) => $record->api_key)
->maskingChar('\*')
->label('API Key')### Available Methods

#### `maskValue(string $value)`

Sets the mask pattern to display when the value is hidden. Use `X` (or your custom masking character) to represent digits that should be masked.

->maskValue('XXX-XX-XXXX')#### `actualValue(string|Closure|null $value)`

Sets the actual value to display when revealed. Can be a string or a Closure that receives the record.

->actualValue(fn ($record) => $record->social_security_number)
// or
->actualValue('123-45-6789')#### `maskingChar(string $char)`

Sets the character used in the mask pattern. Defaults to `X`.

->maskingChar('\*')#### Standard TextEntry Methods

Since `MaskableEntry` extends Filament's `TextEntry`, you can use all standard methods:
p
MaskableEntry::make('field')
->maskValue('XXX-XX-XXXX')
->actualValue(fn ($record) => $record->value)
->label('Custom Label')
->placeholder('N/A')
->copyable()
->icon('heroicon-o-shield-check')## How It Works

1. **Masked State**: By default, the component displays the mask pattern (e.g., `XXX-XX-XXXX`)
2. **Toggle Button**: An eye icon allows users to toggle between masked and revealed states
3. **Revealed State**: When clicked, the actual formatted value is displayed (e.g., `123-45-6789`)
4. **Formatting**: The component automatically formats the actual value according to the mask pattern

## Examples

### Social Security Number

MaskableEntry::make('ssn')
->maskValue('XXX-XX-XXXX')
->actualValue(fn ($record) => $record->ssn)
    ->label('Social Security Number')### Credit Card Number
hp
MaskableEntry::make('credit_card')
    ->maskValue('XXXX-XXXX-XXXX-XXXX')
    ->actualValue(fn ($record) => $record->credit_card)
->label('Credit Card')### Phone Number

MaskableEntry::make('phone')
->maskValue('(XXX) XXX-XXXX')
->actualValue(fn ($record) => $record->phone)
    ->label('Phone Number')### Password
p
MaskableEntry::make('password')
    ->maskValue('XXXXXXXX')
    ->actualValue(fn ($record) => $record->password)
->label('Password')## Configuration

The package uses Laravel's auto-discovery, so no additional configuration is required. The service provider is automatically registered.

## Testing

composer test## Code Style

The package uses Laravel Pint for code formatting:

composer format## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

### Development Setup

1. Fork the repository
2. Clone your fork: `git clone https://github.com/your-username/maskable-entry.git`
3. Install dependencies: `composer install`
4. Create a new branch: `git checkout -b feature/your-feature-name`
5. Make your changes
6. Run tests: `composer test`
7. Format code: `composer format`
8. Commit your changes: `git commit -m "Add your feature"`
9. Push to the branch: `git push origin feature/your-feature-name`
10. Open a Pull Request

### Code Style

Please ensure your code follows the [Laravel coding standards](https://laravel.com/docs/contributions#coding-style) and passes all tests.

## Security

If you discover any security-related issues, please email anishregminaglibang@gmail.com instead of using the issue tracker.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

-   [Anish Regmi](https://github.com/anishregminaglibang)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Support

If you find this package useful, please consider:

-   ⭐ Starring the repository
-   🐛 Reporting bugs
-   💡 Suggesting new features
-   🤝 Contributing code
-   ☕ [Buying me a coffee](https://github.com/sponsors/anishregminaglibang/)

---

Made with ❤️ by [Anish Regmi](https://github.com/anishregminaglibang)
