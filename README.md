## Installation

You can install the package via composer:
```bash
composer require wainwright/casino-dog
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="casino-dog-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="casino-dog-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="casino-dog-views"
```

## Usage

```php
$casinoDog = new Wainwright\CasinoDog();
echo $casinoDog->echoPhrase('Hello, Wainwright!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/ryandro/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ryanwest](https://github.com/ryandro)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
