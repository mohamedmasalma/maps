<?php

namespace App\Providers;

use App\Models\idea;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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

        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        Debugbar::enable();


        // role
        Gate::define("admin", function(User $user):bool{
            return $user->is_admin;
        });

        //permision
        Gate::define("editing.idea", function(User $user,idea $idea):bool{
            return $user->is($idea->user) ;
        });



        $topU=Cache::remember("topUsers",now()->addSeconds(20),function(){


            return User::withCount("ideas")->orderBy("ideas_count","DESC")->limit(2)->get();

        });


        View::share("topUsers",$topU);
    }
}
