<?php

// use Illuminate\Http\Request;

use App\Http\Controllers\Posts\PostController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('posts')->namespace('Posts')->group(function() {
    Route::post('create-new-post', [PostController::class,'store']);
    Route::get('create-new-post', [PostController::class,'index']);
});
