<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Clients\ClientComponent;
use App\Http\Livewire\CommissionComponent;
use App\Http\Livewire\Employees\EmployeesComponent;
use App\Http\Livewire\Services\ServicesComponent;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::group(['middleware' => 'auth' ], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('services', ServicesComponent::class)->name('services');
    Route::get('employees', EmployeesComponent::class)->name('employees');
    Route::get('clients', ClientComponent::class)->name('clients');
    Route::get('commission', CommissionComponent::class)->name('commission');
});

