<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/showcar', [CarController::class,'showcar']);
// Route::post('/showcar', [CarController::class,'store']);
Route::get('showdetail/{id}',[CarController::class, "show"]);
Route::get("/create", [CarController::class, "create"]);
Route::post("/store", [CarController::class, "store"]);
// Route::get('{id}/edit', [CarController::class, "edit"]);
Route::post('/update/{id}', [CarController::class, "update"]);
Route::delete('/delete/{id}', [CarController::class, "delete"]);
Route::get('/manu',[CarController::class, "manufacturer"]);
Route::get('/show', [CarController::class, 'search']);



