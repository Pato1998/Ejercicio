<?php

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

Route::get('/', 'EmpleadosController@index');
Route::get('/empleados', 'EmpleadosController@index')->name('empleados');
Route::get('/empleados/crear', 'EmpleadosController@create')->name('crearEmpleado');
Route::post('/empleados/guardar', 'EmpleadosController@store');
Route::get('/empleados/buscar', 'EmpleadosController@buscar')->name('buscarEmpleado');
Route::get('/empleados/promedio-edad', 'EmpleadosController@getPromedioEdad');

Route::get('especialidades/tipo-empleado/{id}', 'EspecialidadesController@getEspecialidadPorTipoEmpleado');