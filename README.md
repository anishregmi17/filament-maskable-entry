<h1> Filament Maskable Entry </h1>

![maskable-entry](https://github.com/user-attachments/assets/79a3ca44-e33e-4ea8-a843-805f68ae519d)


<p align="center"><strong>A reusable maskable entry component for Filament Infolists.</strong></p>

A powerful Filament PHP infolist component that enables seamless maskable entry. Ideal for hiding and toggling sensitive values such as passwords, social security numbers, credit card numbers, and API keys.

---

## Features

* 🔒 **Maskable Display** — Hide sensitive data with custom mask patterns
* 👁️ **Toggle Visibility** — One click to reveal or hide the actual value
* 🎨 **Native Filament v4 Integration** — Works like any infolist entry
* ⚙️ **Fully Configurable** — Custom patterns, masking characters, closures
* 📱 **Responsive** — Works across all device sizes

---

## Requirements

* PHP 8.1+
* Laravel 10+
* Filament 4.x

---

## Installation

```bash
composer require anish/maskable-entry
```

The package auto-discovers its service provider—no manual setup required.

---

## Basic Usage

```php
use Anish\MaskableEntry\Components\MaskableEntry;
use Illuminate\Support\Facades\Auth;
use Filament\Schemas\Schema;

public static function configure(Schema $schema): Schema
{
    return $schema->components([
        MaskableEntry::make('social_security_number')
            ->maskValue('XXX-XX-XXXX')
            ->actualValue(fn ($record) => $record->social_security_number)
            ->toggleable(Auth::user()->can('view_social_security_number'))
            ->label('Social Security Number'),
    ]);
}
```

### Note:
If you are using a custom theme add the plugin's views to your theme css file or your app's css file.
```
@source '../../../../vendor/anish/maskable-entry/resources/views/**/*.blade.php
```

## Advanced Usage

### Custom Mask Pattern

```php
MaskableEntry::make('credit_card')
    ->maskValue('XXXX-XXXX-XXXX-XXXX')
    ->actualValue(fn ($record) => $record->credit_card_number)
    ->label('Credit Card Number');
```

### Using a Closure for Actual Value

```php
MaskableEntry::make('password')
    ->maskValue('XXXXXXXX')
    ->actualValue(fn (User $record) => $record->password)
    ->label('Password');
```

### Custom Masking Character

```php
MaskableEntry::make('api_key')
    ->maskValue('****-****-****-****')
    ->actualValue(fn ($record) => $record->api_key)
    ->maskingChar('*')
    ->label('API Key');
```

---

## Available Methods

### `maskValue(string $value)`

The pattern shown in masked mode.
Use `X` (or your custom char) to represent masked digits.

```php
->maskValue('XXX-XX-XXXX')
```

### `actualValue(string|Closure|null $value)`

Defines the value revealed on toggle.

```php
->actualValue(fn ($record) => $record->social_security_number)
// or
->actualValue('123-45-6789')
```

### `maskingChar(string $char)`

Changes the masking character. Default: `X`.

```php
->maskingChar('*')
```

### Supports All Standard `TextEntry` Methods

```php
MaskableEntry::make('field')
    ->maskValue('XXX-XX-XXXX')
    ->actualValue(fn ($record) => $record->value)
    ->label('Custom Label')
    ->placeholder('N/A')
    ->copyable()
    ->icon('heroicon-o-shield-check');
```

---

## How It Works

1. **Masked State** — Displays the mask pattern (`XXX-XX-XXXX`)
2. **Toggle Button** — Eye icon switches visibility
3. **Revealed State** — Shows the actual value formatted
4. **Formatting** — Automatically aligns characters to mask structure

---

## Testing

```bash
composer test
```

---

## Code Style

This package uses Laravel Pint:

```bash
composer format
```

---

## Contributing

Contributions are welcome!

### Development Setup

1. Clone the repo
2. `composer install`
3. Create a new branch
4. Write your feature
5. Run tests & Pint
6. Submit PR

---

## Security

If you find a security issue, please email:
**[anishregminaglibang@gmail.com](mailto:anishregminaglibang@gmail.com)**

---

## Changelog

See **[CHANGELOG](CHANGELOG.md)**.

---

## Credits

* [Anish Regmi](https://github.com/anishregmi17)
* All Contributors

---

## License

MIT
