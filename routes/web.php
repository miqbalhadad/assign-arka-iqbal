<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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


Route::get('/', [ProjectController::class, 'index']);
Route::get('/search', 'ProjectController@search');
Route::get('/add', [ProjectController::class, 'add']);
Route::get('/edit', [ProjectController::class, 'edit']);
Route::get('/store', [ProjectController::class, 'store']);

