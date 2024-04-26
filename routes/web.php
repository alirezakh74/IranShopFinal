<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Models\Brand;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', function(){
    $brands = Brand::latest()->paginate(4);
    return view('admin.brands.index', compact('brands'));
    //Artisan::call('route:list');
    //return Artisan::output();
});

Route::prefix('admin-panel')->get('/',[DashboardController::class, 'index'])->name('dashboard');

Route::prefix('admin-panel')->name('admin.')->group(function () {

    Route::resource('brands', BrandController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('categories', CategoryController::class);
});

Route::get('/migrate', function(){
    Artisan::call('migrate');
    return Artisan::output();
});
