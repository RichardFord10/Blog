<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WorkHistoryController;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\DashboardController;



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Auth Routes
Route::middleware('auth')->group(function () {
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('work_history', WorkHistoryController::class);
    Route::resource('projects', ProjectsController::class);
    Route::resource('socials', SocialController::class);
    Route::get('posts/review', [PostController::class, 'review'])->name('posts.review');
    Route::post('posts/confirm', [PostController::class, 'confirm'])->name('posts.confirm');
    Route::patch('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Non Auth Routes
Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/chat', [ChatGptController::class, 'chat'])->name('chat.send');
Route::get('/chat', [ChatGptController::class, 'index'])->name('chat.index');
Route::get('/products/filter', [ProductController::class, 'filter']);
Route::resource('products', ProductController::class);
Route::resource('posts', PostController::class);
Route::get('/csv-upload', [CsvController::class, 'index'])->name('csv');
Route::post('/csv-upload', [CsvController::class, 'upload'])->name('upload');
Route::get('/csv-download', [CsvController::class, 'download'])->name('download');

Route::middleware(['auth'])->group(function () {
});

require __DIR__.'/auth.php';
