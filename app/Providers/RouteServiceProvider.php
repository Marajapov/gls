<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = '';

    public function boot(Router $router)
    {
        //

        parent::boot($router);

        $router->model('user', \Model\User\ModelName::class);
        $router->model('category', \Model\Category\ModelName::class);
        $router->model('subcategory', \Model\Subcategory\ModelName::class);
        $router->model('menu', \Model\Menu\ModelName::class);
        $router->model('order', \Model\Order\ModelName::class);
        $router->model('userSubcategoryTie', \Model\UserSubcategoryTie\ModelName::class);
        $router->model('orderSubcategoryTie', \Model\OrderSubcategoryTie\ModelName::class);

        $this->app['view']->addNamespace('Front', app_path().'/Acme/Http/Front/Views/');
        $this->app['view']->addNamespace('Admin', app_path().'/Acme/Http/Admin/Views/');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Acme/Http/Front/routes.php');
            require app_path('Acme/Http/Admin/routes.php');
            require app_path('Acme/Http/Api/routes.php');
        });
    }
}
