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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/threads', function () {
//     return response(ThreadResource::collection(Thread::get())->groupBy('type'));
// });
Route::post('/logout', '\App\Http\Controllers\AuthController@logout');
Route::post('/register', '\App\Http\Controllers\AuthController@register');
Route::post('/setBanner', '\App\Http\Controllers\BannerController@setBanner');
Route::get('/getBanner', '\App\Http\Controllers\BannerController@getBanner');
Route::post('/uploadDetails', '\App\Http\Controllers\RoomDetailsController@uploadDetails');
Route::get('/roomDetails', '\App\Http\Controllers\RoomDetailsController@getRoomDetails');
Route::post('/login', '\App\Http\Controllers\AuthController@login');
Route::post('me', '\App\Http\Controllers\AuthController@me');
Route::post('logout', '\App\Http\Controllers\AuthController@logout');
Route::post('editProfile', '\App\Http\Controllers\LoggedInUserController@editProfile');
Route::post('/checkRoom', '\App\Http\Controllers\BookedRoomController@checkRoom');
Route::post('/getRoomPrice', '\App\Http\Controllers\BookedRoomController@getRoomPrice');
Route::post('/pay', '\App\Http\Controllers\BookedRoomController@payNow');
Route::get('/transHistory', '\App\Http\Controllers\BookedRoomController@transHistory');
Route::get('/allBookings', '\App\Http\Controllers\BookedRoomController@allBookings');
Route::get('/myVists', '\App\Http\Controllers\BookedRoomController@myVisits');
Route::post('/verifyPay', '\App\Http\Controllers\BookedRoomController@verifyPayment');
