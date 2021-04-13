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
// limit/time(minute) 'middleware' => 'throttle:30,30', berhasil: cara test nya coba ketik ketik di search campaign banyak banyak
// nanti return nya pasti 429 Too Many Request
$router->group(['prefix' => 'api/v1'], function () use ($router) {
    
    // Auth API, limit 30 kali transaksi dlm 30 menit di api auth
    $router->group(['prefix' => 'auth', 'middleware' => 'throttle:30,30'], function () use ($router) {
        $router->post('register', 'AuthController@register');
        $router->post('login', 'AuthController@login');
        $router->get('logout', 'AuthController@logout');
        $router->delete('delete/{id_user}', [
            'middleware' => 'auth',
            'uses' => 'AuthController@delete'
        ]);
        $router->post('update/{id_user}', [
            'middleware' => 'auth',
            'uses' => 'AuthController@update'
        ]);
        
        // OTP
        $router->get('validate/{id_user}/{otp}', [
            'middleware' => 'auth',
            'uses' => 'AuthController@validateOTP'
        ]);
        $router->get('resend-otp/{id_user}', 'AuthController@resendOTP');

        $router->post('forget-password', 'AuthController@requestChangePassword');

        $router->post('refresh', 'AuthController@refreshToken');
    });

    // Campaign
    $router->group(['prefix' => 'campaign'], function () use ($router) {

        // Categories
        $router->group(['prefix' => 'categories'], function () use ($router) {
            $router->get('/', 'CampaignController@allCategories');
            $router->post('store', [
                'middleware' => 'auth',
                'uses' => 'CampaignController@storeCategories'
            ]);
            $router->post('update/{id_categories}', [
                'middleware' => 'auth',
                'uses' => 'CampaignController@updateCategories'
            ]);
        });

        // Members
        $router->group(['prefix' => 'members'], function () use ($router) {
            $router->get('/{id_campaign}[/{id_user}]', [
                'middleware' => 'auth',
                'uses' => 'CampaignController@getMemberOnCampaign']);
        });

        /**
         * kelompok kelompok campaign harus di defenisikan sebelum rootnya
         * Static route "/api/v1/campaign/categories" is shadowed by previously defined variable
         */

        // $url = route('image_campaign', ['image_name' => 1]);
        $router->get('images/{image_name}', [
            'as' => 'image_campaign',
            'uses' => 'CampaignController@imageCampaign'
        ]);

        
        // Campaign, group with middleware
        $router->group(['middleware' => 'auth'], function () use ($router) {
            $router->get('user/{id_user}', 'CampaignController@campaignByUser');
            $router->post('store[/{id_user}]', 'CampaignController@createCampaign');
            $router->post('update/{id_campaign}', 'CampaignController@updateCampaign');
            $router->delete('delete/{id_campaign}', 'CampaignController@deleteCampaign');
            $router->get('rsvp/{id_campaign}/{id_user}', 'CampaignController@assignMemberToCampaign');
        });
        $router->get('/', 'CampaignController@allCampaigns');
        $router->get('/{id_campaign}[/{slug}]', 'CampaignController@campaign');
        
    });


    // Transaction
    $router->group(['prefix' => 'transaction'], function () use ($router) {
        /** masih without middleware */
        $router->get('cron', 'TransactionController@cronCheckTransaction');
        $router->group(['middleware' => 'auth'], function () use ($router) {
            // ini transaksi yg dimiliki user
            $router->get('user/{id_user}', 'TransactionController@userTransaction');

            // ini transaksi yg dimiliki campaign
            $router->get('campaign[/{id_campaign}]', 'TransactionController@campaignTransactions');
            
            // ini utk checkout
            $router->get('user/{id_user}/campaign/{id_campaign}', 'TransactionController@userTransactionByCampaign');

            $router->get('verify/{id_transaction}', [
                'as' => 'verify_transaction',
                'uses' => 'TransactionController@verifyTransactionCampaign'
            ]);
            $router->get('/', 'TransactionController@allTransactions');
            $router->get('/{id_transaction}', 'TransactionController@getTransaction');
        });
    });


    // Email
    $router->group(['prefix' => 'email'], function () use ($router) {
        $router->group(['middleware' => 'auth'], function () use ($router) {
            $router->post('store', 'EmailController@create');
            $router->post('update/{id_email}', 'EmailController@update');
            $router->delete('delete/{id_email}', 'EmailController@delete');
        });
        $router->get('/', 'EmailController@getEmail');
        $router->get('/{id_email}', 'EmailController@getEmail');
    });


    // php.ini files contains some limits that might affect this. Try changing these to high enough values:
    // upload_max_filesize = 50M
    // post_max_size = 50M
    // memory_limit = 64M
    $router->group(['prefix' => 'report'], function () use ($router) {
        $router->post('upload', 'ReportController@upload');
    });
    

    $router->get('profile', 'UserController@profile');
    $router->get('users', 'UserController@allUsers');

    $router->get('user/{id_user}', 'UserController@getUser');
    $router->post('user/{id_user}/social/set', 'UserController@setUserSocial');
    $router->get('user/{id_user}/social', 'UserController@getUserSocial');
    
    $router->get('user/deactivate/{id_user}/{status}', 'UserController@changeStatusUser');
});

// php -S localhost:8000 -t public
// sudah bisa php artisan serve