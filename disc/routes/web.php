<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Route;

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

Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');


// Route::middleware('auth')->group(function () {
//     Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
//     Route::get('/services', [ServicesController::class, 'store'])->name('services.store');
//     Route::get('/services', [ServicesController::class, 'edit'])->name('services.edit');
//     Route::patch('/services', [ServicesController::class, 'update'])->name('services.update');
//     Route::delete('/services', [ServicesController::class, 'destroy'])->name('services.destroy');
// });

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::controller(LeadsController::class)->group(function(){
       
        
        Route::name('leads.')->group(function(){
            Route::get('/search','search')->name('search');
            Route::get('/leads', 'index')->name('index');
            Route::post('/leads/create', 'create')->name('create');
            Route::post('/leads/store', 'store')->name('store');
            Route::patch('/leads', 'update')->name('update');
            Route::delete('/leads', 'destroy')->name('destroy');
        });

    });

    Route::post('/leads/service/store', [ServicesController::class, 'store'])->name('services.store');

});

require __DIR__.'/auth.php';
