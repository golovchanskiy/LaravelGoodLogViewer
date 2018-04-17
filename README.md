# LaravelGoodLogViewer [![For Laravel 5][badge-laravel]][link]

Log Reader|Parser|Viewer for Laravel 5

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

#### Supported localizations

| Local   | Language              |
|---------|-----------------------|
| `ru`    | Russian               |

[badge-laravel]: https://img.shields.io/badge/Laravel-5.x-orange.svg?style=flat-square

[link]: https://github.com/golovchanskiy/LaravelGoodLogViewer
