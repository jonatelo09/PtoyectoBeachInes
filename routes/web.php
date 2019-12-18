<?php
/*=============================================
=            RUTAS FRONT-END                 =
=============================================*/
Route::get('reservas-aprobadasusuario', 'ProductController@reservasAprobadas')->name('reservasAprobadasuser');
Route::name('print')->get('/imprimir/{id}/reporte', 'GeneradorController@imprimir');
Route::get('/', 'PaginaController@inicio')->name('inicio');
Route::get('/habitaciones', 'PaginaController@estandar')->name('habitaciones');
Route::get('/departamentos', 'PaginaController@departamento')->name('departamentos');
Route::get('/suites', 'PaginaController@suite')->name('suites');
Route::get('/bungalows', 'PaginaController@bungalow')->name('bungalows');
Route::get('/restaurante', 'PaginaController@restaurante')->name('restaurante');
Route::get('/servicios', 'PaginaController@servicio')->name('servicios');
Route::get('/galeria', 'PaginaController@galeria')->name('galeria');
Route::get('/ubicacion', 'PaginaController@ubicacion')->name('ubicacion');
Route::get('/reservaciones', 'PaginaController@reserva')->name('reservaciones');
Route::get('/puerto_escondido', 'PaginaController@puerto_escondido')->name('puerto_escondido');
Route::get('/contacto', 'PaginaController@contacto')->name('contacto');
Route::get('/iniciar', 'PaginaController@iniciar')->name('inicio_sesion');

/*=============================================
=            RUTAS FORMULARIO DE CONTACTO     =
=============================================*/

Route::post('contacto', 'ContactoController@store');

/*=============================================
=            RUTAS RESERVAS                   =
=============================================*/

Route::resource('reservas', 'ReservaController');
//Route::post('reservar-habitacion','ReservaController@reserva')->name('reservar.reserva');
Route::get('reservar', 'CartDetailController@compararfecha')->name('reservar-habitacion');
Route::post('reservarhabitacion', 'CartDetailController@compararfecha')->name('reservar');

Route::get('/cancelarre', function () {

	return redirect()->route('inicio')->with('cancelar', '¡Registro Cancelado!');

})->name('cancelarreserva');

//Route::get('/', 'TestController@welcome');
Route::post('/admin/aspirant', 'AspirantController@store')->name('mensaje');
Route::get('admin/mensajeria', 'AspirantController@index')->name('mensajeria');

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products-dos/{id}', 'ProductController@showdos');
Route::get('/categories-dos/{category}', 'CategoryController@showdos');

Route::get('reservas', 'CartDetailController@index')->name('reservas');
Route::post('/cart', 'CartDetailController@store')->name('cart');
Route::post('/cart/{id}/delete', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');
Route::resource('habitacionesadmin', 'HabitacionController');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('reservas-pendientes', 'ProductController@reservasPendientes')->name('reservasPendientes');
	Route::get('reservas-aprobadas', 'ProductController@reservasAprobadas')->name('reservasAprobadas');
	Route::get('/habitaciones', 'ProductController@index')->name('products'); //listado
	Route::get('/habitaciones_inactivas', 'ProductController@inactivo')->name('products.inactiva'); //listado
	Route::post('/habitaciones/{id}/activar', 'ProductController@activar')->name('products.activar'); //listado
	Route::get('/habitaciones/create', 'ProductController@create')->name('products.create'); //formulario
	Route::post('/habitaciones', 'ProductController@store')->name('products.store'); //registrar
	Route::get('/habitaciones/{id}/edit', 'ProductController@edit')->name('products.edit'); //formulario edicion
	Route::post('/habitaciones/{id}/edit', 'ProductController@update')->name('products.update'); //actualizar
	Route::post('/habitaciones/{id}/delete', 'ProductController@destroy')->name('products.destroy'); // form eliminar

	Route::get('/habitaciones/{id}/images', 'ImageController@index'); // mostrar las imagenes de cada producto
	Route::post('/habitaciones/{id}/images', 'ImageController@store');
	Route::delete('/habitaciones/{id}/images', 'ImageController@destroy');
	Route::get('/habitaciones/{id}/images/select/{image}', 'ImageController@select');

	//rutas de categorias
	Route::get('/category', 'CategoryController@index')->name('categories'); //listado
	Route::get('/category/create', 'CategoryController@create')->name('categories.create'); //formulario
	Route::post('/category', 'CategoryController@store')->name('categories.store'); //registrar
	Route::get('/category/{id}/edit', 'CategoryController@edit')->name('categories.edit'); //formulario edicion
	Route::post('/category/{id}/edit', 'CategoryController@update')->name('categories.update'); //actualizar
	Route::post('/category/{id}/delete', 'CategoryController@destroy')->name('categories.destroy'); // form eliminar

	//rutas de prices
	Route::get('prices', 'PriceController@index')->name('prices'); //listado
	Route::get('/prices/create', 'PriceController@create')->name('prices.create'); //formulario
	Route::post('/prices', 'PriceController@store')->name('prices.store'); //registrar
	Route::get('/prices/{price}/edit', 'PriceController@edit')->name('prices.edit'); //formulario edicion
	Route::post('/prices/{price}/edit', 'PriceController@update')->name('prices.update'); //actualizar
	Route::post('/prices/{price}/delete', 'PriceController@destroy')->name('prices.destroy'); // form eliminar

	//Route::post('/aspirant', 'AspirantController@store');
	Route::get('/aspirant', 'AspirantController@index');

	Route::get('/user', 'UserController@index')->name('users');
	Route::get('user/create', 'UserController@create')->name('users.create');
	Route::post('user', 'UserController@store')->name('users.store');
	Route::get('/user/{id}/edit', 'UserController@edit')->name('users.edit');
	Route::post('/user/{id}/edit', 'UserController@update')->name('users.update');
	Route::post('user/{user}/destroy', 'UserController@destroy')->name('users.destroy');
	Route::get('/profile', 'UserController@profile')->name('profile');

});

Route::get('payments', 'PaypalController@index');
Route::post('/payments/pay', 'PaymentController@pay')->name('pay');
Route::get('/payments/aprobada', 'PaymentController@aprobada')->name('aprobada');
Route::get('payments/cancelado', 'PaymentController@cancelado')->name('cancelado');
