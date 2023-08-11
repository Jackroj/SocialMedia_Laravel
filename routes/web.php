<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([ 'prefix'=> '/idea', 'as' => 'idea.'], 
function(){
            // Route::post('/', [IdeaController::class, 'store'])->name('store');

            Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

            
            Route::group([ 'middleware' => ['auth']], function () {

                // Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

                // Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
    
                // Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
    
                Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');  
            });

        });

Route::Resource('idea', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::Resource('idea', IdeaController::class)->only(['show']);
