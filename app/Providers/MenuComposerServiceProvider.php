<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\MenuComposer;

/**
 * Class MenuComposerServiceProvider
 *
 * @package App\Providers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class MenuComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', MenuComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
