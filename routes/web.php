<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

// All assets
Route::get('/', [AssetController::class, 'index']);

// Search assets
Route::get('/search', [SearchController::class, 'query'])->middleware('auth');

// Show create form
Route::get('/assets/create', [AssetController::class, 'create'])->middleware('auth');

// Store asset data
Route::post('/assets', [AssetController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/assets/{asset}/edit', [AssetController::class, 'edit'])->middleware('auth');

// Update asset
Route::put('/assets/{asset}', [AssetController::class, 'update'])->middleware('auth');

// Delete asset
Route::delete('/assets/{asset}', [AssetController::class, 'destroy'])->middleware('auth');

// Manage assets
Route::get('/assets/manage', [AssetController::class, 'manage'])->middleware('auth');

// Single asset
Route::get('/assets/{asset}', [AssetController::class, 'show']);

// Show register/Create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Log out user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
