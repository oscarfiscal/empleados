<?php

use App\Models\Country;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('/empleados', EmpleadosController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
 Route::get('/ciudades/{id}', function($id)
{
	$pais_id = $id;
	$ciudades = Country::find($pais_id)->city;
  return response()->json($ciudades);
});
/* Route::get('dependent-dropdown', [EmpleadosController::class, 'index']);
Route::post('api/fetch-states', [EmpleadosController::class, 'fetchState']);
Route::post('api/fetch-cities', [EmpleadosController::class, 'fetchCity']); */