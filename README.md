# Laravel Speedy API Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gdinko/speedy.svg?style=flat-square)](https://packagist.org/packages/gdinko/speedy)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/gdinko/speedy/run-tests?label=tests)](https://github.com/gdinko/speedy/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/gdinko/speedy/Check%20&%20fix%20styling?label=code%20style)](https://github.com/gdinko/speedy/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/gdinko/speedy.svg?style=flat-square)](https://packagist.org/packages/gdinko/speedy)
[![Test Coverage](https://raw.githubusercontent.com/gdinko/speedy/master/badge-coverage.svg)](https://packagist.org/packages/gdinko/speedy)


[Speedy JSON API Documentation](https://services.speedy.bg/api/api_examples.html)

## Installation

You can install the package via composer:

```bash
composer require gdinko/speedy
```

If you plan to use database for storing nomenclatures:

```bash
php artisan migrate
```

If you need to export configuration file:

```bash
php artisan vendor:publish --provider="gdinko\speedy\SpeedyServiceProvider" --tag=config
```

## Configuration

```bash

```

## Usage

Runtime Setup
```php
//
```

Methods
```php
//
```

Commands

```bash
#get speedy api status
php artisan speedy:api-status
```

Models
```php
//
```

## Examples


### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dinko359@gmail.com instead of using the issue tracker.

## Credits

-   [Dinko Georgiev](https://github.com/gdinko)
-   [silabg.com](https://www.silabg.com/) :heart:
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.