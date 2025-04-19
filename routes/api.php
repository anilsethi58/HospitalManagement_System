<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/addProduct',[ProductController::class,'addProduct']);
Route::get('/getProduct',[ProductController::class,'getProduct']);
Route::get('/fatchProduct/{id}',[ProductController::class,'fatchProduct']);
Route::put('/PutProduct/{id}',[ProductController::class,'PutProduct']);
Route::patch('/PatchProduct/{id}',[ProductController::class,'PatchProduct']);