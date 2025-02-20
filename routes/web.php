<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CommentaireController;

Route::get('/', [AnnonceController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');
    Route::post('/annonce', [AnnonceController::class, 'store'])->name('annonce.store');
    Route::get('/annonce/{id}', [AnnonceController::class, 'show'])->name('annonce.show');
    Route::get('/annonce/{id}/edit', [AnnonceController::class, 'edit'])->name('annonce.edit');
    Route::put('/annonce/{id}', [AnnonceController::class, 'update'])->name('annonce.update');
    Route::delete('/annonce/{id}', [AnnonceController::class, 'destroy'])->name('annonce.destroy');

    Route::post('/commentaire', [CommentaireController::class, 'store'])->name('commentaire.store');
});


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
    return view('welcome');
});
 
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('annonces', AnnonceController::class)->except(['index', 'show']);
});

Route::get('/dashboard', [AnnonceController::class, 'dashboard'])->name('dashboard')->middleware('auth');


require __DIR__.'/auth.php';
