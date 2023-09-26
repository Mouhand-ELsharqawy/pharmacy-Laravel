<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DisposalController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderedDrugController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PrescriptionDrugController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(BillController::class)->group(function(){
    Route::get('/bill','index');
    Route::post('/bill','store');
    Route::get('/bill/{id}','show');
    Route::patch('/bill/{id}','update');
    Route::delete('/bill/{id}','destroy');
});

Route::controller(CustomerController::class)->group(function(){
    Route::get('/customer','index');
    Route::post('/customer','store');
    Route::get('/customer/{id}','show');
    Route::patch('/customer/{id}','update');
    Route::delete('/customer/{id}','destroy');
});

Route::controller(DisposalController::class)->group(function(){
    Route::get('/disposal','index');
    Route::post('/disposal','store');
    Route::get('/disposal/{id}','show');
    Route::patch('/disposal/{id}','update');
    Route::delete('/disposal/{id}','destroy');
});

Route::controller(EmployeeController::class)->group(function(){
    Route::get('/employee','index');
    Route::post('/employee','store');
    Route::get('/employee/{id}','show');
    Route::patch('/employee/{id}','update');
    Route::delete('/employee/{id}','destroy');
});


Route::controller(InsuranceController::class)->group(function(){
    Route::get('/insurance','index');
    Route::post('/insurance','store');
    Route::get('/insurance/{id}','show');
    Route::patch('/insurance/{id}','update');
    Route::delete('/insurance/{id}','destroy');
});


Route::controller(MedicineController::class)->group(function(){
    Route::get('/medicine','index');
    Route::post('/medicine','store');
    Route::get('/medicine/{id}','show');
    Route::patch('/medicine/{id}','update');
    Route::delete('/medicine/{id}','destroy');
});

Route::controller(NotificationController::class)->group(function(){
    Route::get('/notify','index');
    Route::post('/notify','store');
    Route::get('/notify/{id}','show');
    Route::patch('/notify/{id}','update');
    Route::delete('/notify/{id}','destroy');
});

Route::controller(OrderController::class)->group(function(){
    Route::get('/order','index');
    Route::post('/order','store');
    Route::get('/order/{id}','show');
    Route::patch('/order/{id}','update');
    Route::delete('/order/{id}','destroy');
});


Route::controller(OrderedDrugController::class)->group(function(){
    Route::get('/orderdrug','index');
    Route::post('/orderdrug','store');
    Route::get('/orderdrug/{id}','show');
    Route::patch('/orderdrug/{id}','update');
    Route::delete('/orderdrug/{id}','destroy');
});

Route::controller(PrescriptionController::class)->group(function(){
    Route::get('/prescription','index');
    Route::post('/prescription','store');
    Route::get('/prescription/{id}','show');
    Route::patch('/prescription/{id}','update');
    Route::delete('/prescription/{id}','destroy');
});


Route::controller(PrescriptionDrugController::class)->group(function(){
    Route::get('/prescriptiondrug','index');
    Route::post('/prescriptiondrug','store');
    Route::get('/prescriptiondrug/{id}','show');
    Route::patch('/prescriptiondrug/{id}','update');
    Route::delete('/prescriptiondrug/{id}','destroy');
});