# GoodLogViewer [![For Laravel 5][badge_laravel]]

Log Reader|Parser|Viewer for Laravel 5

## Supported localizations

| Local   | Language              |
|---------|-----------------------|
| `ru`    | Russian               |

## Install

Install via composer:
```
composer require golovchanskiy/laravel-good-log-viewer
```

Add Service Provider to `config/app.php` in `providers` section:
```php
Golovchanskiy\LaravelGoodLogViewer\GoodLogViewerServiceProvider::class,
```

Go to `http://{YOUR_APPLICATION}/logs` and watch you log files.
