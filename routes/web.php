<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EquipmentController;
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
    Route::get('/edit/{factory}', [FactoryController::class, 'edit'])->name('edit-factory');
    Route::post('/update/{factory}', [FactoryController::class, 'update'])->name('update-factory');
    Route::post('/delete/{factory}', [FactoryController::class, 'destroy'])->name('delete-factory');
});


/*
|--------------------------------------------------------------------------
| Areas Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('areas')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [AreaController::class, 'index'])->name('areas');
    Route::post('/list', [AreaController::class, 'list'])->name('areas-list');
    Route::get('/add', [AreaController::class, 'create'])->name('add-area');
    Route::post('/add', [AreaController::class, 'store'])->name('store-area');
    Route::get('/edit/{area}', [AreaController::class, 'edit'])->name('edit-area');
    Route::post('/update/{area}', [AreaController::class, 'update'])->name('update-area');
    Route::post('/delete/{area}', [AreaController::class, 'destroy'])->name('delete-area');
    Route::get('/getAreaCodesJSON/{area?}', [AreaController::class, 'getAreaCodesJSON'])->name('areas-json');
});

/*
|--------------------------------------------------------------------------
| Equipments Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('equipments')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [EquipmentController::class, 'index'])->name('equipments');
    Route::post('/list', [EquipmentController::class, 'list'])->name('equipments-list');
    Route::get('/add', [EquipmentController::class, 'create'])->name('add-equipment');
    Route::post('/add', [EquipmentController::class, 'store'])->name('store-equipment');
    Route::get('/edit/{equipment}', [EquipmentController::class, 'edit'])->name('edit-equipment');
    Route::post('/update/{equipment}', [EquipmentController::class, 'update'])->name('update-equipment');
    Route::post('/delete/{equipment}', [EquipmentController::class, 'destroy'])->name('delete-equipment');
});