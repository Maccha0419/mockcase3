<?php

use Illuminate\Routing\Router;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('/users', UserController::class);
    $router->resource('/comments', CommentController::class);
    $router->resource('/email', EmailController::class);
});

use App\Admin\Controllers\EmailController;
Route::post('/admin/email', [EmailController::class, 'send'])->name('email');
