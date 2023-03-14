<?php

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

Route::get('/', [\App\Http\Controllers\Controller::class, 'index']);
Route::middleware('auth')->group(function (){
    Route::get('/Category/new', [\App\Http\Controllers\Category::class, 'new']);
    Route::post('/Category/new', [\App\Http\Controllers\Category::class, 'newMake']);
    Route::get('/Category/all', [\App\Http\Controllers\Category::class, 'getAllCategory']);
    Route::get('/Category/update', [\App\Http\Controllers\Category::class, 'updateCategory']);
    Route::post('/Category/update', [\App\Http\Controllers\Category::class, 'updateCategory']);
    Route::get('/Category/delete', [\App\Http\Controllers\Category::class, 'deleteCategory']);
    Route::get('/Tag/new', [\App\Http\Controllers\Tag::class, 'newTag']);
    Route::post('/Tag/new', [\App\Http\Controllers\Tag::class, 'newTag']);
    Route::get('/Tag/all', [\App\Http\Controllers\Tag::class, 'getAllTags']);
    Route::get('/Tag/update', [\App\Http\Controllers\Tag::class, 'updateTag']);
    Route::post('/Tag/update', [\App\Http\Controllers\Tag::class, 'updateTag']);
    Route::get('/Tag/delete', [\App\Http\Controllers\Tag::class, 'deleteTag']);

    Route::get('/Post/all', [\App\Http\Controllers\PostController::class, 'index']);
    Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create']);
    Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store']);
    Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit']);
    Route::patch('/posts/{post}/update', [\App\Http\Controllers\PostController::class, 'update']);
    /*Route::put('/posts/{posts}', [\App\Http\Controllers\PostController::class, 'update']);*/

    Route::get('/Tag/delete', [\App\Http\Controllers\Tag::class, 'deleteTag']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function (){
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'handleLogin']);
    Route::get('/Registration', [\App\Http\Controllers\AuthController::class, 'registration']);
    Route::post('/Registration', [\App\Http\Controllers\AuthController::class, 'handleRegistration']);
    Route::get('/googleAuth', [\App\Http\Controllers\AuthController::class, 'redirectGoogle']);
    Route::get('/googleAuth/callbeck', [\App\Http\Controllers\AuthController::class, 'callbeckGoogle']);
});

