# Twig Asset Version Extension

A simple twig extension for working with versioned assets

[![Build Status](https://travis-ci.org/railto/TwigAssetVersionExtension.svg?branch=master)](https://travis-ci.org/railto/TwigAssetVersionExtension)

## Installation

- Add to composer ```composer require railto/twigassetversionextension```

## Usage

- Add as an extension in twig making sure to pass in the path to the revision manifest file 
```php
$twig->addExtension(new Railto\TwigAssetVersionExtension(__DIR__. '/../public/rev-manifest.json'));
```
- In your twig template, use it as a filter
```twig
<link rel="stylesheet" href="{{ '/css/app.css' | asset_version }}">
```

## Testing

- Coding Standard: ```vendor/bin/phpcs```
- Unit Tests: ```vendor/bin/phpunit```