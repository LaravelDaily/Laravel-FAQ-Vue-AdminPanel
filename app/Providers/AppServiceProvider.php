<?php

namespace App\Providers;

use App\Models\Question;
use App\Models\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('latestArticles', Question::latest()->take(5)->get());
        View::share('popularTags', Tag::withCount('questions')->has('questions')->get()->sortBy('questions_count'));
    }
}
