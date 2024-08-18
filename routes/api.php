<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\ChatController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('article', function ()
{
    $articles= Article::paginate(2);
    return response()->json([
        'articles' => $articles,
        'numbers' => [1,2,3,4,5]
    ],200);
});
Route::resource('article', 'App\Http\Controllers\API\ArticleController', ['except'=> 'create', 'edit']);

Route::post('auth/register', 'App\Http\Controllers\API\AuthController@register');
Route::post('auth/login', 'App\Http\Controllers\API\AuthController@login');
Route::post('article/{id}/comments', 'App\Http\Controllers\API\ArticleController@storeCm');
Route::middleware('auth:api')->group(function ()
{
    Route::resource('auth/details', AuthController::class);
    Route::post('chat/history', 'App\Http\Controllers\API\ChatController@history');
    Route::get('chat/last_activity', 'App\Http\Controllers\API\ChatController@last_activity');
    Route::resource('chat', 'App\Http\Controllers\API\ChatController' );
});
/*Route::group(['middleware' => 'auth:api'], function(){
    Route::get('details', 'App\Http\Controllers\API\AuthController@details');
});*/
//Route::middleware('auth:api')->get('auth/details', 'App\Http\Controllers\API\AuthController@details');
/*Route::middleware('auth:api')->get('auth/details', function(Request $request) {
    return 'hiiiii';
});*/

