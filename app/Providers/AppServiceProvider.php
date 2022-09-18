<?php

namespace App\Providers;

use App\Models\Backend\Post as MainPost;
use App\Models\Backend\FLSS\Post as FlssPost;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
        Builder::defaultStringLength(191);

        // only Administrator directive
        Blade::if('Administrator', function () {
            return auth()->check() && auth()->user()->user_role_id == 1;
        });

        // Author directive
        Blade::if('Author', function () {
            return auth()->check() && (auth()->user()->user_role_id == 2);
        });

        // Editor directive
        Blade::if('Editor', function () {
            return auth()->check() && (auth()->user()->user_role_id == 3);
        });

        // All User directive
        Blade::if('AllUser', function () {
            return auth()->check() && (auth()->user()->user_role_id == 1 || auth()->user()->user_role_id == 2 || auth()->user()->user_role_id == 3);
        });

        // AuthorEditor User directive
        Blade::if('AuthorEditor', function () {
            return auth()->check() && (auth()->user()->user_role_id == 2 || auth()->user()->user_role_id == 3);
        });

        // AdministratorAuthor User directive
        Blade::if('AdministratorAuthor', function () {
            return auth()->check() && (auth()->user()->user_role_id == 1 || auth()->user()->user_role_id == 2);
        });

        // AdministratorEditor User directive
        Blade::if('AdministratorEditor', function () {
            return auth()->check() && (auth()->user()->user_role_id == 1 || auth()->user()->user_role_id == 3);
        });


        // view composer
        view()->composer('*', function ($view){
            $pendingAuthors = 0;
            $mainPosts = 0;
            $flssPosts = 0;
            if (auth::check()){
                if (auth()->user()->user_role_id == 1 || auth()->user()->user_role_id == 3){
                    $pendingAuthors = User::select('status','user_role_id')->where('status',0)->where('user_role_id',2)->count();
                    $mainPosts  = MainPost::select('status')->where('status',3)->count();
                    $flssPosts  = FlssPost::select('status')->where('status',3)->count();
                }
            }
            $view->with(['pendingAuthors'=> $pendingAuthors, 'mainPosts' => $mainPosts, 'flssPosts'=> $flssPosts]);
        });

    }


}
