# Get Suzuki Bikes Names 🏍️

## Installation

```bash
composer install adelktr/open-source-td3
```

## Local Development

```bash
composer install
```

```bash
php vendor/bin/phpstan analyse src --level=max
```

## What is it ?

For the moment you can have 2 types of lists, the first is the list of all the motorcycles present on the site https://moto.suzuki.fr/, and the second is the list of all the motorcycles of the available site for bridle for The A2 license.

All bikes

```php
$allBikes = Adelktr\OpenSourceTd3\Scrap()->fetchAllBikes()
```

---

A2 bikes = `fetchAllA2Bikes()`

```php
$allBikes = Adelktr\OpenSourceTd3\Scrap()->fetchAllA2Bikes()
```
