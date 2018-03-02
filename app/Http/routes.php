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

Route::get('/', function () {
    if(!Auth::check())
      return view('auth.login');
    else
      return view('welcome');
});

/*login routes*/
Route::get('login', ['as' => 'login', 'uses'=>'Auth\AuthController@getLogin']);
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('tipoactividad', 'TipoActividadController');
	Route::resource('red', 'RedController');
	Route::resource('empresa', 'EmpresaController');
		Route::get('printEmpresa/{id}',['as'=>'printEmpresa','uses'=>'EmpresaController@imprimir']);
	Route::resource('tipoempresa', 'TipoEmpresaController');
	Route::resource('departamento', 'DepartamentoController');
	Route::resource('empresapermiso', 'EmpresaPermisoController');
		Route::get('listEmpresaPermiso/{empresa}',['as'=>'listEmpresaPermiso','uses'=>'EmpresaPermisoController@index']);
		Route::get('newEmpresaPermiso/{empresa}',['as'=>'newEmpresaPermiso','uses'=>'EmpresaPermisoController@create']);
		Route::get('downloadEmpresaPermiso/{id}',['as'=>'downloadEmpresaPermiso','uses'=>'EmpresaPermisoController@download']);


	Route::resource('empresadocumento', 'EmpresaDocumentoController');
		Route::get('listEmpresaDocumento/{empresa}',['as'=>'listEmpresaDocumento','uses'=>'EmpresaDocumentoController@index']);
		Route::get('newEmpresaDocumento/{empresa}',['as'=>'newEmpresaDocumento','uses'=>'EmpresaDocumentoController@create']);
		Route::get('downloadEmpresaDocumento/{id}',['as'=>'downloadEmpresaDocumento','uses'=>'EmpresaDocumentoController@download']);

	Route::resource('usuario', 'UsuarioController');
		Route::get('showProfile/{usuario}','UsuarioController@showProfile');
    		Route::get('changePassword/{usuario}/{oldpassword}/{newpassword}','UsuarioController@changePassword');
	Route::resource('estadoformulario', 'EstadoFormularioController');
	Route::resource('formulario', 'FormularioController');
		Route::get('createFormulario/{tipo}',['as'=>'createFormulario','uses'=>'FormularioController@create']);
		Route::get('printFormulario/{id}',['as'=>'printFormulario','uses'=>'FormularioController@imprimir']);
		Route::post('cambiaEstadoFormulario',['as'=>'cambiaEstadoFormulario','uses'=>'FormularioController@cambiaEstado']);
		Route::get('descargarFormulario/{id}',['as'=>'descargarFormulario','uses'=>'FormularioController@descargar']);

	Route::resource('formulariodetalle', 'FormularioDetalleController');
		Route::get('listFormularioDetalle/{formulario}',['as'=>'listFormularioDetalle','uses'=>'FormularioDetalleController@index']);
		Route::post('saveFormularioDetalle',['as'=>'saveFormularioDetalle','uses'=>'FormularioDetalleController@store']);
		Route::get('deleteFormularioDetalle/{id}',['as'=>'deleteFormularioDetalle','uses'=>'FormularioDetalleController@destroy']);
		Route::get('updateFormularioDetalle/{id}',['as'=>'updateFormularioDetalle','uses'=>'FormularioDetalleController@update']);
	Route::resource('tipoproducto', 'TipoProductoController');
	Route::resource('unidadmedida', 'UnidadMedidaController');
	
	Route::resource('rol', 'RolController');

	/*CUERO*/
	Route::resource('informacionCuero', 'InformacionCueroController');
	Route::get('downloadTipoDocumento/{id}',['as'=>'downloadTipoDocumento','uses'=>'TipoDocumentoController@descargarDocumento']);
	
	Route::resource('cueroregional', 'CueroRegionalController');
	Route::post('saveAprovechamiento',['as'=>'saveAprovechamiento','uses'=>'CueroRegionalController@storeAprovechamiento']);
	Route::post('saveBeneficio',['as'=>'saveBeneficio','uses'=>'CueroRegionalController@storeBeneficio']);
	Route::post('saveCamposExtras',['as'=>'saveCamposExtras','uses'=>'CueroRegionalController@storeCamposExtras']);
	
	/*CUERO REGIONAL COMUNIDAD*/
	Route::resource('cueroregionalcomunidad', 'CueroRegionalComunidadController');
	
	/*CUERO REGIONAL APROVECHAMIENTO*/
	Route::resource('cueroregionalaprovechamiento', 'CueroRegionalAprovechamientoController');
	
	/*CUERO REGIONAL BENENFICIO*/
	Route::resource('cueroregionalbeneficio', 'CueroRegionalBeneficioController');
	

	/*REPORTES*/
	Route::get('reporte',['as'=>'reporte','uses'=>'ReporteController@index']);
	Route::resource('tiporeporte', 'TipoReporteController');
	Route::get('reportes',['as'=>'reportes','uses'=>'TipoReporteController@reporte']);
	Route::post('generaReporte',['as'=>'generaReporte','uses'=>'TipoReporteController@genera']);
	Route::post('generaReportEmpresa',['as'=>'generaReporteEmpresa','uses'=>'TipoReporteController@generaEmpresa']);

	/*REPORTES CUERO REGIONAL*/
		Route::get('printCueroRegional/{id}',['as'=>'printCueroRegional','uses'=>'CueroRegionalController@imprimir']);
});
	Route::get('tipodocumentoweb',['as'=>'descarga_documentos','uses'=>'TipoDocumentoController@indexWeb']);
	Route::get('downloadTipoDocumento/{id}',['as'=>'downloadTipoDocumento','uses'=>'TipoDocumentoController@descargarDocumento']);

