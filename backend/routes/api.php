<?php

use App\Http\Controllers\NotaFiscalController;
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

Route::post('/nota-fiscal', [NotaFiscalController::class, 'store']);
Route::get('/nota-fiscal/{chave}', [NotaFiscalController::class, 'show']);
Route::get('/', function(){
    dd('estou sendo chamado');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
