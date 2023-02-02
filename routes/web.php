<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeController;
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
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]); 
  
Route::get('/', function () {
    return view('login');
});


//http verbs: get, post, put/patch, delete

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');})->name('dashboard');
    Route::resource('companies', CompanyController::class);
  
    Route::resource('ermployes',EmployeController::class);
    
});

Route::fallback(function () {
    dd('404 not found.....');
});
