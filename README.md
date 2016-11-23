# Laravel Resources Loader.

This package has been developed by H&H|Digital, an Australian botique developer. Visit us at [hnh.digital](http://hnh.digital).

[![Latest Stable Version](https://poser.pugx.org/bluora/laravel-resources-loader/v/stable.svg)](https://packagist.org/packages/bluora/laravel-resources-loader) [![Total Downloads](https://poser.pugx.org/bluora/laravel-resources-loader/downloads.svg)](https://packagist.org/packages/bluora/laravel-resources-loader) [![Latest Unstable Version](https://poser.pugx.org/bluora/laravel-resources-loader/v/unstable.svg)](https://packagist.org/packages/bluora/laravel-resources-loader) [![License](https://poser.pugx.org/bluora/laravel-resources-loader/license.svg)](https://packagist.org/packages/bluora/laravel-resources-loader)

[![Build Status](https://travis-ci.org/bluora/laravel-resources-loader.svg?branch=master)](https://travis-ci.org/bluora/laravel-resources-loader) [![StyleCI](https://styleci.io/repos/53318243/shield?branch=master)](https://styleci.io/repos/53318243) [![Test Coverage](https://codeclimate.com/github/bluora/laravel-resources-loader/badges/coverage.svg)](https://codeclimate.com/github/bluora/laravel-resources-loader/coverage) [![Issue Count](https://codeclimate.com/github/bluora/laravel-resources-loader/badges/issue_count.svg)](https://codeclimate.com/github/bluora/laravel-resources-loader) [![Code Climate](https://codeclimate.com/github/bluora/laravel-resources-loader/badges/gpa.svg)](https://codeclimate.com/github/bluora/laravel-resources-loader) 

Provides a simplified approach to loading internal and external assets in Laravel.

## Install

Via composer:

`$ composer require-dev bluora/laravel-resources-loader dev-master`

Enable the service provider by editing config/app.php:

```php
    'providers' => [
        ...
        Bluora\LaravelResourcesLoader\ServiceProvider::class,
        ...
    ];
```

Enable the facade by editing config/app.php:

```php
    'aliases' => [
        ...
        'Resource' => Bluora\LaravelResourcesLoader\Facade::class,
        ...
    ];
```

## Usage



## Contributing

Please see [CONTRIBUTING](https://github.com/bluora/laravel-resources-loader/blob/master/CONTRIBUTING.md) for details.

## Credits

* [Rocco Howard](https://github.com/therocis)
* [All Contributors](https://github.com/bluora/laravel-resources-loader/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/bluora/laravel-resources-loader/blob/master/LICENSE) for more information.
