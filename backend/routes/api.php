<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReviewController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('prueba', function(){
    echo "Hola";
});

//ruta rest para el cambio de estados de los bootcamps
Route::apiResource('bootcamps', BootcampController::class);

//ruta rest para el cambio de estados de los course
Route::apiResource('courses', CourseController::class);

//ruta rest para el cambio de estados de los courser
Route::apiResource('reviews', ReviewController::class);
