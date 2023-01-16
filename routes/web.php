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


Auth::routes();

Route::get('/', App\Http\Livewire\Frontend\Posts\Index::class);

Route::get('/posts/single/{id}', \App\Http\Livewire\Frontend\Posts\Single::class)->name('posts.single');
Route::post('/posts/comment', [\App\Http\Controllers\PostsController::class, 'saveComment'])->name('posts.comment');
