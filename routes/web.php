<?php

use App\Http\Controllers\Dashboad\SettingController;
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

//Route::get('/', function () {
//    return view('dashboard.index');
//});

//Route::prefix('dashboard')->group(function () {
//    Route::get('/settings', function () {
//        echo 'Settings';
//    })->name('dashboard.settings');
//});

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'middleware' => ['auth', 'CheckUserType']
], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('index');

    Route::get('/settings', function () {
        return view('dashboard.settings');
    })->name('settings');

    Route::post('/settings/update/{settings}', [SettingController::class, 'update'])
        ->name('settings.update');
});

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
})->name('home');
