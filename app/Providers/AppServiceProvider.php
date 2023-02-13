<?php

namespace App\Providers;

use App\Jobs\CollectData;
use App\Services\BitfinexApi;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CollectData::class, function () {
            return new CollectData(new BitfinexApi());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
