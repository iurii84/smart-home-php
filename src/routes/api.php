<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceDataBindController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//the routes for all API calls
Route::group(array('prefix' => '/v1'), function () {
    Route::group(array('prefix' => '/login'), function () {
        Route::post('/access-token', function (Request $request) {
            // fake access token - TODO need to be implemented
            return '{"access_token":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2NzY5Mzk2NjksInN1YiI6IjMifQ.XHFeWT1hBf5scSAtnNWB71hP3QJoIlkAHLFxIRHPZCg","token_type":"bearer"}';
        });
    });

    Route::group(array('prefix' => '/message'), function () {
        Route::get('/', [MessageController::class, 'get']);

        Route::post('/', [MessageController::class, 'post']);
    });

    Route::group(array('prefix' => '/devices'), function () {
        Route::get('/', [DeviceController::class, 'get']);
        Route::post('/', [DeviceController::class, 'register']);
        Route::delete('/{device_id}', [DeviceController::class, 'delete']);
        Route::patch('/{device_id}', [DeviceController::class, 'update']);

        Route::get('/unregistered', [DeviceController::class, 'get_unregistered']);
        Route::get('/locations', [DeviceController::class, 'get_locations']);
        Route::get('/types', [DeviceController::class, 'get_types']);
    });

    Route::group(array('prefix' => '/device_data_bind'), function () {
        Route::get('/', [DeviceDataBindController::class, 'get']);

    });
});

