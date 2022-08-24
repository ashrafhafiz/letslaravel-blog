<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
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
        return view('dashboard.settings.index');
    })->name('settings');

    Route::post('/settings/update/{settings}', [SettingController::class, 'update'])
        ->name('settings.update');

    Route::resources([
        'users' => UserController::class,
        'categories' => CategoryController::class
    ]);

    Route::get('/users/get_all', [UserController::class, 'getAllUsers'])
        ->name('users.get_all');
});

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
})->name('home');
