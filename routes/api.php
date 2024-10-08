<?php
use App\Http\Controllers\EveningAzkarController;
use App\Http\Controllers\MorningAzkarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Morning Azkar
Route::get('/morning-azkars',[MorningAzkarController::class,'index']);
Route::get('/morning-azkars/decrement',[MorningAzkarController::class,'decrement']);
Route::get('/morning-azkars/reset-counts', [MorningAzkarController::class, 'resetAllAzkarCounts']);
Route::post('/morning-azkars/toggle-like', [MorningAzkarController::class, 'toggleLike']);
Route::get('/morning-azkars/liked', [MorningAzkarController::class, 'getLikedAzkar']);


//Evening Azkars
Route::get('evening-azkar',[EveningAzkarController::class,'index']);
Route::get('evening-azkar/decrement',[EveningAzkarController::class,'decrement']);
Route::get('evening-azkar/resetAllAzkarCounts',[EveningAzkarController::class,'resetAllAzkarCounts']);
Route::get('evening-azkar/getLikedAzkar',[EveningAzkarController::class,'getLikedAzkar']);
Route::get('evening-azkar/toggleLike',[EveningAzkarController::class,'toggleLike']);
