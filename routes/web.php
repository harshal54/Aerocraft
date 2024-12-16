<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/employees/create', [EmployeeController::class, 'create']);
// Route::post('/employees', [EmployeeController::class, 'store']);
// Route::get('/employees', [EmployeeController::class, 'index']);
// Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit']);
// Route::put('/employees/{id}', [EmployeeController::class, 'update']);
// Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);

Route::get('/', [EmployeeController::class, 'index']);
Route::resource('employees', EmployeeController::class);
