<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\PostController;
use App\Models\News;
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

Route::get('/', [BaseController::class, 'index'])->name('home');
Route::get('/portfolio/{slug}', [BaseController::class, 'portfolio'])->name('portfolio');
Route::get('/news', [BaseController::class, 'news'])->name('news');

Route::post('/feedback', [PostController::class, 'feedback'])->name('feedback');
Route::post('/get_news/{news:id}', function (News $news) {
    return $news;
})->name('get_news');
