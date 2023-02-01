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

// login auth
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

    // delete employee
    Route::post('/delete', [\App\Http\Controllers\EmployeesController::class, 'delete'])->name('delete');

    // delete multiple employee
    Route::post('/dashboard', [\App\Http\Controllers\EmployeesController::class, 'deleteMultiple'])->name('deleteMultiple');

    // fetch 1 record using email
    Route::get('/dashboard/{email}', [App\Http\Controllers\EmployeesController::class, 'show']);

    // email verify
    Route::get('/email/verify', 'VerificatioController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');

});

// logout
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');