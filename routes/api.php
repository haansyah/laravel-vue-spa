<?php

// use Illuminate\Http\Request;

use App\Http\Controllers\Notes\{NoteController, SubjectController};
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

Route::namespace('Notes')->group(function() {
    Route::prefix('notes')->group(function(){
        Route::post('create-new-note', [NoteController::class,'store']);
        Route::get('', [NoteController::class, 'index']);
        Route::get('{note:slug}', [NoteController::class, 'show'])->name('notes.show');
        Route::patch('{note:slug}/edit', [NoteController::class, 'update']);
        Route::delete('{note:slug}/delete', [NoteController::class, 'destroy']);
    });

    Route::prefix('subjects')->group(function(){
        Route::get('', [SubjectController::class,'index']);
    });
});
