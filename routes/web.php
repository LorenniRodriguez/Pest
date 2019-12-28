<?php

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

Auth::routes();
Route::get('/', 'FrontEndController@home');
Route::get('/about', 'FrontEndController@about');
Route::get('/gallery', 'FrontEndController@gallery');
Route::get('/blog', 'FrontEndController@blog');
Route::get('/contact', 'FrontEndController@contact');
Route::get('/home', 'HomeController@index')->name('home');


// rutas del backend
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
	
	#otras rutas
	Route::get('/dashboard', 'BackEndController@dashboard')->name('dashboard');
	
	# mascota ruta
	Route::resource('mascotas', 'MascotaController');
	Route::post('mascotas/restore/{mascota}', 'MascotaController@restore')->name('mascotas.restore');

	#colores ruta
	Route::resource('colores', 'ColorController');
	Route::post('colores/restore/{color}', 'ColorController@restore')->name('colores.restore');

	#jaula rutas
	Route::resource('jaulas', 'JaulaController');
	Route::post('jaulas/restore/{jaula}', 'JaulaController@restore')->name('jaulas.restore');

	#pais rutas
	Route::resource('paises', 'PaisController');
	Route::post('paises/restore/{pais}', 'PaisController@restore')->name('paises.restore');

	#provincia rutas
	Route::resource('provincias', 'ProvinciaController');
	Route::post('provincias/restore/{provincia}', 'ProvinciaController@restore')->name('provincias.restore');

	#raza rutas
	Route::resource('razas', 'RazaController');
	Route::post('razas/restore/{raza}', 'RazaController@restore')->name('razas.restore');

	#servicio rutas
	Route::resource('servicios', 'ServicioController');
	Route::post('servicios/restore/{servicio}', 'ServicioController@restore')->name('servicios.restore');

	#vacuna rutas
	Route::resource('vacunas', 'VacunaController');
	Route::post('vacunas/restore/{vacuna}', 'VacunaController@restore')->name('vacunas.restore');

	#cliente rutas
	Route::resource('clientes', 'ClienteController');
	Route::post('clientes/restore/{cliente}', 'ClienteController@restore')->name('clientes.restore');

	#proceso de vacuna rutas
	Route::get('consultar-mascota', 'MascotaVacunaController@consultar')->name('mascota_vacuna.consultar');
	Route::post('aplicar-vacuna', 'MascotaVacunaController@aplicar_vacuna')->name('mascota_vacuna.aplicar_vacuna');
	Route::post('mascota-vacuna/store', 'MascotaVacunaController@store')->name('mascota_vacuna.store');
	Route::delete('mascota-vacuna/destroy/{mascota_vacuna}', 'MascotaVacunaController@destroy')->name('mascota_vacuna.destroy');

	# cita ruta
	Route::resource('citas', 'CitaController');
	Route::post('citas/buscar-vacunas', 'CitaController@buscarVacunas')->name('citas.buscar_vacunas');
	Route::get('historico-citas', 'CitaController@historico')->name('citas.historico');
});



Route::get('/prueba', function () {

	/*dd(\App\Mascota::create([
		'nombre' => 'Colado',
		'peso' => '3 kg',
		'id_raza' => '2',
		'edad' => 65
	]));*/

	$mascota = App\Mascota::find(5);
	dd(
		\App\Cita::find(1)->atendidoPor->name
	);

});