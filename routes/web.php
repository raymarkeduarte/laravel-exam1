<?php

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

//login form
Route::get('/', function () {
    return view('login');
});
//login process/auth
// Route::post('/', [\App\Http\Controllers\LoginController::class, 'authenticate']);

//register form
Route::get('/register', function () {
    return view('register');
});
// register process/insert
Route::post('/register', [\App\Http\Controllers\MembersController::class, 'store']);

// new employee
Route::post('/store', [\App\Http\Controllers\EmployeesController::class, 'store']);
Route::get('/view', [App\Http\Controllers\EmployeesController::class, 'index']);
Route::get('/view/{email}', [App\Http\Controllers\EmployeesController::class, 'show']);
