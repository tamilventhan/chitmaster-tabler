<?php


use App\Livewire\Employees;
use App\Livewire\Companies;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/employees',Employees::class)->name('employees');
Route::get('/companies',Companies::class)->name('companies');