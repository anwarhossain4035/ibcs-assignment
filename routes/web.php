<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload',[EmployeeController::class,'fileUpload'])->name('upload');
Route::get('/',[EmployeeController::class,'employeeList'])->name('index');
Route::get('/pdf',[EmployeeController::class,'generatePdf'])->name('pdf');
