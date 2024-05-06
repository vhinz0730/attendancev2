<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\StudentPage;
use App\Livewire\EnrolleePage;
use App\Livewire\EnrolleedPage;
use App\Livewire\TimePage;
use App\Livewire\LogPage;
use App\Livewire\TimeinPage;
use App\Livewire\TimeoutPage;



Route::middleware('guest')->group(function () {
    Route::get('/', TimePage::class)->name('time');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/students', StudentPage::class)->middleware(['auth', 'verified'])->name('student');
Route::get('/students/pending', EnrolleePage::class)->middleware(['auth', 'verified'])->name('pending');

Route::get('/Logs', LogPage::class)->middleware(['auth', 'verified'])->name('log');
Route::get('/Logs/timein', TimeinPage::class)->middleware(['auth', 'verified'])->name('timein');
Route::get('/Logs/timeout', TimeoutPage::class)->middleware(['auth', 'verified'])->name('timeout');

require __DIR__.'/auth.php';


