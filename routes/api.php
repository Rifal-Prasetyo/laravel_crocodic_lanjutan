<?php

use App\Http\Controllers\API\User\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(ApiUserController::class)
    ->prefix('/users')
    ->group(function () {
        Route::get('/', 'index'); // List User Route /api/users/
        Route::get('/{id}', 'show'); // find User according ID Route /api/users/{id}
        Route::post('/', 'post'); // Post User /api/users/
        Route::put('/{id}', 'update'); //update user
        Route::delete('/id', 'destroy'); //delete user
    });

Route::get('/coba', function (Request $request) {
    return  [
        'headers' => $request->header(),
        'data' => $request->all()
    ];
});
