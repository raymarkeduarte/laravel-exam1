<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MembersController;
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

// login form
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

// login process/auth
Route::post('/', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login');

// register form
Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest');

// register process/insert
Route::post('/register', [\App\Http\Controllers\MembersController::class, 'store']);


Route::group(['middleware' => ['auth']], function() {

    // dashboard
    Route::get('/dashboard', [App\Http\Controllers\EmployeesController::class, 'index']);

    // new employee
    Route::post('/store', [\App\Http\Controllers\EmployeesController::class, 'store'])->name('store');

    // edit employee
    Route::post('/update', [\App\Http\Controllers\EmployeesController::class, 'update'])->name('update');

    // fetch 1 record using email
    Route::get('/dashboard/{email}', [App\Http\Controllers\EmployeesController::class, 'show']);

});

// logout
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');