<?php

use App\Http\Controllers\AdminProfileControler;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CitaController;
// use App\Http\Controllers\CitaController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\OdontogramaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RecordTreatmController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\HistorialTratamController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\TratamientoControler;
use App\Http\Controllers\UsuarioController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/', function () {
//      return view('auth.register');
//  });


// Route::get('/', function () {
//     return view('auth.login');
// })->middleware('auth');
// Route::middleware(['auth'])->group(function () {
//     Route::get('/', function () {
//         return view('home');
//     });
// //     Route::get('/home', [HomeController::class, 'index'])->name('home');    
// });

Route::get('/paciente/report', [PacienteController::class, 'report'])->name('paciente.reporte');

Route::resource('doctors', DoctorController::class);
Route::patch('user/update/{id}', [DoctorController::class, 'update_user'])->name('user.update');
// Route::get('/users/create/{doctor}', [UsuarioController::class, 'create'])->name('users.create');
// Route::post('users/{doctor}', [UsuarioController::class, 'store'])->name('users.store');

Route::get('/users/{id}/edit', [UsuarioController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UsuarioController::class, 'update'])->name('users.update');

Route::get('/paciente/list',[ PacienteController::class, 'list'])->name('paciente.list');
Route::get('/doctor/list',[ DoctorController::class, 'list'])->name('doctor.list');
Route::get('/tratamiento/list',[ TratamientoController::class, 'list'])->name('tratamiento.list');

Route::resource('/home', HomeController::class);
Route::get('/get-data', [HomeController::class, 'getData'])->name('event.datos');
Route::get('/event/{id}', [HomeController::class, 'show2'])->name('event.show2');
Route::delete('/event/{id}', [HomeController::class, 'destroy'])->name('event.delete');
Route::put('/event2/{id}', [HomeController::class, 'update'])->name('event.update');

//-----para restablecer las contraseñas
Route::get('password/reset', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');



Route::post('/home/guardar', [HomeController::class, 'guardar'])->name('home.guardar');
Route::get('/home/{id}', [HomeController::class, 'busca']);
// Route::post('/guardar', [HomeController::class, 'guardar'])->name('home.guardar');
// Route::get('/get-citas', [HomeController::class, 'getCitas']);

Route::resource('/paciente', PacienteController::class);

Route::resource('/doctor', DoctorController::class);
Route::get('/cita/listar', [CitaController::class, 'listar'])->name('cita.listar');

Route::resource('/usuario', UsuarioController::class);
Route::resource('/perfil', PerfilController::class);

Route::get('/users/{id}/edit', [PerfilController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [PerfilController::class, 'update'])->name('users.update');

Route::resource('/perfil', PerfilController::class);
Route::put('/perfil/{id}', [PerfilController::class, 'update'])->name('perfil.update');
Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit');
// Route::put('/update/perfil/{id}', [PerfilController::class, 'updateProfile'])->name('update.perfil');

Route::post('/profile/update-image', [PerfilController::class, 'updateImage'])->name('profile.updateImage');
Route::get('users/create', [UsuarioController::class, 'create'])->name('users.create');
Route::post('users', [UsuarioController::class, 'store'])->name('users.store');

Route::get('/doctor/{id}/imprimir', [DoctorController::class, 'imprimir'])->name('doctor.imprimir');
Route::get('/paciente/busqueda', [PacienteController::class, 'busqueda'])->name('paciente.busqueda');
Route::get('/historialtratam/buscar', [HistorialTratamController::class, "buscar"])->name("historialtratam.buscar");
// Route::get('/odontograma/buscar', [OdontogramaController::class, 'buscar'])->name('odontograma.buscar');
Route::get('/odontograma/buscar', [OdontogramaController::class, 'buscarPorCarnet'])->name('odontograma.buscar');
// Route::post('/odontograma/registrar-diente', [OdontogramaController::class, 'registrarDiente'])->name('odontograma.registrar');
Route::post('/odontograma/registrar', [OdontogramaController::class, 'registrarDiente'])->name('odontograma.registrar');
Route::post('/odontograma/registrar', [OdontogramaController::class, 'registrar'])->name('odontograma.registrar');
Route::delete('/odontograma/{id}', [OdontogramaController::class, 'eliminar'])->name('odontograma.eliminar');




// Route::resource('/auth', UsuarioController::class);
Route::get('/historial/reporteclinico/{id}/imprimir', [HistorialController::class, 'reporte'])->name('historialclinico.reporte');
Route::get('/historial/reportegeneral', [HistorialController::class, 'reportegen'])->name('historialclinico.reportegen');
Route::get('/tratamiento/reportegeneral', [HistorialTratamController::class, 'reportegen'])->name('historialtratam.reportegen');
Route::get('/tratamiento/reportetratam/{id}/imprimir', [HistorialTratamController::class, 'reporte'])->name('historialtratam.reporte');

Route::get('/pago/busca', [PagoController::class, 'busca'])->name('pago.busca');
Route::get('/pago/reportepago', [PagoController::class, 'reportepago'])->name('pago.reportepago');
Route::get('/pago/reporteboleta/{id}/imprimir', [PagoController::class, 'reporteboleta'])->name('pago.reporteboleta');
// Route::get('/historials/report', [RecordTreatmController::class, 'report'])->name('historials.reporte');

Route::resource('/pago', PagoController::class);
// Route::resource('/pagos', PagoController::class);
// Ruta para registrar el pago
Route::post('/pagos/{tratamientoPaciente}/registrar', [PagoController::class, 'registrarPago'])->name('pagos.registrarPago');

// Ruta para mostrar el formulario de registrar pago y la lista de pagos realizados
Route::get('/pagos/{historialTratamientoId}/registrar', [PagoController::class, 'mostrarPagos'])
    ->name('pagos.mostrarPagos');

Route::get('/cita/buscar', [CitaController::class, 'buscar'])->name('cita.buscar');

Route::get('pago/{id}/edit/pago', [PagoController::class, 'editPago'])->name('pago.editPago');
Route::put('pago/{id}/update/pago', [PagoController::class, 'updatePago'])->name('pago.updatePago');

Route::resource('/doctor', DoctorController::class);

Route::resource('/tratamiento', TratamientoController::class);

Route::resource('/cita', CitaController::class);
Route::delete('/citas/{id}/eliminar', [CitaController::class, 'eliminar'])->name('citas.eliminar2');
Route::put('/cita/{id}/cambiar-estado', [CitaController::class, 'cambiarEstado'])->name('citas.cambiar_estado');

Route::resource('/odontograma', OdontogramaController::class);
Route::get('/obtener-odontograma/{pacienteId}', [OdontogramaController::class, 'obtenerOdontograma'])->name('obtener.odontograma');
Route::get('/buscar-paciente', [OdontogramaController::class, 'buscarPaciente'])->name('buscar.paciente');

// Route::resource('/historials', RecordTreatmController::class);
Route::resource('/historialclinico', HistorialController::class);
Route::get('/historialclinico/search', [HistorialController::class, "search"])->name("historialclinico.search");


Route::resource('/historialtratam', HistorialTratamController::class);
Route::get('/historialtratam/{id}/buscapaciente', [HistorialTratamController::class, 'buscapaciente'])->name('historialtratam.buscapaciente');
Route::post('/historialtratam/sesion/{id}/registro', [HistorialTratamController::class, 'sesionregistro'])->name('historialtratam.sesionregistro');
Route::delete('/historialtratam/sesion/{id}/elimina', [HistorialTratamController::class, 'elimina'])->name('historialtratam.elimina');

Route::resource('/sesion', SesionController::class);
// Ruta para registrar el pago
Route::post('/sesion/{tratamientoPaciente}/registrar', [SesionController::class, 'registrarSesion'])->name('sesion.registrarSesion');


Route::post('/usuario/editar', [AdminProfileControler::class, "update"])->name("usuario.update");
Route::get('adminlte_image', [AdminProfileControler::class, "dminlte_image"])->name("adminlte_image");

Auth::routes();
