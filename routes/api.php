<?php

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\TestAPI as UserResource;
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

// Route::get('/user', function (Request $request) {
//     return new UserResource(User::find(1);
// });
// Route::get('/user', function (Request $request) {
//     return new UserResource(Product::all());
// });
Route::get('user','apiController@showItem');