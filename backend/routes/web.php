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
// Nyoba pakai throttle tapi tidak berhasil hehe
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

        // Categories
        $router->group(['prefix' => 'categories'], function () use ($router) {
            $router->get('/', 'CampaignController@allCategories');
            $router->post('store', 'CampaignController@storeCategories');
        });

        /**
         * kelompok kelompok campaign harus di defenisikan sebelum rootnya
         * Static route "/api/v1/campaign/categories" is shadowed by previously defined variable
         */
        $router->get('/', 'CampaignController@allCampaigns');
        $router->get('/{id_campaign}[/{slug}]', 'CampaignController@campaign');
        $router->post('store', 'CampaignController@createCampaign');
        $router->post('update/{id_campaign}', 'CampaignController@updateCampaign');

        $router->get('rsvp/{id_campaign}/{id_user}', 'CampaignController@assignMemberToCampaign');
    });


    // Transaction
    $router->group(['prefix' => 'transaction'], function () use ($router) {
        $router->get('/', 'TransactionController@allTransactions');
        $router->get('user/{id_user}', 'TransactionController@userTransaction');
        $router->get('campaign/{id_campaign}', 'TransactionController@campaignTransaction');
        $router->get('user/{id_user}/campaign/{id_campaign}', 'TransactionController@userTransactionByCampaign');
    });
    

    $router->get('profile', 'UserController@profile');
    $router->get('users', 'UserController@allUsers');

    $router->get('user/{id_user}', 'UserController@getUser');
});

// php -S localhost:8000 -t public
// sudah bisa php artisan serve