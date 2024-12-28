<?php

namespace App\Providers;

use App\Models\PostCategory;
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
        // return posts categories
        $categories = PostCategory::all();
        View::share("categories", $categories);

        // return the current signed in user
        // view::composer("*", function ($view) {
        //     $user = Auth::guard('admin')->check()
        //     ? Auth::guard('admin')->user()
        //     : Auth::guard('web')->user();

        //     $view->with('signedInUser', $user);
        // });
    }
}
