<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentEmployeeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Middleware\AccessControl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GoogleController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes accessible to user role
Route::middleware([AccessControl::class . ':user'])->group(function () {
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/salaries', [SalaryController::class, 'index'])->name('salaries.index');

    // Disable edit routes for users
    Route::get('/departments/{department}/edit', function () {
        abort(403, 'Forbidden');
    })->name('departments.edit')->middleware('checkrole:user');
    
    Route::get('/employees/{employee}/edit', function () {
        abort(403, 'Forbidden');
    })->name('employees.edit')->middleware('checkrole:user');
    
    Route::get('/salaries/{salary}/edit', function () {
        abort(403, 'Forbidden');
    })->name('salaries.edit')->middleware('checkrole:user');

    // Add a hidden _method field to override PUT/PATCH methods for edit forms
    Route::put('/departments/{department}', function () {
        abort(403, 'Forbidden');
    })->name('departments.update')->middleware('checkrole:user');
    
    Route::patch('/departments/{department}', function () {
        abort(403, 'Forbidden');
    })->name('departments.update')->middleware('checkrole:user');
    
    Route::put('/employees/{employee}', function () {
        abort(403, 'Forbidden');
    })->name('employees.update')->middleware('checkrole:user');
    
    Route::patch('/employees/{employee}', function () {
        abort(403, 'Forbidden');
    })->name('employees.update')->middleware('checkrole:user');
    
    Route::put('/salaries/{salary}', function () {
        abort(403, 'Forbidden');
    })->name('salaries.update')->middleware('checkrole:user');
    
    Route::patch('/salaries/{salary}', function () {
        abort(403, 'Forbidden');
    })->name('salaries.update')->middleware('checkrole:user');
});



// Routes accessible to editor role
Route::middleware([AccessControl::class . ':editor'])->group(function () {
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/salaries', [SalaryController::class, 'index'])->name('salaries.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');
    Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy')-> middleware('accesscontrol:editor');

    Route::get('/salaries/create', [SalaryController::class, 'create'])->name('salaries.create');
    Route::post('/salaries', [SalaryController::class, 'store'])->name('salaries.store');
    Route::get('/salaries/{salary}', [SalaryController::class, 'show'])->name('salaries.show');
    Route::get('/salaries/{salary}/edit', [SalaryController::class, 'edit'])->name('salaries.edit');
    Route::put('/salaries/{salary}', [SalaryController::class, 'update'])->name('salaries.update');
    Route::delete('/salaries/{salary}', [SalaryController::class, 'destroy'])->name('salaries.destroy');
});

// Routes accessible to admin role
Route::middleware([AccessControl::class . ':admin'])->group(function () {
    Route::resource('departments', DepartmentController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('salaries', SalaryController::class);
    Route::resource('departmentsemployees', DepartmentEmployeeController::class);
});
Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.index')
    ->middleware('auth', 'role:admin'); 

Route::get('/search', [SearchController::class, 'search'])->name('search');

//OAuth

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::controller(GoogleController::class)->group(function(){
    Route::get('login/google', 'redirectToGoogle')->name('login.google');
    Route::get('login/google/callback', 'handleGoogleCallback');

});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
