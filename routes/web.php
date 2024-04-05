<?php


use App\Livewire\Agents;
use App\Livewire\Groups;
use App\Livewire\Schemes;
use App\Livewire\Branches;
use App\Livewire\Policies;
use App\Livewire\Companies;
use App\Livewire\Employees;
use App\Livewire\Subscribers;
use App\Livewire\Designations;
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
Route::get('/branches',Branches::class)->name('branches');
Route::get('/designations',Designations::class)->name('designations');
Route::get('/agents',Agents::class)->name('agents');
Route::get('/subscribers',Subscribers::class)->name('subscribers');
Route::get('/groups',Groups::class)->name('groups');
Route::get('/schemes',Schemes::class)->name('schemes');
Route::get('/policies',Policies::class)->name('policies');