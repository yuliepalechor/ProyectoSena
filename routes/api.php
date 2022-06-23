<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\Perfilcontroller;
use App\Http\controllers\Lugarescontroller;
use App\Http\controllers\Eventoscontroller;
use App\Http\controllers\Usercontroller;


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

 //Route::get('/perfil',[Perfilcontroller::class,'index']);
 
 Route::get('/perfil',[Perfilcontroller::class,'index']);
 Route::get('/perfil/{id}',[Perfilcontroller::class,'show']);
 Route::post('/perfil', [Perfilcontroller::class,'store']);
 Route::put('perfil/{id}',[Perfilcontroller::class,'update']);
 Route::delete('perfil/{id}',[Perfilcontroller::class,'destroy']);


 Route::get('/lugares',[Lugarescontroller::class,'index']);
 Route::get('/lugares/{id}',[Lugarescontroller::class,'show']);
 Route::post('/lugares', [Lugarescontroller::class,'store']);
 Route::put('lugares/{id}',[Lugarescontroller::class,'update']);
 Route::delete('lugares/{id}',[Lugarescontroller::class,'destroy']);

 Route::get('/eventos',[Eventoscontroller::class,'index']);
 Route::get('/eventos/{id}',[Eventoscontroller::class,'show']);
 Route::post('/eventos', [Eventoscontroller::class,'store']);
 Route::put('eventos/{id}',[Eventoscontroller::class,'update']);
 Route::delete('eventos/{id}',[Eventoscontroller::class,'destroy']);




 Route::post('/registro',[Usercontroller::class,'register']);
