<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Paginator::useBootstrapFive();

        //  PostPolicy 
        Gate::policy(Post::class, PostPolicy::class);

        // Authorization gate
        // Gate::define('update-post', function(User $user, Post $post) {
        //     return $user->id === $post->user_id;
        // });
        // Gate::define('delete-post', function(User $user, Post $post) {
        //     return $user->id === $post->user_id;
        // });
    }
}
