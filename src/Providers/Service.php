<?php

namespace GeneaLabs\LaravelMultiStepProgressbar\Providers;

use GeneaLabs\LaravelMultiStepProgressbar\View\Components\MultiStepProgressbar;
use GeneaLabs\LaravelMultiStepProgressbar\View\Components\MultiStepProgressbarItem;
use GeneaLabs\LaravelMultiStepProgressbar\View\Composers\MultiStepProgressbarComposer;
use Illuminate\Support\ServiceProvider;

class Service extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        app('view')
            ->composer(
                '*',
                MultiStepProgressbarComposer::class
            );

        $this->loadViewComponentsAs(
            '',
            [
                MultiStepProgressbar::class,
                MultiStepProgressbarItem::class,
            ]
        );

        $this->publishes([
            __DIR__ . '/../../config/genealabs-laravel-multi-step-progressbar.php' => config_path('genealabs-laravel-multi-step-progressbar.php')
        ], 'config');
        $this->publishes([
            __DIR__ . '/../../public' => public_path()
        ], 'assets');
        // $this->publishes([
        //     __DIR__ . '/../../resources/views' => base_path('resources/views/vendor/genealabs-laravel-governor')
        // ], 'views');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'genealabs-laravel-multi-step-progressbar');
    }

    public function register()
    {
        parent::register();
        $this->mergeConfigFrom(__DIR__ . '/../../config/genealabs-laravel-multi-step-progressbar.php', 'genealabs-laravel-multi-step-progressbar');
        // $this->commands(Publish::class);
    }

    public function provides() : array
    {
        return [];
    }
}
