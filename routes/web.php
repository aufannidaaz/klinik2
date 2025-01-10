<?php

use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollectionIterator;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//route polis
Route::resource('polis', PoliController::class);
Route::get('/polis/create', [PoliController::class, 'create'])->name('polis.create');
// route pasien

Route::resource('daftar', DaftarController::class);
Route::resource('pasien', PasienController::class)->middleware(Authenticate::class);
Route::get('/pasiens/{id}/edit', [PasienController::class, 'edit'])->name('pasiens.edit');
Route::put('/pasiens/{id}', [PasienController::class, 'destroy'])->name('pasiens.destroy');
Route::resource('pasiens', PasienController::class);

Route::post('/logout', [AuthorCollectionIterator::class, 'logout'])->name('logout');

Route::put('/pasiens/{id}', [PasienController::class, 'update'])->name('pasiens.update');
require __DIR__.'/auth.php';
