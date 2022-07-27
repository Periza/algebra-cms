<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PostController;
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
Route::get('/roles', [AdminController::class, 'getRolesView'])->name('getRolesView');
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

// POSTS
Route::group(['prefix' => 'posts'], function() {
    Route::get('/', [PostController::class, 'getPostsView'])->name('postsView');
    Route::get('details/{post}', [PostController::class, 'postDetails'])->name('postDetails');
    Route::get('/newpost', [PostController::class, 'getNewPostView'])->name('newPostView');
    Route::get('/{post}/edit', [PostController::class, 'editPostView'])->name('editPostView');
    Route::put('/{post}/edit', [PostController::class, 'savePost'])->name('editPost');;
    Route::post('/newpost', [PostController::class, 'saveNewPost'])->name('newPost');
    Route::delete('/{post}', [PostController::class, 'deletePost'])->name('deletePost');
});

Auth::routes();

Route::group(['prefix' => 'menus'], function() {
    Route::get('/', [MenuController::class, 'getMenusView'])->name('menus');
    Route::get('/new', [MenuController::class, 'getNewMenuView'])->name('newMenu');
    Route::post('/new', [MenuController::class, 'saveNewMenu'])->name('saveNewMenu');
    Route::get('/edit/{menu}', [MenuController::class, 'menuEditView'])->name('menuEditView');
    Route::put('/edit/{menu}', [MenuController::class, 'saveMenu'])->name('editMenu');
    Route::post('/{menu}', [MenuController::class, 'saveMenu']);
    Route::delete('/{menu}', [MenuController::class, 'deleteMenu'])->name('deleteMenu');
    Route::get('/details/{post}', [PostController::class, 'postDetails']);
});

Route::post('/savePost', [MenuController::class, 'savePostToMenu']);
Route::delete('/deletePost/{menu}/{post}', [MenuController::class, 'deletePostFromMenu'])->name('deletePostFromMenu');

Route::get('/addPostToMenu', [MenuController::class, 'addPostToMenuView'])->name('addPostToMenu');

