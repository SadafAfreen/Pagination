<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

//Route::get('/', [CustomerController::class, 'Show']);
//Route::get('/', [CustomerController::class, 'paginationManual']);
//Route::get('/', [CustomerController::class, 'paginationQueryBuilder']);
//Route::get('/', [CustomerController::class, 'paginationQueryBuilderSimplePaginate']);
//Route::get('/', [CustomerController::class, 'paginationEloquent']);
Route::get('/', [CustomerController::class, 'paginationAJAX']);