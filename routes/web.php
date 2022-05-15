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
Route::get('/', 'Controlador@paginaPrincipal')->name('Principal');
Route::get('/sobrenosotros', 'Controlador@SobreNosotros')->name('SobreNosotros');
Route::get('/servicios', 'Controlador@Servicios')->name('Servicios');
Route::get('/contacto', 'Controlador@Contacto')->name('Contacto');
Route::get('/MiCuenta', 'PagesController@MiCuenta')->name('MiCuenta');
Route::POST('/MiCuenta/EditarCuenta', 'PagesController@EditarCuenta')->name('EditarCuenta');
Route::get('MiCuenta/CitasReservadasTabla', 'PagesController@CitasReservadasTabla')->name('CitasReservadasTabla');
Route::GET('MiCuenta/EditarEstadoReservaCita/{id}', 'PagesController@EditarEstadoReservaCita')->name('EditarEstadoReservaCita');

Route::POST('/reservarcita', 'PagesController@ReservarCita')->name('ReservarCita');

Auth::routes();

Route::get('Administrador', 'PagesController@Administrador')->name('Administrador');
Route::get('Administrador/TablaCitas2', 'PagesController@TablaCitas2')->name('TablaCitas2');
Route::get('Administrador/CitasReservadasTabla3', 'PagesController@CitasReservadasTabla3')->name('CitasReservadasTabla3');

//////////////////////////////////////////  CAMBIO DE CONTRASEÑA ////////////////////////////////////////
Route::get('Administrador/Cambio_Contraseña', 'PagesController@Cambio_Contraseña')->name('Cambio_Contraseña');
Route::POST('Administrador/Cambio_Contraseña', 'PagesController@Cambio_Contraseña_Post')->name('Cambio_Contraseña_Post');
////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('Administrador/GestionDeUsuarios', 'PagesController@GestionDeUsuarios')->name('GestionDeUsuarios');
Route::get('Administrador/GestionDeUsuarios/Tabla', 'PagesController@TablaUsuarios')->name('TablaUsuarios');
Route::POST('Administrador/GestionDeUsuarios/Añadir', 'PagesController@Añadir_Usuario')->name('Añadir_Usuario');
Route::POST('Administrador/GestionDeUsuarios/Editar', 'PagesController@Editar_Usuario')->name('Editar_Usuario');
Route::POST('Administrador/GestionDeUsuarios/Cambio_Contraseña', 'PagesController@Contraseña_Usuario')->name('Contraseña_Usuario');
Route::GET('Administrador/GestionDeUsuarios/Editar_Estado/{id}', 'PagesController@Editar_Estado')->name('Editar_Estado');

////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('Administrador/GestionDePacientes', 'PagesController@GestionDePacientes')->name('GestionDePacientes');
Route::get('Administrador/GestionDePacientes/Tabla', 'PagesController@TablaPacientes')->name('TablaPacientes');
Route::get('Administrador/GestionDePacientes/TablaTratamientosPorPacientes', 'PagesController@TablaTratamientosPorPacientes')->name('TablaTratamientosPorPacientes');
Route::POST('Administrador/GestionDePacientes/Añadir', 'PagesController@Añadir_Paciente')->name('Añadir_Paciente');
Route::POST('Administrador/GestionDePacientes/Editar', 'PagesController@Editar_Paciente')->name('Editar_Paciente');
////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('Administrador/GestionDeTratamientos', 'PagesController@GestionDeTratamientos')->name('GestionDeTratamientos');
Route::get('Administrador/GestionDeTratamientos/Tabla', 'PagesController@TablaTratamientos')->name('TablaTratamientos');
Route::POST('Administrador/GestionDeTratamientos/Añadir', 'PagesController@Añadir_Tratamiento')->name('Añadir_Tratamiento');
Route::POST('Administrador/GestionDeTratamientos/Editar', 'PagesController@Editar_Tratamiento')->name('Editar_Tratamiento');
////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('Administrador/AsignarTratamientos', 'PagesController@AsignarTratamientos')->name('AsignarTratamientos');
Route::get('Administrador/AsignarTratamientos/Tabla', 'PagesController@TablaPacientes2')->name('TablaPacientes2');
Route::POST('Administrador/AsignarTratamientos/AsignarTratamiento', 'PagesController@Asignar_Tratamiento')->name('Asignar_Tratamiento');
////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('Administrador/HistorialDeTratamientos', 'PagesController@HistorialDeTratamientos')->name('HistorialDeTratamientos');
Route::get('Administrador/HistorialDeTratamientos/Tabla', 'PagesController@TablaHistorialDeTratamientos')->name('TablaHistorialDeTratamientos');
Route::GET('Administrador/HistorialDeTratamientos/Editar_EstadoTratamiento/{id}', 'PagesController@Editar_EstadoTratamiento')->name('Editar_EstadoTratamiento');
Route::get('Administrador/HistorialDeTratamientos/TablaPacientes', 'PagesController@TablaPacientes3')->name('TablaPacientes3');
Route::POST('Administrador/HistorialDeTratamientos/Editar', 'PagesController@Editar_TratamientoAsignado')->name('Editar_TratamientoAsignado');
////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('Administrador/GestionDeCitas', 'PagesController@GestionDeCitas')->name('GestionDeCitas');
Route::get('Administrador/GestionDeCitas/Tabla', 'PagesController@TablaCitas')->name('TablaCitas');
Route::get('Administrador/GestionDeCitas/TablaCitasPorPaciente', 'PagesController@TablaCitasPorPaciente')->name('TablaCitasPorPaciente');

Route::GET('Administrador/GestionDeCitas/Editar_EstadoCita/{id}', 'PagesController@Editar_EstadoCita')->name('Editar_EstadoCita');
Route::get('Administrador/GestionDeCitas/TablaHistorialDeTratamientos', 'PagesController@TablaHistorialDeTratamientos2')->name('TablaHistorialDeTratamientos2');
Route::POST('Administrador/GestionDeCitas/AsignarCita', 'PagesController@AsignarCita')->name('AsignarCita');
Route::POST('Administrador/GestionDeCitas/EditarAbonoCita', 'PagesController@EditarAbonoCita')->name('EditarAbonoCita');
Route::POST('Administrador/GestionDeCitas/EditarCita', 'PagesController@EditarCita')->name('EditarCita');
////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('Administrador/GestionDeReservaCitas', 'PagesController@GestionDeReservaCitas')->name('GestionDeReservaCitas');
Route::get('Administrador/GestionDeReservaCitas/CitasReservadasTabla2', 'PagesController@CitasReservadasTabla2')->name('CitasReservadasTabla2');
Route::get('Administrador/GestionDeReservaCitas/EditEstadoReservaCita/{id}', 'PagesController@EditEstadoReservaCita')->name('EditEstadoReservaCita');
Route::POST('Administrador/GestionDeReservaCitas/EditarReservaCita', 'PagesController@EditarReservaCita')->name('EditarReservaCita');











