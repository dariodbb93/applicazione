<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;


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

Route::get('/', [PublicController:: class, 'index'])->name('index');
Route::get('/salvaContatto', [PublicController:: class, 'salvaContatto'])->name('salvaContatto');
Route::post('/storageContact', [PublicController:: class, 'storageContact'])->name('storageContact');
Route::delete('/destroy/{order}', [PublicController:: class, 'destroy'])->name('destroy');
Route::get('/creaOrdine', [PublicController:: class, 'creaOrdine'])->name('creaOrdine');
Route::post('/storageOrder', [PublicController:: class, 'storageOrder'])->name('storageOrder');
Route::get('/view', [PublicController:: class, 'view'])->name('view');
Route::get('/riepilogo', [PublicController:: class, 'riepilogo'])->name('riepilogo');
Route::post('/getContactDetails', [PublicController:: class, 'getContactDetails'])->name('getContactDetails');
Route::get('/export{order}', [PublicController:: class, 'export'])->name('export');
Route::put('/updateOrder/{order}', [PublicController:: class,  'updateOrder'])->name('updateOrder');
Route::get('/edit/{order}', [PublicController:: class, 'edit'])->name('edit');
Route::post('/note', [PublicController:: class, 'note'])->name('note');



