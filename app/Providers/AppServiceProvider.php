<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Ensure the database is accessed only when it is available
        if(app()->runningInConsole()) {
            return;
        }

        if(Schema::hasTable('post_categories')) {
            $categories = \App\Models\PostCategory::all();
            View::share("categories", $categories);
        }

        // return the current signed in user
        // view::composer("*", function ($view) {
        //     $user = Auth::guard('admin')->check()
        //     ? Auth::guard('admin')->user()
        //     : Auth::guard('web')->user();

        //     $view->with('signedInUser', $user);
        // });
    }
}
