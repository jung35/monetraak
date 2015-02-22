<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function()
{
    Route::group(['prefix' => 'api'], function()
    {
        Route::group(['prefix' => 'v1'], function()
        {
            Route::group(['prefix' => 'money'], function()
            {
                Route::post('/{money}/amount', [
                    'as'   => 'api.v1.money.modify',
                    'uses' => 'Money\MoneyHandlerController@modify'
                ]);
                Route::post('/{money}/save', [
                    'as'   => 'api.v1.money.save',
                    'uses' => 'Money\MoneyHandlerController@save'
                ]);
            });

            Route::resource('money', 'Money\MoneyController');
        });
    });

    Route::get('money/{money?}', [
        'as'   => 'view.money',
        'uses' => 'MoneyViewController@view'
    ]);
});