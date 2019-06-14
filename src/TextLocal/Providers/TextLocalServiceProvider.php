<?php

namespace TextLocal\Providers;
use Illuminate\Support\ServiceProvider;


class TextLocalServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config' => base_path('config'),
        ]);
    }

    public function register()
    {

    }
}