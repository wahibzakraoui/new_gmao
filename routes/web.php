<?php

use App\Http\Controllers\PartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\GamutController;
use App\Http\Controllers\TaskController;
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
Route::get('/locale/{locale}', [\App\Http\Controllers\LocalizationController::class, 'index'])->name('locale');

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
Route::prefix('factories')->middleware(['auth:sanctum', 'verified', 'localization'])->group(function () {
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

/*
|--------------------------------------------------------------------------
| Parts Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('parts')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [PartController::class, 'index'])->name('parts');
    Route::post('/list', [PartController::class, 'list'])->name('parts-list');
    Route::get('/add', [PartController::class, 'create'])->name('add-part');
    Route::post('/add', [PartController::class, 'store'])->name('store-part');
    Route::get('/edit/{part}', [PartController::class, 'edit'])->name('edit-part');
    Route::post('/update/{part}', [PartController::class, 'update'])->name('update-part');
    Route::post('/delete/{part}', [PartController::class, 'destroy'])->name('delete-part');
});

/*
|--------------------------------------------------------------------------
| Gamuts Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('gamuts')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [GamutController::class, 'index'])->name('gamuts');
    Route::post('/list', [GamutController::class, 'list'])->name('gamuts-list');
    Route::get('/show/{gamut}', [GamutController::class, 'show'])->name('show-gamut');
    Route::get('/add', [GamutController::class, 'create'])->name('add-gamut');
    Route::post('/add', [GamutController::class, 'store'])->name('store-gamut');
    Route::get('/edit/{gamut}', [GamutController::class, 'edit'])->name('edit-gamut');
    Route::post('/update/{gamut}', [GamutController::class, 'update'])->name('update-gamut');
    Route::post('/delete/{gamut}', [GamutController::class, 'destroy'])->name('delete-gamut');
    Route::get('/pdf/{gamut}', [GamutController::class, 'pdf'])->name('gamut-pdf');
});

/*
|--------------------------------------------------------------------------
| Work Order Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('work_orders')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [WorkOrderController::class, 'index'])->name('work_orders');
    Route::post('/list', [WorkOrderController::class, 'list'])->name('work_orders-list');
    Route::get('/show/{work_order}', [WorkOrderController::class, 'show'])->name('show-work_order');
    Route::get('/add', [WorkOrderController::class, 'create'])->name('add-work_order');
    Route::post('/add', [WorkOrderController::class, 'store'])->name('store-work_order');
    Route::get('/edit/{workOrder}', [WorkOrderController::class, 'edit'])->name('edit-work_order');
    Route::post('/update/{workOrder}', [WorkOrderController::class, 'update'])->name('update-work_order');
    Route::post('/delete/{workOrder}', [WorkOrderController::class, 'destroy'])->name('delete-work_order');
    Route::get('/pdf/{workOrder}', [WorkOrderController::class, 'pdf'])->name('work_order-pdf');
});

/*
|--------------------------------------------------------------------------
| Tasks Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('tasks')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('/add', [TaskController::class, 'store'])->name('store-task');
    Route::post('/delete/{task}', [TaskController::class, 'destroy'])->name('delete-task');
});
