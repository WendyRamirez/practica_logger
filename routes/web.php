<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Libro;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('/notas');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/notas', 'App\Http\Controllers\NotaController');
    Route::get('/notas/{nota}/editar', 'App\Http\Controllers\NotaController')->name('notas.edit');
    Route::put('/notas/{nota}', 'App\Http\Controllers\NotaController')->name('notas.update');
    Route::delete('/notas/{nota}','App\Http\Controllers\NotaController')->name('notas.destroy');
    Route::get('contact', [App\Http\Controllers\ContactFormController::class, 'form'])->name('contact.form');
    Route::post('send-form', [App\Http\Controllers\ContactFormController::class, 'send'])->name('contact.send');
    Route::get('/search', [App\Http\Controllers\AutoCompleteController::class, 'index'])->name('search');
    Route::get('/autocomplete', [App\Http\Controllers\AutoCompleteController::class, 'autocomplete'])->name('autocomplete');
    // Route::put('/editar{$id}', [App\Http\Controllers\NotaController::class, 'update'])->name('notas.update');
    // Route::delete('/eliminar{$id}', [App\Http\Controllers\NotaController::class, 'delete'])->name('notas.eliminar');
});

require __DIR__.'/auth.php';
