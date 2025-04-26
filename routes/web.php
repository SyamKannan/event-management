<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\EventCreate;
use App\Livewire\EventIndex;
use App\Livewire\EventShow;
use App\Livewire\Gallery;
use App\Livewire\RequisitionList;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/events', EventIndex::class)->name('events.index');
    Route::get('/events/create', EventCreate::class)->name('events.create');
    Route::get('/events/{event}', EventShow::class)->name('events.show');
    Route::get('/events/{event}/requisitions', RequisitionList::class)->name('events.requisitions');
    Route::get('/events/{event}/gallery', Gallery::class)->name('events.gallery');
});
