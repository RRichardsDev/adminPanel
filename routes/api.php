<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clients', [App\Http\Controllers\ApiController::class, 'getClients'])->name('apiGetClients');

Route::get('/users', [App\Http\Controllers\ApiController::class, 'getUsers'])->name('apiGetUsers');

Route::get('/roles', [App\Http\Controllers\ApiController::class, 'getRoles'])->name('apiGetRoles');

// Route::get('/user/{$id}/roles', [App\Http\Controllers\ApiController::class, 'getPermissions'])->name('apiGetPermissions');
