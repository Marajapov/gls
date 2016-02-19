<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = '';
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->model('user', \Model\User\ModelName::class);

        $this->app['view']->addNamespace('Front', app_path().'/Acme/Http/Front/Views/');
        $this->app['view']->addNamespace('Admin', app_path().'/Acme/Http/Admin/Views/');
    }
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Acme/Http/Front/routes.php');
            require app_path('Acme/Http/Admin/routes.php');
            require app_path('Acme/Http/Api/routes.php');
        });
    }
}
