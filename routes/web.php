<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\admin\MovieController as AdminMovieController;
use App\Http\Controllers\admin\ReservationController as AdminReservationController;
use App\Http\Controllers\admin\ScheduleController as AdminScheduleController;
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

Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);

Route::get('/sheets', [SheetController::class, 'index'])->name('sheets.index');
Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');

Route::group([
    'as' => 'movies.',
    'prefix' => 'movies'
], function(){
    Route::resource('', MovieController::class, [
        'only' => ['index'],
        'names' => [
            'index' => 'index',
        ]
    ]);
    Route::get('/{id}', [MovieController::class, 'show'])->name('show');
    Route::get('/{id}/schedules/{schedule_id}/sheets', [MovieController::class, 'show_sheets'])->name('show.sheets');
    Route::get('/{id}/schedules/{schedule_id}/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
});


Route::group([
    'as' => 'admin.',
    'prefix' => 'admin'
],function(){

    Route::group([
        'as' => 'movies.',
        'prefix' => 'movies'
    ], function(){
        Route::resource('', AdminMovieController::class, [
            'only' => ['index', 'create'],
            'names' => [
                'index'=> 'index',
                'create'=> 'create'
            ]
        ]);
        Route::get('/{id}', [AdminMovieController::class, 'show'])->name('show');
        Route::post('store', [AdminMovieController::class, 'store'])->name('store');
        Route::get('{id}/edit', [AdminMovieController::class, 'edit'])->name('edit');
        Route::patch('{id}/update',[AdminMovieController::class, 'update'])->name('update');
        Route::delete('{id}/destroy', [AdminMovieController::class, 'destroy'])->name('delete');

        Route::get('{id}/schedules/create', [AdminScheduleController::class, 'create'])->name('schedule.create');
        Route::post('{id}/schedules/store', [AdminScheduleController::class, 'store'])->name('schedule.store');
    });


    Route::group([
        'as' => 'schedules.',
        'prefix' => 'schedules'
    ], function(){
        Route::resource('', ScheduleController::class, [
            'only' => ['index'],
            'names' => ['index'=> 'index']
        ]);
        Route::get('/{id}/edit', [ScheduleController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update',[ScheduleController::class, 'update'])->name('update');
        Route::delete('{id}/destroy', [ScheduleController::class, 'destroy'])->name('delete');
    });


    Route::group([
        'as' => 'reservations.',
        'prefix' => 'reservations'
    ], function(){
        Route::resource('', AdminReservationController::class, [
            'only' => ['index', 'create'],
            'name' => ['index' => 'index', 
                    'create' => 'create']
        ]);
        Route::get('/{id}', [AdminReservationController::class, 'show'])->name('show');
        Route::post('store', [AdminReservationController::class, 'store'])->name('store');
        Route::get('{id}/edit', [AdminReservationController::class, 'edit'])->name('edit');
        Route::patch('{id}',[AdminReservationController::class, 'update'])->name('update');
        Route::delete('{id}', [AdminReservationController::class, 'destroy'])->name('delete');
    });

});
