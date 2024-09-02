<p align="center">
<img src="docs/code-example.png" alt="Code Example">
<img src="docs/output-example.png" alt="Code Example">
</p>


# Laravel Console Log

[![Latest Version on Packagist](https://img.shields.io/packagist/v/furqat/laravel-console-log.svg?style=flat-square)](https://packagist.org/packages/furqat/laravel-console-log)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/furqat/laravel-console-log/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/furqat/laravel-console-log/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/furqat/laravel-console-log/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/furqat/laravel-console-log/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/furqat/laravel-console-log.svg?style=flat-square)](https://packagist.org/packages/furqat/laravel-console-log)

## Installation

You can install the package via composer:

```bash
composer require furqat/laravel-console-log
```


You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-console-log-config"
```

## Usage

```php
console()->log('Your message');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Furqatbek Mashrabjonov](https://github.com/FurqatMashrabjonov)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
