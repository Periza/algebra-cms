<?php

use App\Http\Controllers\AdminController;
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
Route::get('/roles/{id}/edit', [AdminController::class, 'editRole']);
Route::put('/roles/{id}/edit', [AdminController::class, 'update'])->name('editRole');
Route::get('/roles/create', [AdminController::class, 'newRole']);
Route::post('/roles/create', [AdminController::class, 'store'])->name('storeRole');
Route::delete('/roles/{id}', [AdminController::class, 'delete'])->name('roleDelete');