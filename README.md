### Sunset Notice:

The Laravel Postmark Provider is no longer being actively updated. The following is a [short discussion on the reasoning for discontinuing the provider](https://github.com/wildbit/laravel-postmark-provider/issues/4#issuecomment-238529465). _However_, **it's still really easy to still use Postmark in Laravel using SMTP**, and since the SMTP provider is part of Laravel, it'll keep working when you update Laravel and you won't need to install any dependencies to use it.

Here's everything you'll need:

#### Update your `config/mail.php` file to include the following:

```
<?php
return [
    
    'username' => env('<YOUR_POSTMARK_SERVER_TOKEN>'),
    'password' => env('<YOUR_POSTMARK_SERVER_TOKEN>'),
    
    'host' => env('MAIL_HOST', 'smtp.postmarkapp.com'),
    
    // Optionally, set "smtp" to "log" if you want to trap emails during testing.
    'driver' => env('MAIL_DRIVER', 'smtp'), 
    
    'port' => env('MAIL_PORT', 587),
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    
    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    | It is also OK to not set this from address here and specify it on each message.
    |
    | Remember, when using Postmark, the sending address must be a valid 
    | Sender Signature that you have already configured.
    */
    'from' => ['address' => null, 'name' => null],
];
```

### Advanced Integrations:

We provide an [official PHP library](https://github.com/wildbit/postmark-php) that can be installed via composer to do more advanced Postmark integrations. If you want to move beyond basic email sending, Postmark-PHP will give you easy access to all Postmark API endpoints.

### Keep using this provider anyway:

The Postmark Laravel Provider was built and will work with versions of Laravel up to 5.2, if you'd still like to use it, please feel free to follow the instructions below.

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
