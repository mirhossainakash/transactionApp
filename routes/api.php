<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\transaction\MockController;
use App\Http\Controllers\transaction\CallbackController;
use App\Http\Controllers\transaction\TransactionController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('mock', [MockController::class, 'mockResponse']);
Route::patch('updateTransaction/{transaction_id}', [CallbackController::class, 'updateTransaction']);
Route::post('doTransaction', [TransactionController::class, 'doTransaction'])->middleware('validate.transaction');
