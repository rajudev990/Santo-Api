<?php

use App\Http\Controllers\Api\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureAdminGuard;


Route::get('/test',function(){
    return response()->json('Okay');
});

Route::prefix('admin')->group(function () {
    Route::post('login', [AdminAuthController::class, 'login']);

    Route::middleware(['auth:sanctum', EnsureAdminGuard::class])->group(function () {
        Route::post('logout', [AdminAuthController::class, 'logout']);
        Route::get('dashboard', [AdminAuthController::class, 'dashboard']);


    });

});