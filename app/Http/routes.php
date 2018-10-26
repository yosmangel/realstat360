<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Inicio de la aplicacion y Homepage
 */
Route::get('/',[
		'uses'	=>	'HomeController@index',
		'as'	=>	'home' 
		]);

//Cerrar Sesion
$this->get('logout', 'Auth\AuthController@logout');



Route::get('ingresar/{type?}',[
	'uses'	=>	'Auth\AuthController@showLoginForm',
	'as'	=>	'login' 
]);
Route::post('ingresar/{type?}',[
	'uses'		=>	'Auth\AuthController@login',
	'as'		=>	'login'
]);

// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

// ACTIVACION DE LA CUENTA VIA EMAIL
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')
	->name('user.activate');

/*  ************************
 	*** PANEL DE Administrativo ***
 	************************
*/

Route::group(['middleware' => ['auth']], function(){
	
	Route::resource('user', 'UserController');

	/**
	 * Rutas de inmueble
	 */

	Route::resource('inmuebles', 'InmueblesController');
	
	Route::get('inmuebles/extras/{id}',[
			'uses'	=> 'InmueblesController@extras',
			'as'	=> 'inmuebles.extras'
		]);
	Route::get('inmuebles/{id}/eliminar',[
			'uses'	=> 'InmueblesController@destroy',
			'as'	=> 'inmuebles.eliminar'
		]);
	Route::put('inmuebles/{idinmueble}/portada/{idimagen}',[
			'uses'	=> 'InmueblesController@portada',
			'as'	=> 'inmuebles.portada'
		]);
	Route::get('inmuebles/{id}/inmuima',[
			'uses'	=> 'InmueblesController@refresh',
			'as'	=> 'inmuebles.inmuima'
		]);
	Route::get('inmuebles/{id}/cliente',[
		'uses'	=> 'InmueblesController@refreshTCI',
		'as'	=> 'inmuebles.cliente'
		]);
	Route::get('inmuebles/ultimo',[
		'uses'	=> 'InmueblesController@ultimo_inmueble',
		'as'	=> 'inmuebles.ultimo'
		]);
	
	Route::get('lista', [
			'uses'	=> 'InmueblesController@lista',
			'as'	=> 'inmuebles.lista'
		]);
	Route::get('inmuebles/{id}/inmufile',[
			'uses'	=> 'InmueblesController@refreshfiles',
			'as'	=> 'inmuebles.inmufile'
		]);
	Route::resource('extras', 'ExtrasController');
	Route::resource('extrasdemandas', 'ExtrasDemandasController');
	Route::resource('internos', 'InternosController');

	Route::resource('agentes', 'AgentesController');
	Route::resource('promociones', 'PromocionesController');
	Route::resource('clientes','ClientesController');
	Route::get('clientes/{id}/inmuebles',[
		'uses'	=> 'ClientesController@inmuebles',
		'as'	=> 'clientes.inmuebles'
		]);
	Route::post('clientes/alta',[
		'uses'	=> 'ClientesController@alta_rapida',
		'as'	=> 'clientes.altarapida'
		]);
	Route::resource('acciones','AccionesController');
	Route::get('acciones/agenda/mostrar', [
			'uses'	=> 'AccionesController@agenda',
			'as'	=> 'acciones.agenda']
		);
	Route::resource('demandas','DemandasController');
	// Ruta para el enlace de inmuebles coincidentes que estan en la tabla de demandas
	// solo lanza la vista
	Route::get('demandas/inmuebles_coincidentes/{id}',[
		'uses'	=> 'DemandasController@mostrarInmueblesCoincidentes',
		'as'	=> 'demandas.inmuebles_coincidentes'
	]);
	// Desde demandas se determinan los inmuebles coincidentes (esta ruta se usa con ajax)
	Route::get('demandas/coincidentes/{id}',[
		'uses'	=> 'DemandasController@inmueblesCoincidentes',
		'as'	=> 'demandas.inmuebles.coincidentes'
	]);
	// Al crear Inmuebles  se determinan las demandas coincidentes
	Route::get('inmuebles/demandas_coincidentes/{parametro1}/{parametro2}',[
		'uses'	=> 'InmueblesController@match_demandas',
		'as'	=> 'inmuebles.demandas_coincidentes'
	]);
	// Desde la tabla Inmuebles, para el link a las demandas que conciden con cada inmueble
	Route::get('inmuebles/lista_demandas_coincidentes/{parametro1}/{parametro2}',[
		'uses'	=> 'InmueblesController@demandasCoincidentes',
		'as'	=> 'inmuebles.lista_demandas_coincidentes'
	]);

	Route::resource('archivos','ArchivosController');
	Route::resource('imagenes','ImagenesController');
	Route::get('/imagenes/{imagen}/descargar', 'ImagenesController@descargar')->name('imagenes.descargar');

	Route::get('buscar/',[
		'uses'	=> 'Buscador\AgenteInmuebleController@index',
		'as'	=> 'encuentra'
		]);

	Route::post('buscar/',[
		'uses'	=> 'Buscador\AgenteInmuebleController@index',
		'as'	=> 'encuentra'
		]);

	Route::post('buscar/cliente/email',[
		'uses'	=> 'ClientesController@findEmail',
		'as'	=> 'clientes.findEmail'
		]);
	Route::get('buscar/cliente/email',[
		'uses'	=> 'ClientesController@findEmail',
		'as'	=> 'clientes.findEmail'
		]);

	Route::post('buscar/cliente/telefono',[
		'uses'	=> 'ClientesController@findTel',
		'as'	=> 'clientes.findTel'
		]);
	Route::get('buscar/cliente/telefono',[
		'uses'	=> 'ClientesController@findTel',
		'as'	=> 'clientes.findTel'
		]);
	
});
	


//Registro

/*Route::get('registro/{type?}',[
	'uses'	=>	'Auth\AuthController@showRegistrationForm',
	'as'	=>	'register'
]);
Route::post('registro/{type?}',[
	'uses'	=>	'Auth\AuthController@register',
	'as'	=>	'register'
]);*/

	
/*
 * DEMANDA RAPIDA
*/
/*
Route::post('demanda_rapida/', [
	'uses' => 'DemandaRapidaController@store',
	'as'	=> 'demanda'
]);*/
		
/* CONTACT US */
/*Route::get('contactanos/', function(){
	return view('Homepage.contactanos');
})->name('contactanos');
Route::post('contactanos/', 'ContactanosController@sendContactMail')->name('contactanos');
*/		 

/*  ************************
 	*** PANEL DE DEMANDA ***
 	************************
 	* user_type = 2 *
*/
/*
Route::group(['middleware' => ['auth', 'demanda']], function(){
	Route::get('panel-demanda', [
		'uses'	=> 'PanelDemandaController@index',
		'as'	=> 'panel-demanda'
	]);
	Route::get('preferencias-demanda', [
		'uses'	=> 'PanelDemandaController@preferences',
		'as'	=> 'preferencias-demanda'
	]);
	Route::post('preferencias-demanda', [
		'uses'	=> 'PanelDemandaController@setPreferences',
		'as'	=> 'preferencias-demanda'
	]);
	Route::put('preferencias-demanda', [
		'uses'	=> 'PanelDemandaController@setPreferences',
		'as'	=> 'preferencias-demanda'
	]);

	
	/*
		Route::post('contactar-propietario/{inmuebles_id}/{usuario_id}',[
		'uses'	=> 'PanelDemandaController@askForStablishContact',
		'as'	=> 'contactar-propietario'
	]);
});*/

/*
	* Fin del Panel de DEMANDA
*/

/*  ******************************
 	*** PANEL DE PROPIETARIOS ***
 	******************************
 	* user_type = 0 *
*/ 
 /*
Route::group(['middleware' => ['auth', 'propietarios']], function(){ //'propietarios'
 	Route::get('panel-propietario', [
		'uses'	=> 'PanelPropietarioController@index',
		'as'	=> 'panel-propietario'
	]);
	// Its is a Property Create Formulary differente from the profesionals formulary for properties.
 	Route::get('inmuebles/crear-inmueble',[
			'uses'	=> 'PanelPropietarioController@createFromPropietary',
			'as'	=> 'inmuebles.crear-inmueble'
	]);
 	Route::post('inmuebles/guardar-inmueble',[
			'uses'	=> 'PanelPropietarioController@storeFromPropietary',
			'as'	=> 'inmuebles.guardar-inmueble'
	]);
	Route::post('inmuebles-eliminar/{id}',[
		'uses'	=> 'PanelPropietarioController@destroy',
		'as'	=> 'inmuebles-eliminar'
	]);
 	// PROPIETARIES PREFERENCES
 	Route::get('propietarios-preferencias', [
		'uses'	=> 'PanelPropietarioController@preferences',
		'as'	=> 'propietarios-preferencias'
	]);
	Route::post('preferencias-propietarios', [
		'uses'	=> 'PanelPropietarioController@setPreferences',
		'as'	=> 'preferencias-propietarios'
	]);
	Route::put('preferencias-propietarios', [
		'uses'	=> 'PanelPropietarioController@setPreferences',
		'as'	=> 'preferencias-propietarios'
	]);
	// PROPIETARY BLOGNOTE
	Route::get('propietario-agenda', [
		'uses'	=> 'AgendaController@index',
		'as'	=> 'propietario-agenda'
	]);
	Route::post('propietario-agenda-crear', [
		'uses'	=> 'AgendaController@store',
		'as'	=> 'propietario-agenda-crear'
	]);
	Route::post('propietario-agenda-eliminar/{id}', [
		'uses'	=> 'AgendaController@destroy',
		'as'	=> 'propietario-agenda-eliminar'
	]);
	// PROPIETARY GESTION COMERCIAL
	Route::get('propietario-gestion', function(){
		return view('Homepage.propietaries.comercial');
	})->name('propietarios-gestion-comercial');
 	/* 
		The menu options for edit property. Only avaylable for Propietaries
	
	Route::get('inmuebles-editar/{id}', [
		'uses'	=> 'PanelPropietarioController@editFromPropietary',
		'as'	=> 'inmuebles-editar'
		]);
	Route::post('inmuebles-actualizar/{id}', [
		'uses'	=> 'PanelPropietarioController@updateFromPropietary',
		'as'	=> 'inmuebles-actualizar'
		]);
	// PROPIETARY PROFILE
	Route::get('perfil', [
		'uses' 	=> 'UserController@showProfileForm',
		'as'	=> 'perfil'
	]);
	Route::post('perfil-actualizar/{id}', [
		'uses' 	=> 'UserController@updateProfile',
		'as'	=> 'perfil-actualizar'
	]);

	/*
		CONTACTOS PROPIETARIO-DEMANDANTE
	
	//Route::resource('contacto-propietario-demandante','ContactoController');
});*/

/*
	* Fin del Panel de PROPIETARIOS
**************************************************************************/ 


/*  ********************************
 	*** COMENTARIOS DE INMUEBLES ***
 	********************************
	Rutas de la seccion de preguntas sobre los inmuebles

 Route::group(['middleware' => 'auth'], function(){ 
	Route::resource('comentarios', 'ComentariosController');
});*/
/*
	* Fin de COMENTARIOS DE INMUEBLES
**************************************************************************/ 


/*  ******************************
 	*** PANEL DE PROFESIONALES ***
 	******************************
 	* user_type = 1 *
*/  
//Route::group(['middleware'=>['auth','profesionales']], function(){

	/* Rutas del Perfil de Usuario
	***********************/
	//Route::resource('user', 'UserController');

	/* Rutas del Inmueble
	***********************/
	/*Route::resource('inmuebles', 'InmueblesController');
	Route::get('inmuebles/extras/{id}',[
			'uses'	=> 'InmueblesController@extras',
			'as'	=> 'inmuebles.extras'
		]);
	Route::get('inmuebles/{id}/eliminar',[
			'uses'	=> 'InmueblesController@destroy',
			'as'	=> 'inmuebles.eliminar'
		]);
	Route::put('inmuebles/{idinmueble}/portada/{idimagen}',[
			'uses'	=> 'InmueblesController@portada',
			'as'	=> 'inmuebles.portada'
		]);
	Route::get('inmuebles/{id}/inmuima',[
			'uses'	=> 'InmueblesController@refresh',
			'as'	=> 'inmuebles.inmuima'
		]);
	Route::get('inmuebles/{id}/cliente',[
		'uses'	=> 'InmueblesController@refreshTCI',
		'as'	=> 'inmuebles.cliente'
		]);
	Route::get('inmuebles/ultimo',[
		'uses'	=> 'InmueblesController@ultimo_inmueble',
		'as'	=> 'inmuebles.ultimo'
		]);
	
	Route::get('lista', [
			'uses'	=> 'InmueblesController@lista',
			'as'	=> 'inmuebles.lista'
		]);
	Route::get('inmuebles/{id}/inmufile',[
			'uses'	=> 'InmueblesController@refreshfiles',
			'as'	=> 'inmuebles.inmufile'
		]);
	Route::resource('extras', 'ExtrasController');
	Route::resource('extrasdemandas', 'ExtrasDemandasController');
	Route::resource('internos', 'InternosController');
	
	Route::group(['middleware' => 'admin'], function(){
		Route::resource('agencias', 'AgenciasController');
	});

	Route::resource('agentes', 'AgentesController');
	Route::resource('promociones', 'PromocionesController');
	Route::resource('clientes','ClientesController');
	Route::get('clientes/{id}/inmuebles',[
		'uses'	=> 'ClientesController@inmuebles',
		'as'	=> 'clientes.inmuebles'
		]);
	Route::post('clientes/alta',[
		'uses'	=> 'ClientesController@alta_rapida',
		'as'	=> 'clientes.altarapida'
		]);
	Route::resource('acciones','AccionesController');
	Route::get('acciones/agenda/mostrar', [
			'uses'	=> 'AccionesController@agenda',
			'as'	=> 'acciones.agenda']
		);
	Route::resource('demandas','DemandasController');
	// Ruta para el enlace de inmuebles coincidentes que estan en la tabla de demandas
	// solo lanza la vista
	Route::get('demandas/inmuebles_coincidentes/{id}',[
		'uses'	=> 'DemandasController@mostrarInmueblesCoincidentes',
		'as'	=> 'demandas.inmuebles_coincidentes'
	]);
	// Desde demandas se determinan los inmuebles coincidentes (esta ruta se usa con ajax)
	Route::get('demandas/coincidentes/{id}',[
		'uses'	=> 'DemandasController@inmueblesCoincidentes',
		'as'	=> 'demandas.inmuebles.coincidentes'
	]);
	// Al crear Inmuebles  se determinan las demandas coincidentes
	Route::get('inmuebles/demandas_coincidentes/{parametro1}/{parametro2}',[
		'uses'	=> 'InmueblesController@match_demandas',
		'as'	=> 'inmuebles.demandas_coincidentes'
	]);
	// Desde la tabla Inmuebles, para el link a las demandas que conciden con cada inmueble
	Route::get('inmuebles/lista_demandas_coincidentes/{parametro1}/{parametro2}',[
		'uses'	=> 'InmueblesController@demandasCoincidentes',
		'as'	=> 'inmuebles.lista_demandas_coincidentes'
	]);

	Route::resource('archivos','ArchivosController');
	Route::resource('imagenes','ImagenesController');
	Route::get('/imagenes/{imagen}/descargar', 'ImagenesController@descargar')->name('imagenes.descargar');
	
	// Promociones
	Route::resource('promoimagenes','PromoimagenesController');
	// Rutas para refrescar con ajax las tablas de imagenes y documentos de la promocion
	Route::get('promoima/{id}',[
			'uses'	=> 'PromocionesController@refresh',
			'as'	=> 'promoima'
		]);
	Route::get('promofile/{id}',[
			'uses'	=> 'PromocionesController@refreshfiles',
			'as'	=> 'promofile'
		]);
	Route::get('buscar/',[
		'uses'	=> 'InmueblesController@buscarcp',
		'as'	=> 'buscar'
		]);
	Route::post('buscar/',[
		'uses'	=> 'InmueblesController@encuentra',
		'as'	=> 'encuentra'
		]);

	Route::post('maper', [
		'uses'	=> 'InmueblesController@getPropertiesLocation',
		'as'	=> 'maper'
		]);*/

//});
/*
	* Fin del Panel de PROFESIONALES
*/


