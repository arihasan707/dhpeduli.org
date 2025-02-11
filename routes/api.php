<?php

use App\Http\Controllers\Admin\NotifHandlerPaymentController;
use App\Http\Controllers\admin\TesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('notif/webhook', NotifHandlerPaymentController::class);
