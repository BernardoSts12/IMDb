<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\FilmeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\assessmentController;

Route::get('/', [FilmeController::class, 'index']);
Route::get('/filme/{id}', [FilmeController::class, 'show']);
Route::POST('/comment/{id}',[CommentController::class,'store'])->middleware();
Route::delete('/comment/{id}',[CommentController::class, 'destroy']);
Route::POST('/assessment/{id}',[assessmentController::class, 'store'])->middleware();



Route::middleware(['admin'])->group(function(){
    Route::get('/filme/create', function () {
        return view('filme.create');
    });
    
    Route::POST('/filme',[FilmeController::class, 'store']);
    Route::get('/admin', [FilmeController::class, 'dashboard']);
    Route::get('/filme/edit/{id}', [FilmeController::class, 'edit']);
    Route::put('/filme/update/{id}',[FilmeController::class, 'update']);
    Route::delete('/filme/{id}',[FilmeController::class, 'destroy']);
});
