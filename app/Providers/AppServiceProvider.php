<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\RequisitionItem;
use App\Policies\EventPolicy;
use App\Policies\GalleryPolicy;
use App\Policies\RequisitionItemPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
    protected $policies = [
        Event::class => EventPolicy::class,
        RequisitionItem::class => RequisitionItemPolicy::class,
        Gallery::class => GalleryPolicy::class,
    ];
}
