<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Version;
use App\Policies\ProductPolicy;
use App\Policies\VersionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        // 'App\Models\Product' => 'App\Policies\ProductPolicy',
        Product::class => ProductPolicy::class,
        Version::class => VersionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
