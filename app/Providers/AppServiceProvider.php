<?php

declare(strict_types=1);

namespace App\Providers;

use App\Facades\PriceConvert;
use App\Helpers\PriceHelper;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacades();
    }

    public function registerFacades(): void
    {
        $this->app->bind('price.converter', function() {
            return new PriceHelper();
        });
    }

    public function registerAliases(): void
    {
//        AliasLoader::getInstance()->(PriceConvert::class, PriceHelper::class)
    }


}
