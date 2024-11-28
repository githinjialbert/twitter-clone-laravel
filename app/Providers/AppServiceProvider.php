<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

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
        Paginator::useBootstrapFive();

        $topUsers = Cache::remember('topUsers', 20, function () {

            return User::withCount('idea')
            ->orderBy('idea_count', 'DESC')
            ->limit(5)
            ->get();

        });

        View::share('topUsers', $topUsers);
    }
}
