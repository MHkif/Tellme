<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PodcastController;

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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('podcasts', PodcastController::class);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('checkToken', [AuthController::class, 'checkToken']);
    Route::post('logout',  [AuthController::class, 'logout']);
    Route::post('podcasts', [PodcastController::class, 'index']);

    Route::get('/streaming', [WebrtcStreamingController::class, 'index']);
    Route::get('/streaming/{streamId}', [WebrtcStreamingController::class, 'consumer']);
    Route::post('/stream-offer', [WebrtcStreamingController::class, 'makeStreamOffer']);
    Route::post('/stream-answer', [WebrtcStreamingController::class,'makeStreamAnswer']);

    Route::get('/agora-chat', 'App\Http\Controllers\AgoraVideoController@index');
    Route::post('/agora/token', 'App\Http\Controllers\AgoraVideoController@token');
    Route::post('/agora/call-user', 'App\Http\Controllers\AgoraVideoController@callUser');
});
