<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', []);

// ROLES
Route::get('/roles', [AdminController::class, 'getRolesView']);
Route::get('/roles/{role}/edit', [AdminController::class, 'edit']);
Route::put('/roles/{role}/edit', [AdminController::class, 'update'])->name('editRole');
Route::get('/roles/create', [AdminController::class, 'newRole']);
Route::post('/roles/create', [AdminController::class, 'store'])->name('storeRole');
Route::delete('/roles/{role}', [AdminController::class, 'delete'])->name('roleDelete');

// USERS
Route::group(['prefix' => 'users'], function() {
    Route::put('/{user_id}/role', [UserController::class, 'updateUserRole'])->name('updateRole');
    Route::post('/add', [UserController::class], 'addUser' )->name('adduser');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
