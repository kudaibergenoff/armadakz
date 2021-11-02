<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Catalog\CatalogController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/pay/result', function(Request $request) {
    file_put_contents('file.txt', json_encode($request->all()));
});

Route::get('catalogs/{id}', [CatalogController::class, 'get']);


