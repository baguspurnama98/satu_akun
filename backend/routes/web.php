<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


// menggunakan as untuk dapat dipanggil di controller full path url nya
$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->get('validate/{id_user}/{otp}', [
        'as' => 'validate', 
        'uses' => 'AuthController@validateOTP'
    ]);
});


// kelompok prefix API
$router->group(['prefix' => 'api/v1'], function () use ($router) {
    
    // Auth API
    $router->group(['prefix' => 'auth'], function () use ($router) {
        $router->post('register', 'AuthController@register');
        $router->post('login', 'AuthController@login');
        $router->get('logout', 'AuthController@logout');
        // OTP
        $router->get('validate/{id_user}/{otp}', 'AuthController@validateOTP');
        $router->get('resend-otp/{id_user}', 'AuthController@resendOTP');

        $router->post('refresh', 'AuthController@refreshToken');
    });

    // Campaign
    $router->group(['prefix' => 'campaign'], function () use ($router) {
        // $router->get('store', 'CampaignController@allCategories');


        // Categories
        $router->group(['prefix' => 'categories'], function () use ($router) {
            $router->get('/', 'CampaignController@allCategories');
            $router->post('store', 'CampaignController@storeCategories');
        });
    });

    
    $router->get('profile', 'UserController@profile');
    $router->get('users', 'UserController@allUsers');

    $router->get('user/{id_user}', 'UserController@getUser');
});

// php -S localhost:8000 -t public