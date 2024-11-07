<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\TentativeController;

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
        return view('dashboard');
    });

Route::get('/dashboard', function () {
        return view('grade');
    })->name('grade');

Route::get('/sorry', function () {
        return view('sorry');
    })->name('sorry');

Route::get('/{id}', [GradesController::class,'show'])->name('show');

Route::get('/tentative/{level}/{num}', [TentativeController::class,'show'])->name('tentative');
Route::post('/tentative/{level}/{num}',[TentativeController::class,'store'])->name('tentativeAnswer');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
