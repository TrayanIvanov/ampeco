<?php

namespace App\Providers;

use App\Jobs\BitcoinDataCrawler;
use App\Services\BitfinexApi;
use App\Services\UserNotifier;
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
        $this->app->bind(BitcoinDataCrawler::class, function () {
            return new BitcoinDataCrawler(new BitfinexApi(), new UserNotifier());
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
