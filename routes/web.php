<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\admin\MovieController as AdminMovieController;
/*
|-------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);
Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);

Route::get('/getPractice', [PracticeController::class, 'getPractice']);


Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');


Route::group([
    'as' => 'admin.movies.',
    'prefix' => 'admin'
],function(){
    Route::resource('movies', AdminMovieController::class, [
        'only' => ['index', 'create'],
        'names' => [
            'index'=> 'index',
            'create'=> 'create'
        ]
    ]);
    Route::post('movies/store', [AdminMovieController::class, 'store'])->name('store');
    Route::get('movies/{id}/edit', [AdminMovieController::class, 'edit'])->name('edit');
    Route::patch('movies/{id}/update',[AdminMovieController::class, 'update'])->name('update');
    Route::delete('movies/{id}/destroy', [AdminMovieController::class, 'destroy'])->name('delete');
});
