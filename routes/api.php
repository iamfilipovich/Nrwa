<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeApi;
use App\Http\Controllers\SalaryApi;
use App\Http\Controllers\TitlesApiController;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Titles;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('employee', [EmployeeApi::class, 'index']);
Route::get('employee/{employee}', [EmployeeApi::class, 'show']);
Route::post('employee', [EmployeeApi::class, 'store']);
Route::put('employee/{employee}', [EmployeeApi::class, 'update']);
Route::delete('employee/{employee}', [EmployeeApi::class, 'destroy']);

Route::get('salary', [SalaryApi::class, 'index']);
Route::get('salary/{salary}', [SalaryApi::class, 'show']);
Route::post('salary', [SalaryApi::class, 'store']);
Route::put('salary/{salary}', [SalaryApi::class, 'update']);
Route::delete('salary/{salary}', [SalaryApi::class, 'destroy']);

//REST API

Route::get('/titles', [TitlesApiController::class, 'index']);
Route::post('/titles', [TitlesApiController::class, 'store']);
Route::get('/titles/{id}', [TitlesApiController::class, 'show']);
Route::put('/titles/{id}',[TitlesApiController::class, 'update']);
Route::delete('/titles/{id}', [TitlesApiController::class, 'destroy']);

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'AuthController@user');
    // Other authenticated routes...
});

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});