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

Route::put('/subtractToStock/{id}', function($id) {
	$candy = Candy::findOrFail($id);
	$candy->stock--;
	$candy->save();
	return $candy->stock;
});