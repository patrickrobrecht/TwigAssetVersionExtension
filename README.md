# Twig Asset Version Extension

A simple twig extension for working with versioned assets

[![Build Status](https://travis-ci.org/railto/TwigAssetVersionExtension.svg?branch=master)](https://travis-ci.org/railto/TwigAssetVersionExtension)
[![License](https://poser.pugx.org/railto/twig-asset-version-extension/license)](https://packagist.org/packages/railto/twig-asset-version-extension)
[![Latest Stable Version](https://poser.pugx.org/railto/twig-asset-version-extension/v/stable)](https://packagist.org/packages/railto/twig-asset-version-extension)
[![Total Downloads](https://poser.pugx.org/railto/twig-asset-version-extension/downloads)](https://packagist.org/packages/railto/twig-asset-version-extension)
[![Monthly Downloads](https://poser.pugx.org/railto/twig-asset-version-extension/d/monthly)](https://packagist.org/packages/railto/twig-asset-version-extension)
[![Daily Downloads](https://poser.pugx.org/railto/twig-asset-version-extension/d/daily)](https://packagist.org/packages/railto/twig-asset-version-extension)

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
