<?php

use Illuminate\Support\Facades\Route;
// use App\Models\ContourUser;

Route::get('/', [App\Http\Controllers\ContourUserController::class, 'index'])->name('listUser');

Auth::routes();

Route::get('instance/api/search/user/{id}', [App\Http\Controllers\InstanceController::class, 'byID']);

// User Routes
Route::get('user/list', [App\Http\Controllers\ContourUserController::class, 'index'])->name('listUser');
Route::get('user/create', [App\Http\Controllers\ContourUserController::class, 'create'])->name('createUser');
Route::post('user/create', [App\Http\Controllers\ContourUserController::class, 'store'])->name('storeUser');
Route::get('user/edit/{userID}', [App\Http\Controllers\ContourUserController::class, 'edit'])->name('editUser');
Route::post('user/edit/{userID}', [App\Http\Controllers\ContourUserController::class, 'update'])->name('updateUser');
Route::post('user/deleteUser', [App\Http\Controllers\ContourUserController::class, 'destroy'])->name('deleteUser');

// Client Routes
Route::get('client/list', [App\Http\Controllers\ContourClientController::class, 'index'])->name('listClient');
Route::get('client/create', [App\Http\Controllers\ContourClientController::class, 'create'])->name('createClient');
Route::post('client/create', [App\Http\Controllers\ContourClientController::class, 'store'])->name('storeClient');
Route::get('client/edit/{clientID}', [App\Http\Controllers\ContourClientController::class, 'edit'])->name('editClient');
Route::post('client/edit/{clientID}', [App\Http\Controllers\ContourClientController::class, 'update'])->name('updateClient');
Route::post('client/deleteclient', [App\Http\Controllers\ContourClientController::class, 'destroy'])->name('deleteClient');

//Instance routes
Route::get('instance/store', [App\Http\Controllers\InstanceController::class, 'store'])->name('storeInstance');
Route::get('instance/list', [App\Http\Controllers\InstanceController::class, 'index'])->name('listInstance');
Route::get('instance/{instanceID}', [App\Http\Controllers\InstanceController::class, 'show'])->name('instance');
Route::post('instance/create', [App\Http\Controllers\InstanceController::class, 'create'])->name('createInstance');
Route::post('instance/store', [App\Http\Controllers\InstanceController::class, 'store'])->name('storeInstance');

//UserFunctionCalls





