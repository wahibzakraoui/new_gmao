<?php

use App\Http\Controllers\PartController;
use App\Http\Controllers\SpareController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\GamutController;
use App\Http\Controllers\TaskController;
use \App\Http\Controllers\UserController;
use App\Models\Factory;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


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
    return redirect('dashboard');
});
Route::get('/locale/{locale}', [\App\Http\Controllers\LocalizationController::class, 'index'])->name('locale');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');
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
| Spares Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('spares')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [SpareController::class, 'index'])->name('spares');
    Route::post('/list', [SpareController::class, 'list'])->name('spares-list');
    Route::get('/add', [SpareController::class, 'create'])->name('add-spare');
    Route::post('/add', [SpareController::class, 'store'])->name('store-spare');
    Route::get('/edit/{spare}', [SpareController::class, 'edit'])->name('edit-spare');
    Route::post('/update/{spare}', [SpareController::class, 'update'])->name('update-spare');
    Route::post('/delete/{spare}', [SpareController::class, 'destroy'])->name('delete-spare');
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
    Route::post('/list_work_orders/{gamut}', [GamutController::class, 'list_work_orders'])->name('gamut-work_orders-list');
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
    Route::get('/finished', [WorkOrderController::class, 'finished'])->name('work_orders-finished');
    Route::post('/list', [WorkOrderController::class, 'list'])->name('work_orders-list');
    Route::post('/finished_list', [WorkOrderController::class, 'finished_list'])->name('work_orders-finished_list');
    Route::get('/show/{work_order}', [WorkOrderController::class, 'show'])->name('show-work_order');
    Route::get('/add/{workOrder?}', [WorkOrderController::class, 'create'])->name('add-work_order');
    Route::post('/add', [WorkOrderController::class, 'store'])->name('store-work_order');
    Route::get('/edit/{workOrder}', [WorkOrderController::class, 'edit'])->name('edit-work_order');
    Route::get('/execute/{workOrder}', [WorkOrderController::class, 'execute'])->name('execute-work_order-form');
    Route::post('/execute/{workOrder}', [WorkOrderController::class, 'store_execution'])->name('execute-work_order');
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
/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('users')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::post('/list', [UserController::class, 'list'])->name('users-list');
    Route::get('/add', [UserController::class, 'create'])->name('add-user');
    Route::post('/add', [UserController::class, 'store'])->name('store-user');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit-user');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('update-user');
    Route::post('/delete/{user}', [UserController::class, 'destroy'])->name('delete-user');
});

/*
|--------------------------------------------------------------------------
| Purchases Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('purchases')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [PurchaseController::class, 'index'])->name('purchases');
    Route::get('/view/{purchase?}', [PurchaseController::class, 'show'])->name('view-purchase');
    Route::get('/pending', [PurchaseController::class, 'pending'])->name('pending-purchases');
    Route::get('/consulting', [PurchaseController::class, 'consulting'])->name('consulting-purchases');
    Route::get('/pending_delivery', [PurchaseController::class, 'pending_delivery'])->name('pending-delivery-purchases');
    Route::get('/archived', [PurchaseController::class, 'archived'])->name('archived-purchases');
    Route::post('/list', [PurchaseController::class, 'list'])->name('purchases-list');
    Route::post('/list_pending', [PurchaseController::class, 'list_pending'])->name('purchases-list_pending');
    Route::post('/list_consulting', [PurchaseController::class, 'list_consulting'])->name('purchases-list_consulting');
    Route::post('/list_pending_delivery', [PurchaseController::class, 'list_pending_delivery'])->name('purchases-list_pending_delivery');
    Route::post('/list_archived', [PurchaseController::class, 'list_archived'])->name('purchases-list_archived');
    Route::get('/add/{workOrder?}', [PurchaseController::class, 'create'])->name('add-purchase');
    Route::post('/add', [PurchaseController::class, 'store'])->name('store-purchase');
    Route::get('/edit/{purchase}', [PurchaseController::class, 'edit'])->name('edit-purchase');
    Route::get('/approve/{purchase?}', [PurchaseController::class, 'approve'])->name('approve-purchase');
    Route::post('/approve/{purchase?}', [PurchaseController::class, 'store_approval'])->name('approve-purchase');
    Route::get('/quotation/{purchase}', [PurchaseController::class, 'create_quotation'])->name('add-quotation');
    Route::post('/quotation/{purchase?}', [PurchaseController::class, 'store_quotation'])->name('store-quotation');
    Route::post('/update/{purchase}', [PurchaseController::class, 'update'])->name('update-purchase');
    Route::post('/delete/{purchase}', [PurchaseController::class, 'destroy'])->name('delete-purchase');
    Route::post('/quotation/delete/{quotation}', [PurchaseController::class, 'destroy_quotation'])->name('delete-quotation');
    Route::get('/quotation/select/{quotation}', [PurchaseController::class, 'select_quotation'])->name('select-quotation');

    // dirty test with the client @todo it's obvious
    Route::get('/receive/{purchase}', function (\App\Models\Purchase $purchase){
        if($purchase->state->transitionTo('fulfilled')){
            return redirect('purchases');
        }
    })->name('receive-purchase');
});

