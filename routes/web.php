<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\{PageController, ContactController};


// Route::get('/', function () { return view('welcome'); });

Route::get('/', [PageController::class, 'index'])->name('pages.index');
Route::get('/o-firmie', [PageController::class, 'about'])->name('pages.about');
Route::get('/kontakt', [ContactController::class, 'create'])->name('pages.contacts.create');
Route::post('/kontakt/wyslij', [ContactController::class, 'store'])->name('pages.contacts.store');
Route::get('/dziekujemy-za-kontakt', [ContactController::class, 'thank'])->name('pages.contacts.thank');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
