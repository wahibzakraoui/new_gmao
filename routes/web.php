<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FactoryController;
use App\Models\Factory;


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

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Factories Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('factories')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [FactoryController::class, 'index'])->name('factories');
    Route::post('/list', [FactoryController::class, 'list'])->name('factories-list');
    Route::get('/add', [FactoryController::class, 'create'])->name('add-factory');
    Route::post('/add', [FactoryController::class, 'store'])->name('store-factory');
    Route::get('/edit/{Factory}', [FactoryController::class, 'edit'])->name('edit-factory');
    Route::post('/update/{Factory}', [FactoryController::class, 'update'])->name('update-factory');
    Route::post('/delete/{Factory}', [FactoryController::class, 'destroy'])->name('delete-factory');
});
