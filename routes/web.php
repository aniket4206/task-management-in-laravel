<?php

use App\Livewire\TodoList;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


Route::get('/notify', [App\Livewire\TodoList::class, 'notify'])->name('notify');


Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('calendar', 'calendar')
->middleware(['auth', 'verified'])
    ->name('calendar');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
