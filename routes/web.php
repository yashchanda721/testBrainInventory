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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chart1', function () {
    return view('donutchart');
})->name('chart1');

Route::get('chart1/data', 'App\Http\Controllers\ChartController@get_chart1_data')->name('chart1.data');

Route::get('/chart2', function () {
    return view('linechart');
})->name('chart2');

Route::get('chart2/data', 'App\Http\Controllers\ChartController@get_chart2_data')->name('chart2.data');
