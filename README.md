#### wildbit/laravel-postmark-provider Overview:

This package provides a very simple path to adding Postmark mail support in Laravel 5+

Integrating Postmark is incredibly easy:

##### 1. Install this package in your Laravel Project:

```bash
composer require wildbit/laravel-postmark-provider
```

##### 2. Define your server token in your `.env` file:
```
POSTMARK_TOKEN=<YOUR_SERVER_TOKEN>
```

##### 3. Add Postmark to your `config/services.php` file (it will use the token in your `.env` from Step 2):

```php
'postmark' => env('POSTMARK_TOKEN'),
```

##### 4. Update your application's MailProvider in your `config/app.php` file:

Find this line: 
```php
'Illuminate\Mail\MailServiceProvider',
``` 
And **replace** it with: 
```php
'Postmark\Adapters\LaravelMailProvider',
```

That's it! You've integrated Postmark into your Laravel Application.
