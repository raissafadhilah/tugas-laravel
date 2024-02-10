<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppModelController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template', function () {
    return view('template.master');
});

Route::get('/grafik', function () {
    return view('grafik');
});

Route::controller(SppModelController::class)->group(function () {
    Route::get('/spp', 'index')->name('spp.index');
    Route::get('/spp/create', 'create')->name('spp.create');
    Route::post('/spp', 'store')->name('spp.store');
    Route::get('/spp/edit/{id_spp}', 'edit')->name('spp.edit');
    Route::put('/spp/{id_spp}', 'update')->name('spp.update');
    Route::get('/spp/detail/{id_spp}', 'show')->name('spp.show');
    Route::delete('/spp/{id}', 'destroy')->name('spp.destroy');
});