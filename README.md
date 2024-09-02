<p align="center">
<img src="docs/code-example.png" width="600" alt="Code Example">
<img src="docs/output-example.png" width="800" alt="Code Example">
</p>


# Laravel Console Log

[![Latest Version on Packagist](https://img.shields.io/packagist/v/furqat/laravel-console-log.svg?style=flat-square)](https://packagist.org/packages/furqat/laravel-console-log)
[![Total Downloads](https://img.shields.io/packagist/dt/furqat/laravel-console-log.svg?style=flat-square)](https://packagist.org/packages/furqat/laravel-console-log)

## Installation

You can install the package via composer:

```bash
composer require furqat/laravel-console-log
```

## Usage

```php
class HomeController extends Controller
{
    public function index()
    {

        $users = User::all();
        
        //it will show the count of users in the console of browser
        console()->info('The count of users is: ' . $users->count());

        return view('users', compact($users));
    }
}
```

## How It Works

When you call console()->log(...$args) in your Laravel application, the package stores the logged messages and values in the cache. This allows the logs to be easily accessed and managed without cluttering the terminal or log files.

To view these logs, simply open any view in your browser. The package streams the cached logs to the frontend in real-time and show logs in browser's console using console.log(), providing a clear and organized view of all your log entries. This makes it easy for developers to monitor and debug their applications without interrupting their workflow.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Furqatbek Mashrabjonov](https://github.com/FurqatMashrabjonov)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
