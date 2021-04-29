<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('instance/api/search/user/{id}', [App\Http\Controllers\ClientController::class, 'byID']);

// User Routes
Route::get('user/list', [App\Http\Controllers\UserController::class, 'index'])->name('listUser');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('createUser'); 
Route::post('user/create', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('showUser');
Route::get('user/edit/{userID}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser');
Route::post('user/edit/{userID}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser');
Route::post('user/deleteUser', [App\Http\Controllers\UserController::class, 'destroy'])->name('deleteUser');

Route::post('user/password/update', [App\Http\Controllers\UserController::class, 'updatePassword']);


// //Client Routes
Route::get('/', [App\Http\Controllers\ClientController::class, 'index'])->name('listClient');
Route::get('client/{clientID}', [App\Http\Controllers\ClientController::class, 'show'])->name('showClient');
Route::get('client/{clientID}/user/{userID}', [App\Http\Controllers\ClientController::class, 'showClientUser'])->name('clientShowUser');
Route::post('client/{clientID}/user/add', [App\Http\Controllers\ClientController::class, 'addUser'])->name('clientAddUser');
Route::post('client/{clientID}/user/{userID}', [App\Http\Controllers\ClientController::class, 'updateUserRoles'])->name('updateUserRoles');
Route::post('client/user/delete', [App\Http\Controllers\ClientController::class, 'destroy'])->name('removeClientUser');

//Role Routes
Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('listRole');
Route::get('/role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('createRole');
Route::get('/role/store', [App\Http\Controllers\RoleController::class, 'storeRoll'])->name('storeRole');


Route::get('/role/{roleID}', [App\Http\Controllers\RoleController::class, 'show'])->name('showRole');
Route::get('/role/edit/{roleID}', [App\Http\Controllers\RoleController::class, 'edit'])->name('editRole');
Route::patch('/role/edit/{roleID}', [App\Http\Controllers\RoleController::class, 'update'])->name('updateRole');
Route::delete('/role/delete/{roleID}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('deleteRole');

Route::post('/role/{roleID}/permissions', [App\Http\Controllers\RoleController::class, 'updatePermissionRoles'])
																						->name('updatePermissionRoles');







