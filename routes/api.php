<?php

use Illuminate\Http\Request;
use App\Candy;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/candies', function() {
	return response()->json(Candy::all());
});

Route::put('/changeStock/{action}/{id}', function($action, $id) {
	$candy = Candy::findOrFail($id);
	($action === "add") ? $candy->stock++ : $candy->stock-- ;
	$candy->save();
	return $candy->stock;
});

Route::post('/createCandy', function(Request $request) {
	$new_candy = new Candy;
	$new_candy->name = $request->name;
	$new_candy->stock = $request->stock;
	$new_candy->save();
});