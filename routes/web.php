<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::resource('auth', 'LoginController');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/setting', function () {
    return view('setting.index');
});
/*Route::group(['prefix' => 'articles'], function () {
    Route::post('', 'App\Http\Controllers\ArticleController@store');
    Route::post('{id}/comments', 'App\Http\Controllers\ArticleController@storeCm');
    Route::get('create', 'App\Http\Controllers\ArticleController@create');
    Route::get('', 'App\Http\Controllers\ArticleController@index');
    Route::get('{id}/edit', 'App\Http\Controllers\ArticleController@edit');
    Route::put('{id}', 'App\Http\Controllers\ArticleController@update');
    Route::delete('{id}', 'App\Http\Controllers\ArticleController@destroy');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
Route::resource('chat', 'ChatController');
Route::resource('article', 'ArticleController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
