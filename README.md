# A Laravel client for the Windy API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bvrignaud/windy-api.svg?style=flat-square)](https://packagist.org/packages/bvrignaud/windy-api)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/bvrignaud/windy-api/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/bvrignaud/windy-api/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/bvrignaud/windy-api/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/bvrignaud/windy-api/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/bvrignaud/windy-api.svg?style=flat-square)](https://packagist.org/packages/bvrignaud/windy-api)

This package provides a Laravel client for the Windy API (https://api.windy.com/).

## Installation

Install the package via composer:

```bash
composer require bvrignaud/windy-api
```

You must add the `WINDY_API_KEY` environment variable to your `.env` file.`
```dotenv
WINDY_API_KEY=
```

You can publish the config file with:
```bash
php artisan vendor:publish --tag="windy-api-config"
```

This is the contents of the published config file:
```php
return [
    'key' => env('WINDY_API_KEY'),
];
```

## Usage

```php
$windy = new WindyApi\Webcams();

$webcams = $windy->getWebcams(new WindyApi\Requests\WebcamsRequest(
    lang: 'fr',
    nearby: new WindyApi\Requests\NearbyRequest(46.48848, -1.79662, 10),
    include: [
        WindyApi\Enums\IncludeEnum::categories,
        WindyApi\Enums\IncludeEnum::images,
        WindyApi\Enums\IncludeEnum::player,
        WindyApi\Enums\IncludeEnum::urls,
    ]
));

$webcam = $windy->getWebcamById(
    1481061744,
    new WindyApi\Requests\WebcamRequest(
        include: [
            WindyApi\Enums\IncludeEnum::categories,
            WindyApi\Enums\IncludeEnum::images,
            WindyApi\Enums\IncludeEnum::player,
            WindyApi\Enums\IncludeEnum::urls,
        ]
    )
);
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

- [Benoit VRIGNAUD](https://github.com/bvrignaud)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
