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
Route::get('/Post/all', [\App\Http\Controllers\Post::class, 'getPosts']);
Route::get('/Post/new', [\App\Http\Controllers\Post::class, 'new']);
Route::post('/Post/new', [\App\Http\Controllers\Post::class, 'newMake']);
Route::get('/Post/update', [\App\Http\Controllers\Post::class, 'update']);
Route::post('/Post/update', [\App\Http\Controllers\Post::class, 'update']);
Route::get('/Tag/delete', [\App\Http\Controllers\Tag::class, 'deleteTag']);

