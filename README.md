#### wildbit/laravel-postmark-provider Overview:

This package provides a very simple path to adding Postmark mail support in Laravel 5+

Integrating Postmark is incredibly easy:

##### 1. Install this package in your Laravel Project:

```bash
composer require wildbit/laravel-postmark-provider
```

##### 2. Add your server token to your `config/services.php` file:

```php
'postmark' => '<YOUR_SERVER_TOKEN>',
```

##### 3. Update your application's MailProvider in your `config/app.php` file:

Find this line: 
```php
'Illuminate\Mail\MailServiceProvider',
``` 
And **replace** it with: 
```php
'Postmark\Adapters\LaravelMailProvider',
```

That's it! You've integrated Postmark into your Laravel Application.
