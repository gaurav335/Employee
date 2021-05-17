<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[EmployeeController::class, 'loginEmployee']);
Route::get('login',[EmployeeController::class, 'loginEmployee'])->name('login');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('designation',[DesignationController::class,'get']);
    Route::get('department',[DepartmentController::class,'get']);
    Route::get('employee',[EmployeeController::class,'get']);
    Route::get('serch/{name}',[EmployeeController::class,'serch']);

});



