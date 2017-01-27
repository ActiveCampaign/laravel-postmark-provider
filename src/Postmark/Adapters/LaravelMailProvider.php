<?php namespace Postmark\Adapters;

use Illuminate\Mail\MailServiceProvider;
use Postmark\Transport;

class LaravelMailProvider extends MailServiceProvider
{
    /**
     * Register the Swift Transport instance.
     *
     * @return void
     */
    protected function registerSwiftTransport()
    {
        parent::registerSwiftTransport();

        $this->app['swift.transport']->extend('postmark', function () {
            $token = $this->app['config']->get('services.postmark');

            return new Transport($token);
        });
    }
}
