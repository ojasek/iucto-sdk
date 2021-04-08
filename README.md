# iucto-sdk

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

SDK knihovna pro práci s iÚčto API https://online.iucto.cz/api

## Install

Via Composer

``` bash
$ composer require ojasek/iucto-sdk
```

## Usage

``` php
$iUcto = new \Ojasek\IuctoSdk\IUctoApi("APIKEY");
$customer = $iUcto->customers->detail(12);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email jasek@fixitsoft.cz instead of using the issue tracker.

## Credits

- [Ondřej Jašek][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ojasek/iucto-sdk.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ojasek/iucto-sdk/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/ojasek/iucto-sdk.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/ojasek/iucto-sdk.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ojasek/iucto-sdk.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ojasek/iucto-sdk
[link-travis]: https://travis-ci.org/ojasek/iucto-sdk
[link-scrutinizer]: https://scrutinizer-ci.com/g/ojasek/iucto-sdk/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/ojasek/iucto-sdk
[link-downloads]: https://packagist.org/packages/ojasek/iucto-sdk
[link-author]: https://github.com/ojasek
[link-contributors]: ../../contributors
