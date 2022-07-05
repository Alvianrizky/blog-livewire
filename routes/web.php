<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Blog\Home;
use App\Http\Livewire\Blog\Blog;
use App\Http\Livewire\Blog\Detail;

use App\Http\Livewire\Admin\Home as AdminHome;

use App\Http\Livewire\Admin\Post\Index as PostIndex;
use App\Http\Livewire\Admin\Post\Add as PostAdd;

use App\Http\Livewire\Admin\Tag\Index as TagIndex;
use App\Http\Livewire\Admin\Tag\Add as TagAdd;
use App\Http\Livewire\Admin\Tag\Edit as TagEdit;

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

Route::get('/c', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/admin')->group(function () {
    Route::get('/', AdminHome::class)->name('dashboard');
    Route::get('/dashboard', AdminHome::class)->name('dashboard');

    Route::prefix('/post')->group(function () {
        Route::get('/', PostIndex::class)->name('post.index');
        Route::get('/add', PostAdd::class)->name('post.add');
    });

    Route::prefix('/tag')->group(function () {
        Route::get('/', TagIndex::class)->name('tag.index');
        Route::get('/add', TagAdd::class)->name('tag.add');
        Route::get('/edit/{id}', TagEdit::class)->name('tag.edit');
    });
});



// Route::get('/home', Home::class)->name('home');
Route::get('/', Blog::class)->name('home');
Route::get('/detail', Detail::class)->name('detail');
Route::get('/news/{date}/{slug}', Detail::class)->name('detail.blog');
