<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\GalleryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('trang-chu', [HomeController::class, 'index'])->name('home.index');

Route::get('lien-he', [HomeController::class, 'contact'])->name('contact.index');

// Route::get('bai-viet', [HomeController::class, 'blog'])->name('blog.index');
// Route::get('bai-viet', [HomeController::class, 'content'])->name('blog.content');

Route::prefix('bai-viet')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('client.blog.index');
    Route::get('/{slug}', [BlogController::class, 'detail'])->name('client.blog.detail');
});

Route::prefix('san-pham')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('client.product.index');
    Route::get('/{slug}', [ProductController::class, 'detail'])->name('client.product.detail');
});

Route::prefix('thu-vien')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('client.gallery.index');
});


Route::get('/welcome', function () {
    return view('welcome')->name('welcome');
});


Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);

Route::any('logout', function () {
    Auth::logout();
    return redirect(route('login'));
})->name('logout');

// Route::get('clear', function(){
//     Artisan::call('cache:clear');
//     Artisan::call('route:cache');
//     Artisan::call('config:cache');
//     Artisan::call('view:clear');
//     return 'Clear success';
// });
