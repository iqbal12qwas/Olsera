<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//JAWABAN Nomor 2
//Pajak
Route::get('/read_pajak',  [App\Http\Controllers\PajakController::class, 'read_pajak'])->name('read_pajak');
Route::post('/create_pajak',  [App\Http\Controllers\PajakController::class, 'create_pajak'])->name('create_pajak');
Route::put('/update_pajak/{id}',  [App\Http\Controllers\PajakController::class, 'update_pajak'])->name('update_pajak');
Route::delete('/delete_pajak/{id}',  [App\Http\Controllers\PajakController::class, 'delete_pajak'])->name('delete_pajak');

//Item
Route::get('/read_item',  [App\Http\Controllers\ItemController::class, 'read_item'])->name('read_item');
Route::get('/read_item_by_id/{id}',  [App\Http\Controllers\ItemController::class, 'read_item_by_id'])->name('read_item_by_id');
Route::post('/create_item',  [App\Http\Controllers\ItemController::class, 'create_item'])->name('create_item');
Route::put('/update_item/{id}',  [App\Http\Controllers\ItemController::class, 'update_item'])->name('update_item');
Route::delete('/delete_item/{id}',  [App\Http\Controllers\ItemController::class, 'delete_item'])->name('delete_item');

//JAWABAN Nomor 3
Route::get('/read_data/{id}',  [App\Http\Controllers\ListDataItemController::class, 'read_data'])->name('read_data');