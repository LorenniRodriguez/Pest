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
Route::get('/', 'FrontEndController@home')->name('home');
// Route::get('/inicio', 'HomeController@index')->name('home');
Route::get('/acerca-de', 'FrontEndController@about')->name('about');
Route::get('/mascotas-desaparecidas', 'FrontEndController@gallery')->name('mascotas.desaparecidas');
Route::get('/blog', 'FrontEndController@blog')->name('blog');
Route::get('/post/{post}', 'FrontEndController@single')->name('single');
Route::get('/contacto', 'FrontEndController@contact')->name('contact');


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

	#proceso cita ruta
	Route::resource('vacunacion', 'CitaController');
	Route::post('vacunacion/buscar-vacunas', 'CitaController@buscarVacunas')->name('vacunacion.buscar_vacunas');
	Route::get('historico-vacunacion', 'CitaController@historico')->name('vacunacion.historico');

	#proceso hospedaje rutas
	Route::resource('hospedajes', 'HospedajeController');
    Route::get('historico-hospedajes', 'HospedajeController@historico')->name('hospedajes.historico');

    #proceso adopciones rutas
    Route::resource('cliente_mascota', 'ClienteMascotaController');
    Route::get('historico-adopciones', 'ClienteMascotaController@historico')->name('cliente_mascota.historico');
    Route::get('certificado/{id}', 'ClienteMascotaController@certificado')->name('cliente_mascota.certificado');
    

    #proceso servicios rutas
    Route::resource('mascota_servicio', 'MascotaServicioController');
    Route::get('historico-servicio', 'MascotaServicioController@historico')->name('mascota_servicio.historico');

    #proceso diagnostico rutas
    Route::resource('diagnosticos', 'DiagnosticoController');
    Route::get('consultar/historial-clinico-mascota', 'DiagnosticoController@consultar')->name('consultar_historial_clinico');
    Route::post('historial-clinico-mascota', 'DiagnosticoController@historialMascota')->name('historial_clinico');

    #graficos del sistema
    Route::get('graficos', 'GraficoController@index')->name('graficos.index');
    Route::post('graficos/consulta', 'GraficoController@consultar')->name('graficos.consultar');

    #ruta del blog
    Route::resource('posts', 'PostController');

    #ruta del blog / mascota desaparecida
    Route::resource('mascota_desaparecida', 'MascotaDesaparecidaController');
    

});



// // Route::get('/prueba', function () {

// // 	// dd(\App\Post::create([
// // 	// 	'titulo' => 'Nuevo Posts',
// // 	// 	'descripcion' => 'Esto es una prueba',
// // 	// 	'imagen' => 'imgjajajja'
 		
// // 	// ]));

// // 	// $mascota = App\Mascota::find(5);

// // 	// echo '<pre>';
// // 	// var_dump(
// // 	// 	\App\MascotaVacuna::whereRaw("estatus = 'A' and cast(fecha_registro as date) = ?", array(date('Y-m-d')))->get()
// // 	// );

// });