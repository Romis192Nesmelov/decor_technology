<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('enter');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('home');

    Route::get('/users/{slug?}', [AdminController::class, 'users'])->name('users');
    Route::post('/edit-user', [AdminController::class, 'editUser'])->name('edit_user');
    Route::post('/delete-user', [AdminController::class, 'deleteUser'])->name('delete-user');

    Route::get('/news/{slug?}', [AdminController::class, 'news'])->name('news');
    Route::post('/edit-news', [AdminController::class, 'editNews'])->name('edit_news');
    Route::post('/delete-news', [AdminController::class, 'deleteNews'])->name('delete-news');

    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('/edit-settings', [AdminController::class, 'editSettings'])->name('edit_settings');

    Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::post('/edit-contact', [AdminController::class, 'editContact'])->name('edit_contact');
    Route::post('/delete-contact', [AdminController::class, 'deleteContact'])->name('delete-contact');

    Route::get('/why-us/{slug?}', [AdminController::class, 'whyUs'])->name('why_us');
    Route::post('/edit-why-us', [AdminController::class, 'editWhyUs'])->name('edit_why_us');
    Route::post('/delete-why-us', [AdminController::class, 'deleteWhyUs'])->name('delete-why-us');

    Route::get('/jobs/{slug?}', [AdminController::class, 'jobs'])->name('jobs');
    Route::post('/edit-job', [AdminController::class, 'editJob'])->name('edit_job');
    Route::post('/delete-job', [AdminController::class, 'deleteJob'])->name('delete-job');

    Route::get('/contents', [AdminController::class, 'contents'])->name('contents');
    Route::post('/edit-content', [AdminController::class, 'editContent'])->name('edit_content');
});