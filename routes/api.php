<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

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
// Route::get('/user', [CommentController::class, 'auth']);
// Route::apiResource('commentaire', CommentController::class);

Route::middleware('auth:sanctum')->group(function () {
    // Routes protégées nécessitant une authentification basée sur les jetons d'API
    Route::apiResource('commentaire', CommentController::class);

    // Autres routes protégées
});
// 
