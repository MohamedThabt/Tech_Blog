<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //writer Authorization
        Gate::define('create-post', function (User $user) {
            return $user->type == "writer";
        });

        //admin Authorization
        Gate::define('admin-controller', function (User $user) {
            return $user->type == "admin";
        });
        
        //every writer posts 
        Gate::define('post-upate-delete', function (User $user, Post $post) {
            return $user->id == $post->user_id;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
