<?php

use Illuminate\Support\Facades\Route;
// use App\Models\ContourUser;

Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('listUser');

Auth::routes();

Route::get('instance/api/search/user/{id}', [App\Http\Controllers\ClientController::class, 'byID']);

// User Routes
Route::get('user/list', [App\Http\Controllers\UserController::class, 'index'])->name('listUser');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('createUser');
Route::post('user/create', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
Route::get('user/edit/{userID}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser');
Route::post('user/edit/{userID}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser');
Route::post('user/deleteUser', [App\Http\Controllers\UserController::class, 'destroy'])->name('deleteUser');

// //Client routes
Route::get('client/list', [App\Http\Controllers\ClientController::class, 'index'])->name('listClient');
Route::get('client/{clientID}', [App\Http\Controllers\ClientController::class, 'show'])->name('showClient');
Route::get('client/{clientID}/user/{userID}', [App\Http\Controllers\ClientController::class, 'showUser'])->name('clientShowUser');
Route::post('client/{clientID}/user/add', [App\Http\Controllers\ClientController::class, 'addUser'])->name('clientAddUser');
Route::post('client/{clientID}/user/{userID}', [App\Http\Controllers\ClientController::class, 'updateUserRoles'])->name('updateUserRoles');
Route::post('client/user/delete', [App\Http\Controllers\ClientController::class, 'destroy'])->name('removeClientUser');
//UserFunctionCalls





