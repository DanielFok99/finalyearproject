<?php

use App\Http\Controllers\API\AttributeController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\CustomerGroupController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SupplierController;
use App\Http\Controllers\API\UnitController;
use App\Http\Controllers\API\WarehouseController;
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
Route::post('login', [AuthController::class, 'adminLogin']);
Route::post('logout', [AuthController::class, 'adminLogout']);

Route::group(['middleware' => 'auth:admin'], function () {

    //Product
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::post('/', [ProductController::class, 'store']);
        Route::get('{product}', [ProductController::class, 'show']);
        Route::put('{product}', [ProductController::class, 'update']);
        Route::delete('{product}', [ProductController::class, 'destroy']);
    });

    //Product Category
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('{productCategory}', [CategoryController::class, 'show']);
        Route::put('{productCategory}', [CategoryController::class, 'update']);
        Route::delete('{productCategory}', [CategoryController::class, 'destroy']);
    });

    //Product Brand
    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', [BrandController::class, 'index']);
        Route::post('/', [BrandController::class, 'store']);
        Route::get('{productBrand}', [BrandController::class, 'show']);
        Route::put('{productBrand}', [BrandController::class, 'update']);
        Route::delete('{productBrand}', [BrandController::class, 'destroy']);
    });

    //Product Group
    Route::group(['prefix' => 'groups'], function () {
        Route::get('/', [GroupController::class, 'index']);
        Route::post('/', [GroupController::class, 'store']);
        Route::get('{productGroup}', [GroupController::class, 'show']);
        Route::put('{productGroup}', [GroupController::class, 'update']);
        Route::delete('{productGroup}', [GroupController::class, 'destroy']);
    });

    //Product Attribute
    Route::group(['prefix' => 'attributes'], function () {
        Route::get('/', [AttributeController::class, 'index']);
        Route::post('/', [AttributeController::class, 'store']);
        Route::get('{productAttribute}', [AttributeController::class, 'show']);
        Route::put('{productAttribute}', [AttributeController::class, 'update']);
        Route::delete('{productAttribute}', [AttributeController::class, 'destroy']);
    });

    //Product Unit
    Route::group(['prefix' => 'units'], function () {
        Route::get('/', [UnitController::class, 'index']);
        Route::post('/', [UnitController::class, 'store']);
        Route::get('{productUnit}', [UnitController::class, 'show']);
        Route::put('{productUnit}', [UnitController::class, 'update']);
        Route::delete('{productUnit}', [UnitController::class, 'destroy']);
    });

    //Customer
    Route::group(['prefix' => 'customers'], function () {
        Route::get('/', [CustomerController::class, 'index']);
        Route::post('/', [CustomerController::class, 'store']);
        Route::get('{customer}', [CustomerController::class, 'show']);
        Route::put('{customer}', [CustomerController::class, 'update']);
        Route::delete('{customer}', [CustomerController::class, 'destroy']);
    });

    //Customer Group
    Route::group(['prefix' => 'customer-groups'], function () {
        Route::get('/', [CustomerGroupController::class, 'index']);
        Route::post('/', [CustomerGroupController::class, 'store']);
        Route::get('{customerGroup}', [CustomerGroupController::class, 'show']);
        Route::put('{customerGroup}', [CustomerGroupController::class, 'update']);
        Route::delete('{customerGroup}', [CustomerGroupController::class, 'destroy']);
    });

    //Supplier
    Route::group(['prefix' => 'suppliers'], function () {
        Route::get('/', [SupplierController::class, 'index']);
        Route::post('/', [SupplierController::class, 'store']);
        Route::get('{supplier}', [SupplierController::class, 'show']);
        Route::put('{supplier}', [SupplierController::class, 'update']);
        Route::delete('{supplier}', [SupplierController::class, 'destroy']);
    });

    //Warehouse
    Route::group(['prefix' => 'warehouses'], function () {
        Route::get('/', [WarehouseController::class, 'index']);
        Route::post('/', [WarehouseController::class, 'store']);
        Route::get('{warehouse}', [WarehouseController::class, 'show']);
        Route::put('{warehouse}', [WarehouseController::class, 'update']);
        Route::delete('{warehouse}', [WarehouseController::class, 'destroy']);
    });
});

