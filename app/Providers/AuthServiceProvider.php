<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Gate::define('order', function(User $user){
            return $user->address && $user->city;
        });

        Gate::define('admin', function (User $user){
            return $user->role === 'admin';
        });

        Gate::define('edit-product', function (User $user, Product $product){
            return $user->role === 'admin' && $product->seller_id == $user->id;
        });
    }
}
