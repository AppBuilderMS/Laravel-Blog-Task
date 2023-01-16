<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

//Auth::routes(['register' => false]);

Route::prefix('dashboard')->name('dashboard.')->group(function (){
    Route::middleware(['auth'])->group(function (){
        Route::get('/', \App\Http\Livewire\Backend\Dashboard::class)->name('dashboard');
        //Edit Auth Credentials
        Route::get('/edit-auth-credentials', \App\Http\Livewire\Backend\EditAuthCredentials::class)->name('edit-auth-credentials');
        //Users
        Route::get('/users', App\Http\Livewire\Backend\Users\Index::class)->name('users')->middleware('admin');
        //Posts Route
        Route::get('/posts', App\Http\Livewire\Backend\Posts\Index::class)->name('posts');
        Route::get('/posts/archived', App\Http\Livewire\Backend\Posts\Archived::class)->name('posts.archived')->middleware('admin');
        Route::get('/posts/create', App\Http\Livewire\Backend\Posts\Create::class)->name('posts.create');
        Route::get('/posts/edit/{id}', \App\Http\Livewire\Backend\Posts\Edit::class)->name('posts.edit')->middleware('post.owner');
        //comments
        Route::get('/comments', App\Http\Livewire\Backend\Comments\Index::class)->name('comments');
        Route::get('/comments/archived', App\Http\Livewire\Backend\Comments\Archived::class)->name('comments.archived')->middleware('admin');
        Route::get('/comments/edit/{id}', \App\Http\Livewire\Backend\Comments\Edit::class)->name('comments.edit')->middleware('comment.owner');
    });
});



