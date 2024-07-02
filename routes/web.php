<?php

use App\Livewire\Home;
use App\Livewire\About;

use App\Livewire\Users\Login;
use App\Http\Controllers\LogoutController;
use App\Livewire\Users\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Posts\Show as PostShow;
use App\Livewire\Posts\Update as PostUpdate;
use App\Livewire\Posts\Index as PostIndex;
use App\Livewire\Posts\Create as PostCreate;
use App\Livewire\Posts\Destroy;
// use App\Livewire\Posts\Destroy as PostDestroy;

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/about', About::class)->name('about');
    Route::get('/posts', PostIndex::class)->name('posts.index');   
    Route::get('/posts/create', PostCreate::class)->name('posts.create');
    Route::get('/posts/{slug}', PostShow::class)->name('posts.show'); 
    Route::get('/posts/{slug}/edit', PostUpdate::class)->name('posts.edit');
    // Route::get('/posts/{slug}/delete', PostDestroy::class)->name('posts.destroy');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', Register::class)->name('register')->middleware('guest');
