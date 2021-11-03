<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Tags;
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
        $categories = Category::orderby('id', 'ASC')->get();
        view()->share('categories', $categories);

        //Dynamic Menu Items
        $menuItems = Menu::orderby('position', 'ASC')->get();
        view()->share('menuItems', $menuItems);

        
    }
}
