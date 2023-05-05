<?php

use Illuminate\View\View;
use App\Models\User;
use App\Models\Transaction;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MenuController;
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

Route::get('/', [UserController::class, 'start']);
Route::get('/user/{id}/home', [UserController::class, 'home']);

// Route::get('/user/{id}/transaction', [UserController::class, 'transaction']);

Route::get('/user/{id}/transaction', [TransactionController::class, 'tampil']);
Route::get('/user/{id}/menu',[MenuController::class,'tampil']);
// Route::get('/user/{id}/menu/{type}/a',[MenuController::class,'view2']);

Route::get('/input',[UserController::class, 'insert']);
Route::get('/insert',[TransactionController::class, 'insert']);
