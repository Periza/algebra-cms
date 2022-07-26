<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/home', function() {
    return view('home');
})->name('home');
Route::get('/', function() {
    return view('home');
});

Route::get('/administration', [AdminController::class, 'getAdministrationView'])->name('administration');

// ROLES
Route::get('/roles', [AdminController::class, 'getRolesView']);
Route::get('/roles/{role}/edit', [AdminController::class, 'edit']);
Route::put('/roles/{role}/edit', [AdminController::class, 'update'])->name('editRole');
Route::get('/roles/create', [AdminController::class, 'newRole']);
Route::post('/roles/create', [AdminController::class, 'store'])->name('storeRole');
Route::delete('/roles/{role}', [AdminController::class, 'delete'])->name('roleDelete');

// USERS
Route::group(['prefix' => 'users'], function() {
    Route::put('/{user}/role', [AdminController::class, 'updateUserRole'])->name('editRole');
    Route::post('/add', [UserController::class], 'addUser' )->name('adduser');
    Route::delete('/{user}', [AdminController::class, 'deleteUser'])->name('deleteUser');
});

Auth::routes();
/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
