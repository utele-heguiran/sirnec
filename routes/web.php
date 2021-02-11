<?php

Route::get('/', 'Seguridad\InicioController@index')->name('login');//formulario de logueo
Route::post('login_validacion', 'Seguridad\LoginController@login')->name('login_post'); //valida el usuario
Route::get('logout', 'Seguridad\LoginController@logout')->name('logout'); //cierre de secion

Route::get('home', 'Sirnec\UsuariosController@home')->name('home')->middleware('auth');// ya estando adentro
Route::View('/modelo', 'layouts.base.modelo')->name('modelo'); // modelo paginas
Route::View('/layout', 'layouts.sirnec')->name('layout'); // plantilla

/*llamados */
Route::get('getDepartamentos/{id}', 'Sirnec\LlamadosController@getDepartamentos')->middleware('auth');
Route::get('getMunucipios/{id}', 'Sirnec\LlamadosController@getMunucipios')->middleware('auth');
Route::get('getOficinas/{id}', 'Sirnec\LlamadosController@getOficinas')->middleware('auth');
Route::get('getOficinasregistraduria/{id}', 'Sirnec\LlamadosController@getOficinasregistraduria')->middleware('auth');
Route::get('getClaseoficinas/{id}', 'Sirnec\LlamadosController@getClaseoficinas')->middleware('auth');
Route::get('usuarios_list_pdf', 'Sirnec\LlamadosController@exportUsuariosPdf')->name('usuarios.pdf');
Route::get('usuarios_list_excel', 'Sirnec\LlamadosController@exportusuariosExcel')->name('usuarios.excel');
Route::get('getUsuarios/{id}', 'Sirnec\LlamadosController@getUsuarios')->middleware('auth');
Route::get('getLogin/{id}', 'Sirnec\LlamadosController@getLogin')->middleware('auth');
Route::get('getEmail/{id}', 'Sirnec\LlamadosController@getEmail')->middleware('auth');
Route::get('getBarrios/{id}', 'Sirnec\LlamadosController@getBarrios')->middleware('auth');
Route::post('importscr', 'Sirnec\LlamadosController@importscr')->name('importscr')->middleware('auth');
Route::get('getOficinasdes/{id}', 'Sirnec\LlamadosController@getOficinasdes')->middleware('auth');
Route::get('getFuncionariosofic/{id}', 'Sirnec\LlamadosController@getFuncionariosofic')->middleware('auth');
Route::get('getDevoluciones/{id}', 'Sirnec\LlamadosController@getDevoluciones')->middleware('auth');
Route::get('getOficin/{id}', 'Sirnec\LlamadosController@getOficin')->middleware('auth');
Route::post('importrechazos', 'Sirnec\LlamadosController@importrechazos')->name('importrechazos')->middleware('auth');
Route::get('getLote/{id}', 'Sirnec\LlamadosController@getLote')->middleware('auth');
Route::get('getAnulados/{id}', 'Sirnec\LlamadosController@getAnulados')->middleware('auth');
Route::get('getFaltantes/{id}', 'Sirnec\LlamadosController@getFaltantes')->middleware('auth');
Route::get('getAnuladosacta', 'Sirnec\LlamadosController@getAnuladosacta')->middleware('auth');
Route::get('getTipotramite/{id}', 'Sirnec\LlamadosController@getTipotramite')->middleware('auth');
Route::get('getValidadossts', 'Sirnec\LlamadosController@getValidadossts')->middleware('auth');
Route::get('getPosgrabacion', 'Sirnec\LlamadosController@getPosgrabacion')->middleware('auth');
Route::get('getFuncionario/{id}', 'Sirnec\LlamadosController@getFuncionario')->middleware('auth');
Route::get('getTitulos/{id}', 'Sirnec\LlamadosController@getTitulos')->middleware('auth');
Route::get('getCargo/{id}', 'Sirnec\LlamadosController@getCargo')->middleware('auth');
Route::get('getEspecificacioncargo/{id}', 'Sirnec\LlamadosController@getEspecificacioncargo')->middleware('auth');


/* usuarios */
Route::get('usuarios', 'Sirnec\UsuariosController@index')->name('usuarios')->middleware('administrador');
Route::post('usuarios_guardar', 'Sirnec\UsuariosController@store')->name('usuarios_guardar')->middleware('administrador');
Route::get('usuarios/{id}/editar', 'Sirnec\UsuariosController@edit')->name('usuarios_editar')->middleware('administrador');
Route::delete('usuarios/{id}', 'Sirnec\UsuariosController@eliminar')->name('usuarios_eliminar')->middleware('administrador');
Route::put('usuarios/{id}', 'Sirnec\UsuariosController@update')->name('usuarios_actualizar')->middleware('administrador');
Route::get('cambiocontrasena', 'Sirnec\UsuariosController@cambiocontrasena')->name('cambiocontrasena')->middleware('administrador');
Route::put('usuariosactualizar/{id}', 'Sirnec\UsuariosController@cambio')->name('usuarios_actualizar_password')->middleware('administrador');

/* Barrios */
Route::get('barrios', 'Sirnec\BarriosController@index')->name('barrios')->middleware('administrador');
Route::post('barrios_guardar', 'Sirnec\BarriosController@store')->name('barrios_guardar')->middleware('administrador');
Route::get('barrios/{id}/editar', 'Sirnec\BarriosController@edit')->name('barrios_editar')->middleware('administrador');
Route::delete('barrios/{id}', 'Sirnec\BarriosController@eliminar')->name('barrios_eliminar')->middleware('administrador');
Route::put('barrios/{id}', 'Sirnec\BarriosController@update')->name('barrios_actualizar')->middleware('administrador');

/* oficinas */
Route::get('oficinas', 'Sirnec\OficinasController@index')->name('oficinas')->middleware('administrador');
Route::post('oficinas_guardar', 'Sirnec\OficinasController@store')->name('oficinas_guardar')->middleware('administrador');
Route::get('oficinas/{id}/editar', 'Sirnec\OficinasController@edit')->name('oficinas_editar')->middleware('administrador');
Route::delete('oficinas/{id}', 'Sirnec\OficinasController@eliminar')->name('oficinas_eliminar')->middleware('administrador');
Route::put('oficinas/{id}', 'Sirnec\OficinasController@update')->name('oficinas_actualizar')->middleware('administrador');

/* titulosdeformacion */
Route::get('titulosdeformacion', 'Sirnec\TitulosdeformacionController@index')->name('titulosdeformacion')->middleware('administrador');
Route::post('titulosdeformacion_guardar', 'Sirnec\TitulosdeformacionController@store')->name('titulosdeformacion_guardar')->middleware('administrador');
Route::get('titulosdeformacion/{id}/editar', 'Sirnec\TitulosdeformacionController@edit')->name('titulosdeformacion_editar')->middleware('administrador');
Route::delete('titulosdeformacion/{id}', 'Sirnec\TitulosdeformacionController@eliminar')->name('titulosdeformacion_eliminar')->middleware('administrador');
Route::put('titulosdeformacion/{id}', 'Sirnec\TitulosdeformacionController@update')->name('titulosdeformacion_actualizar')->middleware('administrador');

/* scr */
Route::get('scr', 'Sirnec\ScrController@index')->name('scr')->middleware('administrador');

/* raft 29-30 */
Route::get('raft', 'Sirnec\RaftIdentificacionController@index')->name('raft')->middleware('registradores');
Route::post('raft_guardar', 'Sirnec\RaftIdentificacionController@store')->name('raft_guardar')->middleware('registradores');
Route::post('raft29', 'Sirnec\RaftIdentificacionController@update29')->name('raft_actualizar29')->middleware('registradores');
Route::post('raft30', 'Sirnec\RaftIdentificacionController@update30')->name('raft_actualizar30')->middleware('registradores');
Route::get('raft29/{id}', 'Sirnec\RaftIdentificacionController@raft29')->name('raft29')->middleware('registradores');
Route::get('raft30/{id}', 'Sirnec\RaftIdentificacionController@raft30')->name('raft30')->middleware('registradores');

/* funcionarios */
Route::get('funcionarios', 'Sirnec\FuncionariosController@index')->name('funcionarios')->middleware('talento');
Route::post('funcionarios_guardar', 'Sirnec\FuncionariosController@store')->name('funcionarios_guardar')->middleware('talento');
Route::get('funcionarios/{id}/editar', 'Sirnec\FuncionariosController@edit')->name('funcionarios_editar')->middleware('talento');
Route::put('funcionario/{id}', 'Sirnec\FuncionariosController@update')->name('funcionario_actualizar')->middleware('talento');
Route::get('funcionarios/{id}/estudios', 'Sirnec\FuncionariosController@cargeestudios')->name('funcionarios_estudios')->middleware('talento');
Route::get('getEstudios', 'Sirnec\FuncionariosController@getEstudios')->middleware('talento');
Route::get('funcionarios/{id}/familia', 'Sirnec\FuncionariosController@cargefamilia')->name('funcionarios_familia')->middleware('talento');
Route::post('funcionarios_certificacion', 'Sirnec\FuncionariosController@certificar')->name('funcionarios_certificacion')->middleware('talento');
Route::get('funcionariosfamilia/{id}/editar', 'Sirnec\FuncionariosController@editfamilia')->name('funcionarios_editar_familia')->middleware('talento');
Route::put('familiar/{id}', 'Sirnec\FuncionariosController@updatefamiliar')->name('familiar_actualizar')->middleware('talento');
Route::post('familiares_guardar', 'Sirnec\FuncionariosController@storefamiliares')->name('familiares_guardar')->middleware('talento');
Route::get('funcionarios/{id}/historialab', 'Sirnec\FuncionariosController@cargehistorialab')->name('funcionarios_historialab')->middleware('talento');
Route::post('historiaslaborales_guardar', 'Sirnec\FuncionariosController@storehistoriaslaborales')->name('historiaslaborales_guardar')->middleware('talento');
Route::get('funcionarioshistorialaboral/{id}/editar', 'Sirnec\FuncionariosController@edithistorialaboral')->name('funcionarios_editar_historialaboral')->middleware('talento');
Route::put('histlaboral/{id}', 'Sirnec\FuncionariosController@updatehistlaboral')->name('histlaboral_actualizar')->middleware('talento');
Route::get('estudios/{id}', 'Sirnec\FuncionariosController@destroy')->name('estudio_borrar')->middleware('talento');
Route::get('getBarrios', 'Sirnec\FuncionariosController@getBarrios')->middleware('talento');
//Route::get('getBarriosinput', 'Sirnec\FuncionariosController@getBarriosinput')->middleware('auth');
//Route::get('getFamiliares', 'Sirnec\FuncionariosController@getFamiliares')->middleware('auth');

/* despacho de material */
Route::get('despmaterial', 'Sirnec\DespachomaterialController@index')->name('despmaterial')->middleware('almacen');
Route::post('despmaterial_guardar', 'Sirnec\DespachomaterialController@store')->name('despmaterial_guardar')->middleware('almacen');
Route::get('despachomaterial/{id}', 'Sirnec\DespachomaterialController@despachomaterial')->name('despachomaterial')->middleware('almacen');

/* manejo de rechazos */
Route::get('rechazos', 'Sirnec\RechazosController@index')->name('rechazos')->middleware('registradores');
Route::get('rechazo/{id}/editar', 'Sirnec\RechazosController@edit')->name('rechazo_editar')->middleware('registradores');
Route::put('rechazo/{id}', 'Sirnec\RechazosController@update')->name('rechazo_actualizar')->middleware('registradores');

/* manejo de devoluciones acopio */
Route::get('devolucionesacopio', 'Sirnec\DevolucionesacopioController@index')->name('devolucionesacopio')->middleware('acopio');
Route::post('devolucionesacopio_guardar', 'Sirnec\DevolucionesacopioController@store')->name('devolucionesacopio_guardar')->middleware('acopio');
Route::post('oficiodevolucion', 'Sirnec\DevolucionesacopioController@oficiodevolucion')->name('oficiodevolucion')->middleware('acopio');
Route::get('generaroficiodevolucion/{id}', 'Sirnec\DevolucionesacopioController@generaroficiodevolucion')->name('generaroficiodevolucion')->middleware('acopio');
Route::post('raft06pdf', 'Sirnec\DevolucionesacopioController@raft06pdf')->name('raft06pdf')->middleware('acopio');
Route::post('devolucionacopio', 'Sirnec\DevolucionesacopioController@updatepath')->name('path_actualizar')->middleware('acopio');

/* manejo de devoluciones */
Route::get('devoluciones', 'Sirnec\DevolucionesController@index')->name('devoluciones')->middleware('registradores');
Route::get('devolucion/{id}/editar', 'Sirnec\DevolucionesController@edit')->name('devolucion_editar')->middleware('registradores');
Route::put('devolucion/{id}', 'Sirnec\DevolucionesController@update')->name('devolucion_actualizar')->middleware('registradores');

/* manejo de lotes acopio */
Route::get('lotesacopio', 'Sirnec\LotesacopioController@index')->name('lotesacopio')->middleware('acopio');
Route::post('lotesacopio_guardar', 'Sirnec\LotesacopioController@store')->name('lotesacopio_guardar')->middleware('acopio');
Route::post('raft04pdf', 'Sirnec\LotesacopioController@raft04pdf')->name('raft04pdf')->middleware('acopio');

/* manejo destruccion de material acopio */
Route::get('destruccionacopio', 'Sirnec\DestruccionacopioController@index')->name('destruccionacopio')->middleware('acopio');
Route::post('destruccionacopio_actualizar', 'Sirnec\DestruccionacopioController@update')->name('destruccionacopio_actualizar')->middleware('acopio');
Route::post('raft07pdf', 'Sirnec\DestruccionacopioController@raft07pdf')->name('raft07pdf')->middleware('acopio');

/* manejo de lotes registrales */
Route::get('lotesregistrales', 'Sirnec\LotesregistralesController@index')->name('lotesregistrales')->middleware('registradores');
Route::post('raft05pdf', 'Sirnec\LotesregistralesController@raft05pdf')->name('raft05pdf')->middleware('registradores');

/* manejo de STS acopio */
Route::get('stsacopio', 'Sirnec\StsacopioController@index')->name('stsacopio')->middleware('acopio');
Route::post('stsacopio_guardar', 'Sirnec\StsacopioController@store')->name('stsacopio_guardar')->middleware('acopio');
Route::post('raft08pdf', 'Sirnec\StsacopioController@raft08pdf')->name('raft08pdf')->middleware('acopio');

/* manejo de reprocesos acopio */
Route::get('reprocesosacopio', 'Sirnec\ReprocesosacopioController@index')->name('reprocesosacopio')->middleware('acopio');
Route::post('reproceso_guardar', 'Sirnec\ReprocesosacopioController@store')->name('reproceso_guardar')->middleware('acopio');
Route::post('raft41pdf', 'Sirnec\ReprocesosacopioController@raft41pdf')->name('raft41pdf')->middleware('acopio');

/* manejo de Bitacora acopio */
Route::get('bitacora', 'Sirnec\BitacoraacopioController@index')->name('bitacora')->middleware('acopio');
Route::post('bitacora_guardar', 'Sirnec\BitacoraacopioController@store')->name('bitacora_guardar')->middleware('acopio');
Route::post('raft42pdf', 'Sirnec\BitacoraacopioController@raft42pdf')->name('raft42pdf')->middleware('acopio');

/* manejo de posgrabaciones*/
Route::get('posgrabacion', 'Sirnec\PosgrabacionController@index')->name('posgrabacion')->middleware('registradores');
Route::post('posgrabacion_Guardar', 'Sirnec\PosgrabacionController@store')->name('posgrabacion_Guardar')->middleware('registradores');
Route::post('reporteposgrabacionespdf', 'Sirnec\PosgrabacionController@reporteposgrabacionespdf')->name('reporteposgrabacionespdf')->middleware('registradores');

/* manejo de produccion y envios*/
Route::get('produccion_envios', 'Sirnec\ProduccionenviosController@index')->name('produccion_envios')->middleware('acopio');
Route::post('produccion_envios_guardar', 'Sirnec\ProduccionenviosController@store')->name('produccion_envios_guardar')->middleware('acopio');
Route::post('raft10pdf', 'Sirnec\ProduccionenviosController@raft10pdf')->name('raft10pdf')->middleware('acopio');

/* manejo de produccion en espera*/
Route::get('produccion_espera', 'Sirnec\ProduccionesperaController@index')->name('produccion_espera')->middleware('acopio');
Route::post('produccion_espera_guardar', 'Sirnec\ProduccionesperaController@store')->name('produccion_espera_guardar')->middleware('acopio');
Route::post('raft11pdf', 'Sirnec\ProduccionesperaController@raft11pdf')->name('raft11pdf')->middleware('acopio');

/* informes  */
Route::get('informe', 'Sirnec\InformesController@index')->name('informe')->middleware('informes');
Route::post('informe_raft30pdf', 'Sirnec\InformesController@informe_raft30pdf')->name('informe_raft30pdf')->middleware('informes');
Route::post('informe_rechazospdf', 'Sirnec\InformesController@informe_rechazospdf')->name('informe_rechazospdf')->middleware('informes');
Route::post('informe_devolucionespdf', 'Sirnec\InformesController@informe_devolucionespdf')->name('informe_devolucionespdf')->middleware('informes');
Route::put('informe_rasra14pdf', 'Sirnec\InformesController@informe_rasra14pdf')->name('informe_rasra14pdf')->middleware('informes');
Route::put('informe_rasra13pdf', 'Sirnec\InformesController@informe_rasra13pdf')->name('informe_rasra13pdf')->middleware('informes');


/* contratos */
Route::get('contratos', 'Sirnec\ContratosController@index')->name('contratos')->middleware('talento');
Route::get('getCargos/{id}', 'Sirnec\ContratosController@getCargos')->middleware('talento');
Route::get('getFuncionariocontrato/{id}', 'Sirnec\ContratosController@getFuncionariocontrato')->middleware('talento');
Route::get('getGuardarcontrato', 'Sirnec\ContratosController@getGuardarcontrato')->middleware('talento');
Route::post('resolucionnombramientopdf', 'Sirnec\ContratosController@resolucionnombramientopdf')->name('resolucionnombramientopdf')->middleware('talento');
Route::get('getFuncionariocontratoactivo/{id}', 'Sirnec\ContratosController@getFuncionariocontratoactivo')->middleware('talento');
Route::post('actasdeposesion', 'Sirnec\ContratosController@actasdeposesion')->name('actasdeposesion')->middleware('talento');
Route::get('contrato/{id}', 'Sirnec\ContratosController@destroy')->name('contrato_borrar')->middleware('talento');
Route::get('imprimir/{id}', 'Sirnec\ContratosController@imprimiracta')->name('imprimir_acta')->middleware('talento');
Route::delete('contratocancelar/{id}', 'Sirnec\ContratosController@cancelarcontrato')->name('contrato_cancelar')->middleware('talento');

/*ubicaciones*/
Route::get('ubicaciones', 'Sirnec\UbicacionesController@index')->name('ubicaciones')->middleware('administrador');
Route::post('ubicaciones_Guardar', 'Sirnec\UbicacionesController@store')->name('ubicaciones_Guardar')->middleware('administrador');
Route::delete('ubicacion/{id}', 'Sirnec\UbicacionesController@eliminar')->name('ubicacion_eliminar')->middleware('administrador');






