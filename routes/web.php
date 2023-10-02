<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\BlogController;



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

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', [aboutController::class, 'show'])->middleware(['auth', 'verified'])->name('about');

Route::get('/topic', [TopicController::class, 'show'])->middleware(['auth', 'verified'])->name('topic');
Route::post('/store-blogs', [BlogController::class, 'store'])->middleware(['auth', 'verified'])->name('blogs.store');
Route::post('/edit-blogs', [BlogCOntroller::class, 'edit'])->middleware(['auth', 'verified'])->name('blogs.edit');
Route::post('/update-blogs', [BlogCOntroller::class, 'update'])->middleware(['auth', 'verified'])->name('blogs.update');
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('blogs',BlogController::class);

require __DIR__ . '/auth.php';
