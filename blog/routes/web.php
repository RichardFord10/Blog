<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WorkHistoryController;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\ProjectsController;
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

Route::get('/', function () {
    return view('portfolio');
});

Route::get('/game', function () {
    return view('game.index');
})->name('game');

Route::get('/dashboard', function () {
    $user = Auth::user();
    $posts = $user->posts; 
    $projects = $user->projects;
    $work_histories = $user->work_histories;
    return view('/dashboard', compact('posts', 'projects', 'work_histories'));
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/chat', [ChatGptController::class, 'chat'])->name('chat.send'); // Handles sending messages
Route::get('/chat', [ChatGptController::class, 'index'])->name('chat.index'); // Serves the chat page

Route::middleware('auth')->group(function () {
    Route::resource('work_history', WorkHistoryController::class);
    Route::resource('projects', ProjectsController::class);
    Route::get('posts/review', [PostController::class, 'review'])->name('posts.review');
    Route::post('posts/confirm', [PostController::class, 'confirm'])->name('posts.confirm');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//menu
Route::get('/portfolio', [WorkHistoryController::class, 'index'])->name('portfolio'); 
Route::resource('posts', PostController::class);
Route::get('/csv-upload', [CsvController::class, 'index'])->name('csv');
Route::post('/csv-upload', [CsvController::class, 'upload'])->name('upload');
Route::get('/csv-download', [CsvController::class, 'download'])->name('download');

Route::middleware(['auth'])->group(function () {
});

require __DIR__.'/auth.php';
