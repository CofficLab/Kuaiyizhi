<?php

use App\Http\Controllers\Api\IdeaApiController;
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
| 请求这些API的时候，在header中设置
|    accept:application/json
|    Authorization: Bearer {Token}
|
 */

Route::middleware('auth:sanctum')->apiResource('ideas', IdeaApiController::class)->names([
    'update'  => 'ideas.api.update',
    'destroy' => 'ideas.api.destroy',
    'show'    => 'ideas.api.show',
    'index'   => 'ideas.api.index',
    'store'   => 'ideas.api.store',
]);

Route::middleware('auth:sanctum')->delete('ideas', [IdeaApiController::class, 'deleteMany']);
Route::middleware('auth:sanctum')->get('ideas/{idea}/children', [IdeaApiController::class, 'children']);
Route::middleware('auth:sanctum')->post('ideas/{idea}/sync', [IdeaApiController::class, 'sync']);
Route::middleware('auth:sanctum')->post('ideas/count', [IdeaApiController::class, 'count']);
