<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductVersion;
use App\Models\Version;
use App\Models\Vulnerability;
use App\Policies\CommentPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ProductVersionPolicy;
use App\Policies\VersionPolicy;
use App\Policies\VulnerabilityPolicy;
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
        Product::class => ProductPolicy::class,
        Version::class => VersionPolicy::class,
        ProductVersion::class => ProductVersionPolicy::class,
        Vulnerability::class => VulnerabilityPolicy::class,
        Comment::class => CommentPolicy::class,
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
