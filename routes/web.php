<?php

use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', 'login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('profile', App\Http\Controllers\ProflleController::class);

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
    Route::resource('departments',App\Http\Controllers\DepartmentController::class);
    Route::resource('facultys',App\Http\Controllers\FacultyController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('states', App\Http\Controllers\StateController::class);
    Route::resource('vendors', App\Http\Controllers\VendorController::class);
    Route::resource('units', App\Http\Controllers\UnitController::class);
    Route::resource('purchase_orders',App\Http\Controllers\PurchaseController::class);
    Route::resource('transporters', App\Http\Controllers\TransporterController::class);
    Route::resource('customers', App\Http\Controllers\CutomerController::class);
    Route::resource('materials', App\Http\Controllers\MaterialController::class);
    Route::resource('sales',App\Http\Controllers\SalesController::class);
    Route::resource('expences',App\Http\Controllers\ExpencesController::class);
    Route::resource('unit_customers',App\Http\Controllers\UnitCustomerController::class);
    Route::resource('material_types',App\Http\Controllers\MaterialTypeController::class);
    Route::resource('purchases',App\Http\Controllers\PurchasesController::class);
    Route::resource('bankaccount',App\Http\Controllers\AccountController::class);
    Route::post('bankaccount/{id}',[App\Http\Controllers\AccountController::class,'store'])->name('bankaccount.store');
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('unitaccount', App\Http\Controllers\UnitAccountController::class);
    Route::post('unit/add_expense', [App\Http\Controllers\UnitAccountController::class,'add_expence'])->name('unit.add_expence');
    Route::post('unit/customer_advanced', [App\Http\Controllers\UnitAccountController::class,'customer_advanced'])->name('unit.customer_advanced');
    Route::post('unit/customer_journal', [App\Http\Controllers\UnitAccountController::class,'customer_journal'])->name('unit.customer_journal');

    Route::resource('unit_charcoal_purchases', App\Http\Controllers\UnitCharcoalPurchaseController::class);
    Route::resource('unit_wood_purchases', App\Http\Controllers\UnitWoodPurchaseController::class);
    Route::resource('unit_account', App\Http\Controllers\UnitAccountController::class);
    
    Route::resource('charcoal_stock', App\Http\Controllers\CharcoalStockController::class);
    Route::resource('wood_stock', App\Http\Controllers\WoodStockController::class);
    Route::resource('manns', App\Http\Controllers\MannController::class);

    Route::post('role_permissions/{id}', [App\Http\Controllers\RoleController::class,'update_permission'])->name('role_permissions');
});