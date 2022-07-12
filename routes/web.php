<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('cars',[CarController::class, 'index'])->name('cars, index');
// Route::get('cars/create',[CarController::class, 'create']);
// Route::post('cars',[CarController::class, 'store']);
// Route::get('cars/{car}',[CarController::class, 'show']);
// Route::get('cars/{car}/edit',[CarController::class, 'edit']);
// Route::put('cars/{car}',[CarController::class, 'update']);
// Route::delete('cars/{car}',[CarController::class, 'destroy']);

// Route::get('/hello', function(){
//     return view('hello');
// }); 
// Route::get('/unicode', function(){
//     return view('form');
//     });
// Route::post('/unicode',function(){
// return 'Phuwong thuc post cuar path';
// });
// Route::patch('/unicode',function(){
//     return 'Phuwong thuc post cuar path';
//     });
// Route::match(['get','post'],'/unicode', function(){
//     return $_SERVER['REQUEST_METHOD'];
// }) ;

// Route::prefix('admin')->group(function(){
//     Route::get('/unicode/{id}', function($id){
//         $content= "Đây là huế";
//         $content.= "id = ".$id;
//         return $content;
//         });
//     Route::get("show-form",function(){
//         return view ('form');
//     });
    
// });
// Route::get('/calculate1', function(){
//     return view('calculate1');
// });
// Route::post('radioform',[RadioController::class,'Calculator'])->name('radioform.post');
Route::resource('cars', CarController::class);
Route::get('cars/{car}',[CarController::class, 'show']);
Route::get("/create", [CarController::class, "create"]);
Route::post("/store", [CarController::class, "store"]);
Route::get('{id}/edit', [CarController::class, "edit"]);
Route::post('/update/{id}', [CarController::class, "update"]);
Route::get('/delete/{id}', [CarController::class, "delete"]);