# Laravel Model Validable

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Pre Release Version on Packagist][ico-pre-release]][link-packagist]
[![Latest Unstable Version][ico-unstable]][link-packagist]
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)

Gives the models the ability to be validated before saved.

## About

Gives the models the ability to auto-validate them selves.

This module is not for business logic, but to protect the data in the database.

In use with the triun\laravel-model-base generator, the skeleton modifier of this package will generate the rules automatically, based on the table scheme.

## Installation

Require this package with composer using the following command:

```bash
composer require triun/laravel-model-validable:dev-master
```

### Development only installation

DO NOT install in development mode in composer if you are using the contract interface or the trait

To install this package on only development systems, add the `--dev` flag to your composer command:

```bash
composer require --dev triun/laravel-model-validable:dev-master
```

## Skeleton Modifiers

If you want to add the skeleton modifiers to the model base generator, you can do so adding the modifiers in the `config/model-base.php` file:

```php
    'modifiers' => [
        \Triun\ModelValidable\Modifiers\ModelValidableModifier::class,
        \Triun\ModelValidable\Modifiers\RulesModifier::class,
    ],
```

## Usage

TODO

## Issues
   
Bug reports and feature requests can be submitted on the [Github Issue Tracker](https://github.com/Triun/laravel-model-validable/issues).

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) for information.

## License

The Laravel Model Base is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


[ico-version]: https://img.shields.io/packagist/v/triun/laravel-model-validable.svg
[ico-pre-release]: https://img.shields.io/packagist/vpre/triun/laravel-model-validable.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://travis-ci.org/Triun/laravel-model-validable.svg?branch=master
[ico-code-quality]: https://img.shields.io/scrutinizer/g/triun/laravel-model-validable.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/triun/laravel-model-validable.svg?style=flat-square
[ico-unstable]: https://poser.pugx.org/triun/laravel-model-validable/v/unstable

[link-packagist]: https://packagist.org/packages/triun/laravel-model-validable
[link-travis]: https://travis-ci.org/Triun/laravel-model-validable
[link-downloads]: https://packagist.org/packages/triun/laravel-model-validable
[link-author]: https://github.com/triun