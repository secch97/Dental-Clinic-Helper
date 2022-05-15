<?php
/*
================================================
            UNIVERSIDAD DON BOSCO
        DPTO. SISTEMAS DE INFORMACIÓN                      
================================================
////////////////////////////////////////////////
================================================
Nombre del archivo: [Nombre del archivo].[extensión]
Nombre del proyecto: [Nombre del proyecto]
Módulo: [Módulo del proyecto al que pertenece el archivo]

Descripción:
[Descripción general de la funcionalidad del código presente en este archivo]

Notas:
[Insertar aquí cualquier comentario relacionado al archivo, como por ejemplo una aclaración]

Historial de revisión:
Fecha                 Autor                                                Descripción                    
[dd/mm/año]     [Primer nombre] [Primer apellido]     [Cambios realizados]
[dd/mm/año]     [Primer nombre] [Primer apellido]     [Cambios realizados]       
[dd/mm/año]     [Primer nombre] [Primer apellido]     [Cambios realizados]       
. . .      
*/

namespace App\Http\Controllers;

use App\Cita;
use App\Paciente;
use App\Plandetratamiento;
use App\Reservacita;
use App\Tratamiento;
use App\User;
use Auth;
use Carbon\Carbon;
use DataTables;
use DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function ReservarCita(Request $request)
    {
        $idUsuarioReserva = $request->input('idUserReserva');
        $telefonoReservaCita = $request->input('telefonoReservaCita');
        $direccionReservaCita = $request->input('direccionReservaCita');
        $fechaReservaCita = $request->fechaReservaCita;
        $horaReservaCita = $request->horaReservaCita;
        $descripcionReservaCita = $request->input('descripcionReservaCita');

        $datos = DB::table('reservacitas')->insert([
            'User_id' => $idUsuarioReserva,
            'telefonoReservaCita' => $telefonoReservaCita,
            'direccionReservaCita' => $direccionReservaCita,
            'fechaReservaCita' => $fechaReservaCita,
            'horaReservaCita' => $horaReservaCita,
            'descripcionReservaCita' => $descripcionReservaCita,
        ]);
        Toastr()->success('¡La reserva de cita ha sido enviada!', '¡Aviso!');
        return redirect()->back();
    }

    public function MiCuenta()
    {

        return view('MiCuenta');
    }

    public function EditarCuenta(Request $request)
    {
        $nombreUsuario = $request->input('nombreUsuario');
        $usuario = $request->input('usuario');
        $emailUsuario = $request->input('emailUsuario');

        DB::table('users')
            ->where('User_id', Auth::User()->User_id)
            ->update([
                'nombre' => $nombreUsuario,
                'usuario' => $usuario,
                'email' => $emailUsuario,
            ]);
        Toastr()->success('¡Datos Actualizados!', '¡Aviso!');
        return redirect()->back();
    }

    public function CitasReservadasTabla()
    {
        $reservaCitas = Reservacita::join('users', 'users.User_id', '=', 'reservacitas.User_id')
            ->select(['users.*', 'reservacitas.*'])
            ->where('users.User_id', Auth::User()->User_id);
        return DataTables::of($reservaCitas)
            ->addColumn('estadoReservaCita', function ($reservaCitas) {
                return view('Botones_EstadoReservaCita', compact('reservaCitas'))->render();
            })
            ->addColumn('action', function ($reservaCitas) {
                return view('Botones_ReservaCita', compact('reservaCitas'))->render();
            })
            ->rawColumns(['estadoReservaCita', 'action'])
            ->make(true);
    }

    public function EditarEstadoReservaCita($id)
    {

        $Estado = DB::table('reservacitas')->select('estadoReservaCita')->where('reservaCitas_id', $id)->get();

        if ($Estado[0]->estadoReservaCita == 1) {
            DB::table('reservacitas')
                ->where('reservaCitas_id', $id)
                ->update(['estadoReservaCita' => 4]);
            Toastr()->success('¡La reservación de la cita ha sido cancelada!', '¡Aviso!');
            return redirect()->back();
        } else if ($Estado[0]->estadoReservaCita == 2) {
            DB::table('reservacitas')
                ->where('reservaCitas_id', $id)
                ->update(['estadoReservaCita' => 4]);
            Toastr()->success('¡La reservación de la cita ha sido cancelada!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function Administrador()
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {
            $citasPendientes = DB::table('citas')
                ->where('estadoCita', 1)
                ->count('citas_id');
            $citasCompletadas = DB::table('citas')
                ->where('estadoCita', 3)
                ->count('citas_id');
            $citasCanceladas = DB::table('citas')
                ->where('estadoCita', 4)
                ->count('citas_id');
            $reservaCitasPendientes = DB::table('reservacitas')
                ->where('estadoReservaCita', 1)
                ->count('reservaCitas_id');
            $reservaCitasCompletadas = DB::table('reservacitas')
                ->where('estadoReservaCita', 3)
                ->count('reservaCitas_id');
            $reservaCitasCanceladas = DB::table('reservacitas')
                ->where('estadoReservaCita', 4)
                ->count('reservaCitas_id');
            $tratamientos = Tratamiento::orderBy('nombreTratamiento', 'asc')->get();
            $costototal = DB::table('plandetratamientos')
                ->where('estado', 1)
                ->orWhere('estado', 2)
                ->sum('costoTotal');
            $ingresos = DB::table('plandetratamientos')
                ->sum('abonoTratamiento');
            $saldos = DB::table('plandetratamientos')
                ->where('estado', 1)
                ->orWhere('estado', 2)
                ->sum('saldoTratamiento');
            $activos = DB::table('plandetratamientos')
                ->where('estado', 1)
                ->count('plandetratamientos_id');
            $finalizados = DB::table('plandetratamientos')
                ->where('estado', 2)
                ->count('plandetratamientos_id');
            $cancelados = DB::table('plandetratamientos')
                ->where('estado', 3)
                ->count('plandetratamientos_id');
            return view('Administrador', compact('citasPendientes', 'citasCompletadas', 'citasCanceladas', 'reservaCitasPendientes', 'reservaCitasCompletadas', 'reservaCitasCanceladas',
                'tratamientos', 'costototal', 'ingresos', 'saldos', 'activos', 'finalizados', 'cancelados'));
        }
    }

    public function Cambio_Contraseña()
    {
        return view('Cambio_Contraseña');
    }

    public function Cambio_Contraseña_Post(Request $request)
    {
        $Contraseña = $request->input('password');
        $Confirmar_Contraseña = $request->input('password_confirm');
        if ($Contraseña != $Confirmar_Contraseña) {
            Toastr()->error('¡Las contraseñas no coinciden!', '¡Aviso!');
            return redirect()->back();
        } else {
            DB::table('users')
                ->where('User_id', Auth::User()->User_id)
                ->update(['password' => bcrypt($Contraseña)]);
            Toastr()->success('¡La contraseña ha sido actualizada!', '¡Aviso!');
            return redirect()->back();
        }
        return view('Cambio_Contraseña');
    }

    public function GestionDeUsuarios()
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {

            return view('GestionDeUsuarios');
        }
    }

    public function TablaUsuarios()
    {
        $usuarios = User::join('roles', 'users.Role_id', '=', 'roles.Role_id')
            ->select(['users.*', 'roles.*']);
        return DataTables::of($usuarios)
            ->addColumn('estado', function ($usuarios) {
                return view('Boton_Estados', compact('usuarios'))->render();
            })

            ->addColumn('action', function ($usuarios) {
                return view('Botones_Usuario', compact('usuarios'))->render();
            })
            ->rawColumns(['action', 'estado'])
            ->make(true);
    }

    public function Añadir_Usuario(Request $request)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {

            $Nombre = $request->input('nombre');
            $Usuario = $request->input('usuario');
            $Tipo = $request->tipo;
            $Correo = $request->input('correo');
            $Contraseña = $request->input('password');

            $condicion1 = DB::table('users')->where('usuario', $Usuario)->count();

            if ($condicion1 > 0) {
                Toastr()->error('¡El nombre de usuario que desea registrar ya se encuentra en uso!', '¡Aviso!');
                return redirect()->back()->with('error_code', 5);
            }

            $datos = DB::table('users')->insert([
                'Role_id' => $Tipo,
                'email' => $Correo,
                'nombre' => $Nombre,
                'usuario' => $Usuario,
                'password' => bcrypt($Contraseña),
            ]);
            Toastr()->success('¡El usuario ha sido registrado!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function Editar_Usuario(Request $request)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {
            $Id = $request->input('id');
            $Nombre = $request->input('nombre');
            $Usuario = $request->input('usuario');
            $Correo = $request->input('correo');
            $Tipo = $request->tipo2;
            $Estado = $request->estado;
            $condicion1 = DB::table('users')->where('usuario', $Usuario)->count();

            if ($condicion1 > 0) {
                $condicion2 = DB::table('users')->select('User_id')->where('usuario', $Usuario)->get();
                if ($condicion2[0]->User_id != $Id) {
                    Toastr()->error('¡El nombre de usuario que ha elegido ya se encuentra en uso!', '¡Aviso!');
                    return redirect()->back();
                }
            }

            DB::table('users')
                ->where('User_id', $Id)
                ->update(['Role_id' => $Tipo, 'nombre' => $Nombre, 'usuario' => $Usuario,
                    'email' => $Correo, 'estado' => $Estado]);

            Toastr()->success('¡El usuario ha sido actualizado!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function Contraseña_Usuario(Request $request)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {
            $Id = $request->input('id');
            $Contraseña = $request->input('password');

            DB::table('users')
                ->where('User_id', $Id)
                ->update(['password' => bcrypt($Contraseña)]);

            Toastr()->success('¡La contraseña ha sido actualizada!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function Editar_Estado($id)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {
            $Estado = DB::table('users')->select('estado')->where('User_id', $id)->get();

            if ($Estado[0]->estado == 0) {
                DB::table('users')
                    ->where('User_id', $id)
                    ->update(['estado' => 1]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            } else {
                DB::table('users')
                    ->where('User_id', $id)
                    ->update(['estado' => 0]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            }
        }
    }

    public function GestionDePacientes()
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {

            return view('GestionDePacientes');
        }
    }

    public function TablaPacientes()
    {
        $pacientes = Paciente::query();
        return DataTables::of($pacientes)
            ->addColumn('action', function ($pacientes) {
                return view('Botones_Paciente', compact('pacientes'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function TablaTratamientosPorPacientes(Request $request)
    {
        $usuario = $request->input('usuario');
        $tratamientos = Plandetratamiento::join('pacientes', 'pacientes.paciente_id', '=', 'plandetratamientos.paciente_id')
            ->join('tratamientos', 'tratamientos.tratamiento_id', '=', 'plandetratamientos.tratamiento_id')
            ->join('users', 'users.User_id', '=', 'plandetratamientos.User_id')
            ->select(['pacientes.*', 'tratamientos.*', 'users.nombre', 'plandetratamientos.*'])
            ->where('pacientes.paciente_id', $usuario);

        return DataTables::of($tratamientos)
            ->addColumn('estado', function ($tratamientos) {
                if ($tratamientos->estado == 1) {
                    $span = '<span style="font-family:Candara; font-size:15px;" class="label bg-green"> Activo </span>';
                    return $span;
                } else if ($tratamientos->estado == 2) {
                    $span = '<span style="font-family:Candara; font-size:15px;" class="label bg-blue"> Finalizado </span>';
                    return $span;
                } else {
                    $span = '<span style="font-family:Candara; font-size:15px;" class="label bg-red"> Cancelado </span>';
                    return $span;
                }
            })
            ->rawColumns(['estado'])
            ->make(true);
    }

    public function Añadir_Paciente(Request $request)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {

            $Nombre = $request->input('nombre');
            $Edad = $request->input('edad');
            $Direccion = $request->input('direccion');
            $TelefonoFijo = $request->input('telefonofijo');
            $TelefonoMovil = $request->input('telefonomovil');
            $Observaciones = $request->input('observaciones');

            $datos = DB::table('pacientes')->insert([
                'nombrePaciente' => $Nombre,
                'edadPaciente' => $Edad,
                'direccionPaciente' => $Direccion,
                'telefonoFijoPaciente' => $TelefonoFijo,
                'telefonoMovilPaciente' => $TelefonoMovil,
                'observacionesPaciente' => $Observaciones,
            ]);
            Toastr()->success('¡El paciente ha sido registrado!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function Editar_Paciente(Request $request)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {
            $Id = $request->input('id');
            $Nombre = $request->input('nombre');
            $Edad = $request->input('edad');
            $Direccion = $request->input('direccion');
            $TelefonoFijo = $request->input('telefonofijo');
            $TelefonoMovil = $request->input('telefonomovil');
            $Observaciones = $request->input('observaciones');

            DB::table('pacientes')
                ->where('paciente_id', $Id)
                ->update(['nombrePaciente' => $Nombre, 'edadPaciente' => $Edad, 'direccionPaciente' => $Direccion,
                    'telefonoFijoPaciente' => $TelefonoFijo, 'telefonoMovilPaciente' => $TelefonoMovil, 'observacionesPaciente' => $Observaciones]);

            Toastr()->success('¡El paciente ha sido actualizado!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function GestionDeTratamientos()
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {

            return view('GestionDeTratamientos');
        }
    }

    public function TablaTratamientos()
    {
        $tratamientos = Tratamiento::query();
        return DataTables::of($tratamientos)
            ->addColumn('action', function ($tratamientos) {
                return view('Botones_Tratamiento', compact('tratamientos'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function Añadir_Tratamiento(Request $request)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {

            $Nombre = $request->input('nombre');
            $Costo = $request->input('costo');

            $datos = DB::table('tratamientos')->insert([
                'nombreTratamiento' => $Nombre,
                'costoTratamiento' => $Costo,
            ]);
            Toastr()->success('¡El tratamiento ha sido registrado!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function Editar_Tratamiento(Request $request)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {
            $Id = $request->input('id');
            $Nombre = $request->input('nombre');
            $Costo = $request->input('costo');

            DB::table('tratamientos')
                ->where('tratamiento_id', $Id)
                ->update(['nombreTratamiento' => $Nombre, 'costoTratamiento' => $Costo]);

            Toastr()->success('¡El tratamiento ha sido actualizado!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function AsignarTratamientos()
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {
            $tratamientos = Tratamiento::orderBy('nombreTratamiento', 'asc')->get();
            return view('AsignarTratamientos', compact('tratamientos'));
        }
    }

    public function TablaPacientes2()
    {
        $pacientes = Paciente::query();
        return DataTables::of($pacientes)
            ->addColumn('action', function ($pacientes) {
                return view('Botones_Paciente2', compact('pacientes'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function Asignar_Tratamiento(Request $request)
    {
        $idPaciente = $request->input('id');
        $idTratamiento = $request->tratamiento;
        $idUser = Auth::User()->User_id;
        $cantidad = $request->input('cantidad');
        $descripcion = $request->input('descripcion');

        $costoUnitario = DB::table('tratamientos')
            ->select('costoTratamiento')
            ->where('tratamiento_id', $idTratamiento)
            ->first();

        $costoTotal = $cantidad * $costoUnitario->costoTratamiento;

        $datos = DB::table('plandetratamientos')->insert([
            'paciente_id' => $idPaciente,
            'tratamiento_id' => $idTratamiento,
            'User_id' => $idUser,
            'descripcion' => $descripcion,
            'cantidad' => $cantidad,
            'costoTotal' => $costoTotal,
            'saldoTratamiento' => $costoTotal,
        ]);
        Toastr()->success('¡El tratamiento ha sido registrado!', '¡Aviso!');
        return redirect()->back();

    }

    public function HistorialDeTratamientos()
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {
            $tratamientos = Tratamiento::orderBy('nombreTratamiento', 'asc')->get();
            $costototal = DB::table('plandetratamientos')
                ->where('estado', 1)
                ->orWhere('estado', 2)
                ->sum('costoTotal');
            $ingresos = DB::table('plandetratamientos')
                ->sum('abonoTratamiento');
            $saldos = DB::table('plandetratamientos')
                ->where('estado', 1)
                ->orWhere('estado', 2)
                ->sum('saldoTratamiento');
            $activos = DB::table('plandetratamientos')
                ->where('estado', 1)
                ->count('plandetratamientos_id');
            $finalizados = DB::table('plandetratamientos')
                ->where('estado', 2)
                ->count('plandetratamientos_id');
            $cancelados = DB::table('plandetratamientos')
                ->where('estado', 3)
                ->count('plandetratamientos_id');

            return view('HistorialDeTratamientos', compact('tratamientos', 'costototal', 'ingresos', 'saldos', 'activos', 'finalizados', 'cancelados'));
        }
    }

    public function TablaHistorialDeTratamientos()
    {
        $tratamientos = Plandetratamiento::join('pacientes', 'pacientes.paciente_id', '=', 'plandetratamientos.paciente_id')
            ->join('tratamientos', 'tratamientos.tratamiento_id', '=', 'plandetratamientos.tratamiento_id')
            ->join('users', 'users.User_id', '=', 'plandetratamientos.User_id')
            ->select(['pacientes.*', 'tratamientos.*', 'users.nombre', 'plandetratamientos.*']);
        return DataTables::of($tratamientos)
            ->addColumn('estado', function ($tratamientos) {
                return view('Botones_EstadoTratamiento', compact('tratamientos'))->render();
            })
            ->addColumn('action', function ($tratamientos) {
                return view('Botones_HistorialTratamiento', compact('tratamientos'))->render();
            })
            ->rawColumns(['estado', 'action'])
            ->make(true);
    }

    public function Editar_EstadoTratamiento($id)
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {
            $Estado = DB::table('plandetratamientos')->select('estado')->where('plandetratamientos_id', $id)->get();

            if ($Estado[0]->estado == 1) {
                DB::table('plandetratamientos')
                    ->where('plandetratamientos_id', $id)
                    ->update(['estado' => 2]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            } else if ($Estado[0]->estado == 2) {
                DB::table('plandetratamientos')
                    ->where('plandetratamientos_id', $id)
                    ->update(['estado' => 3]);
                DB::table('citas')
                    ->where('plandetratamientos_id', $id)
                    ->update(['estadoCita' => 4]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();

            } else {
                DB::table('plandetratamientos')
                    ->where('plandetratamientos_id', $id)
                    ->update(['estado' => 1]);
                DB::table('citas')
                    ->where('plandetratamientos_id', $id)
                    ->update(['estadoCita' => 1]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            }
        }
    }

    public function TablaPacientes3()
    {
        $pacientes = Paciente::query();
        return DataTables::of($pacientes)
            ->addColumn('action', function ($pacientes) {
                return view('Botones_Paciente3', compact('pacientes'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function Editar_TratamientoAsignado(Request $request)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {

            $idPaciente = $request->input('idpaciente');
            $idTratamiento = $request->tratamiento;
            $idPlanTratamiento = $request->input('idplantratamiento');
            $estadoTratamiento = $request->estado;
            $descripcionTratamiento = $request->input('descripcion');
            $cantidadTratamiento = $request->input('cantidad');

            //Si se cambia el tratamiento seleccionado
            //Hay nuevo costo unitario...
            $costoUnitario = DB::table('tratamientos')
                ->select('costoTratamiento')
                ->where('tratamiento_id', $idTratamiento)
                ->first();
            //Por ende el costo total cambia...
            $costoTotal = $cantidadTratamiento * $costoUnitario->costoTratamiento;
            //... Y el saldo cambia por haber cambiado el costo total
            $abono = DB::table('plandetratamientos')
                ->select('abonoTratamiento')
                ->where('plandetratamientos_id', $idPlanTratamiento)
                ->first();
            $saldo = $costoTotal - $abono->abonoTratamiento;

            if ($saldo == 0) {
                $estadoTratamiento = 2;
            }

            if ($costoTotal < ($abono->abonoTratamiento)) {
                $abono->abonoTratamiento = $costoTotal;
                $saldo = 0;
                DB::table('plandetratamientos')
                    ->where('plandetratamientos_id', $idPlanTratamiento)
                    ->update(['paciente_id' => $idPaciente,
                        'tratamiento_id' => $idTratamiento,
                        'descripcion' => $descripcionTratamiento,
                        'cantidad' => $cantidadTratamiento,
                        'costoTotal' => $costoTotal,
                        'abonoTratamiento' => $abono->abonoTratamiento,
                        'saldoTratamiento' => $saldo,
                        'estado' => $estadoTratamiento]);
            } else {
                DB::table('plandetratamientos')
                    ->where('plandetratamientos_id', $idPlanTratamiento)
                    ->update(['paciente_id' => $idPaciente,
                        'tratamiento_id' => $idTratamiento,
                        'descripcion' => $descripcionTratamiento,
                        'cantidad' => $cantidadTratamiento,
                        'costoTotal' => $costoTotal,
                        'saldoTratamiento' => $saldo,
                        'estado' => $estadoTratamiento]);

                $citas = Cita::where('plandetratamientos_id', '=', $idPlanTratamiento)
                    ->orderBy('fechaCita', 'asc')
                    ->get();
                $saldo = $costoTotal; //75
                foreach ($citas as $cita) { //75-30
                    $cita->saldoCita = $saldo - $cita->abonoCita;
                    $saldo = $cita->saldoCita;
                    $cita->save();
                }
            }

            Toastr()->success('¡El tratamiento asignado ha sido actualizado!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function GestionDeCitas()
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {
            $citasPendientes = DB::table('citas')
                ->where('estadoCita', 1)
                ->count('citas_id');
            $citasCompletadas = DB::table('citas')
                ->where('estadoCita', 3)
                ->count('citas_id');
            $citasCanceladas = DB::table('citas')
                ->where('estadoCita', 4)
                ->count('citas_id');

            return view('GestionDeCitas', compact('citasPendientes', 'citasCompletadas', 'citasCanceladas'));
        }
    }

    public function TablaCitas()
    {
        $citas = Cita::join('plandetratamientos', 'plandetratamientos.plandetratamientos_id', '=', 'citas.plandetratamientos_id')
            ->join('pacientes', 'pacientes.paciente_id', '=', 'plandetratamientos.paciente_id')
            ->join('tratamientos', 'tratamientos.tratamiento_id', '=', 'plandetratamientos.tratamiento_id')
            ->join('users', 'users.User_id', '=', 'plandetratamientos.User_id')
            ->join('users as users2', 'users2.User_id', '=', 'citas.User_id')

            ->select(['plandetratamientos.*', 'pacientes.*', 'tratamientos.*', 'users.nombre', 'users2.nombre as nombre2', 'citas.*']);
        return DataTables::of($citas)
            ->addColumn('estadoCita', function ($citas) {
                return view('Botones_EstadoCita', compact('citas'))->render();
            })
            ->addColumn('action', function ($citas) {
                return view('Botones_Cita', compact('citas'))->render();
            })
            ->rawColumns(['estadoCita', 'action'])
            ->make(true);
    }

    public function TablaCitas2()
    {
        $citas = Cita::join('plandetratamientos', 'plandetratamientos.plandetratamientos_id', '=', 'citas.plandetratamientos_id')
            ->join('pacientes', 'pacientes.paciente_id', '=', 'plandetratamientos.paciente_id')
            ->join('tratamientos', 'tratamientos.tratamiento_id', '=', 'plandetratamientos.tratamiento_id')
            ->join('users', 'users.User_id', '=', 'plandetratamientos.User_id')
            ->join('users as users2', 'users2.User_id', '=', 'citas.User_id')

            ->select(['plandetratamientos.*', 'pacientes.*', 'tratamientos.*', 'users.nombre', 'users2.nombre as nombre2', 'citas.*'])
            ->where('citas.fechaCita', Carbon::now()->format('Y-m-d'));
        return DataTables::of($citas)
            ->addColumn('estadoCita', function ($citas) {
                return view('Botones_EstadoCita', compact('citas'))->render();
            })
            ->addColumn('action', function ($citas) {
                return view('Botones_Cita2', compact('citas'))->render();
            })
            ->rawColumns(['estadoCita', 'action'])
            ->make(true);
    }

    public function TablaCitasPorPaciente(Request $request)
    {
        $usuario = $request->input('usuario');
        $citas = Cita::join('plandetratamientos', 'plandetratamientos.plandetratamientos_id', '=', 'citas.plandetratamientos_id')
            ->join('pacientes', 'pacientes.paciente_id', '=', 'plandetratamientos.paciente_id')
            ->join('tratamientos', 'tratamientos.tratamiento_id', '=', 'plandetratamientos.tratamiento_id')
            ->join('users', 'users.User_id', '=', 'plandetratamientos.User_id')
            ->join('users as users2', 'users2.User_id', '=', 'citas.User_id')
            ->select(['plandetratamientos.*', 'pacientes.*', 'tratamientos.*', 'users.nombre', 'users2.nombre as nombre2', 'citas.*'])
            ->where('pacientes.paciente_id', $usuario);

        return DataTables::of($citas)
            ->addColumn('estadoCita', function ($citas) {
                if ($citas->estadoCita == 1) {
                    $span = '<span style="font-family:Candara; font-size:15px;" class="label bg-orange"> Pendiente </span>';
                    return $span;
                } else if ($citas->estadoCita == 2) {
                    $span = '<span style="font-family:Candara; font-size:15px;" class="label bg-blue"> Confirmada </span>';
                    return $span;
                } else if ($citas->estadoCita == 3) {
                    $span = '<span style="font-family:Candara; font-size:15px;" class="label bg-green"> Completada </span>';
                    return $span;
                } else {
                    $span = '<span style="font-family:Candara; font-size:15px;" class="label bg-red"> Cancelado </span>';
                    return $span;
                }
            })
            ->rawColumns(['estadoCita'])
            ->make(true);
    }

    public function Editar_EstadoCita($id)
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {
            $Estado = DB::table('citas')->select('estadoCita')->where('citas_id', $id)->get();

            if ($Estado[0]->estadoCita == 1) {
                DB::table('citas')
                    ->where('citas_id', $id)
                    ->update(['estadoCita' => 2]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            } else if ($Estado[0]->estadoCita == 2) {
                DB::table('citas')
                    ->where('citas_id', $id)
                    ->update(['estadoCita' => 3]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            } else if ($Estado[0]->estadoCita == 3) {
                DB::table('citas')
                    ->where('citas_id', $id)
                    ->update(['estadoCita' => 4]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            } else {

                DB::table('citas')
                    ->where('citas_id', $id)
                    ->update(['estadoCita' => 1]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            }
        }
    }

    public function TablaHistorialDeTratamientos2()
    {
        $tratamientos = Plandetratamiento::join('pacientes', 'pacientes.paciente_id', '=', 'plandetratamientos.paciente_id')
            ->join('tratamientos', 'tratamientos.tratamiento_id', '=', 'plandetratamientos.tratamiento_id')
            ->join('users', 'users.User_id', '=', 'plandetratamientos.User_id')
            ->select(['pacientes.*', 'tratamientos.*', 'users.nombre', 'plandetratamientos.*']);
        return DataTables::of($tratamientos)
            ->addColumn('action', function ($tratamientos) {
                return view('Botones_HistorialTratamiento2', compact('tratamientos'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function AsignarCita(Request $request)
    {
        $idPlanTratamiento = $request->input('idplantratamiento');
        $idUser = Auth::User()->User_id;
        $fechaCita = $request->input('fecha');
        $horaCita = $request->hora;
        $descripcionCita = $request->input('descripcionCita');

        $saldo = DB::table('plandetratamientos')
            ->select('saldoTratamiento')
            ->where('plandetratamientos_id', $idPlanTratamiento)
            ->first();

        $datos = DB::table('citas')->insert([
            'plandetratamientos_id' => $idPlanTratamiento,
            'User_id' => $idUser,
            'fechaCita' => $fechaCita,
            'horaCita' => $horaCita,
            'descripcionCita' => $descripcionCita,
            'saldoCita' => $saldo->saldoTratamiento,
        ]);
        Toastr()->success('¡La cita ha sido registrada!', '¡Aviso!');
        return redirect()->back();

    }

    public function EditarAbonoCita(Request $request)
    {
        $idCita = $request->input('idcita');
        $abonoCita = $request->input('abonoCita');

        // SELECCIONAR EL PLAN DE TRATAMIENTO DE LA CITA...
        $idTratamiento = DB::table('citas')
            ->select('plandetratamientos_id')
            ->where('citas_id', $idCita)
            ->first();

        //CONSEGUIR EL PRECIO TOTAL DEL TRATAMIENTO SELECCIONADO
        $costoTotal = DB::table('plandetratamientos')
            ->select('costoTotal')
            ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
            ->first();

        //CONSEGUIR EL ABONO DEL TRATAMIENTO SELECCIONADO
        //15
        $abonoTratamiento = DB::table('plandetratamientos')
            ->select('abonoTratamiento')
            ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
            ->first();

        //CONSEGUIR EL SALDO DEL TRATAMIENTO SELECCIONADO
        //30
        $saldoTratamiento = DB::table('plandetratamientos')
            ->select('saldoTratamiento')
            ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
            ->first();

        //Conseguir la fecha de la cita
        $fechaCita = DB::table('citas')
            ->select('fechaCita')
            ->where('citas_id', $idCita)
            ->first();
        //15 == 0
        if ($abonoTratamiento->abonoTratamiento == 0) {
            $nuevoAbonoTratamiento = $abonoCita; //5
            $nuevoSaldo = $costoTotal->costoTotal - $nuevoAbonoTratamiento; //60-5=55
            $nuevoAbonoTratamiento = $abonoCita; //5

            if ($nuevoSaldo < 0) {
                Toastr()->error('El abono no puede ser mayor al saldo actual', '¡Aviso!');
                return redirect()->back();
            } else {

                DB::table('citas')
                    ->where('citas_id', $idCita)
                    ->update(['abonoCita' => $nuevoAbonoTratamiento, //5
                        'saldoCita' => $nuevoSaldo, //55
                        'estadoCita' => 3]);

                DB::table('citas')
                    ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id) //tratamiento seleccionado
                    ->where('saldoCita', $saldoTratamiento->saldoTratamiento) //saldo cita sea igual al saldo previo
                    ->where('fechaCita', '>', $fechaCita->fechaCita) //fecha sean superiores
                    ->update(['saldoCita' => $nuevoSaldo]); //poner el nuevo saldo generado...

                //ACTUALIZAMOS LOS DATOS DEL TRATAMIENTO
                $totalAbonos = DB::table('citas')
                    ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
                    ->sum('abonoCita');

                $totalSaldo = $costoTotal->costoTotal - $totalAbonos;

                DB::table('plandetratamientos')
                    ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
                    ->update(['abonoTratamiento' => $totalAbonos,
                        'saldoTratamiento' => $totalSaldo]);

                Toastr()->success('¡El abono ha sido registrado!', '¡Aviso!');
                return redirect()->back();
            }
        }
        //15 ES MAYOR A 0 ACA ENTRO...
        else {
            $auxAbonoCita = DB::table('citas')
                ->select('abonoCita')
                ->where('citas_id', $idCita)
                ->first();
            //ABONO ACTUAL ES 0
            //ABONO A PONER ES 30

            //MI ABONO ACTUAL ES 0, ENTRO ACA
            if ($auxAbonoCita->abonoCita == 0) {
                //45 0 30
                //45 30 0

                $auxiliar = $auxAbonoCita->abonoCita - $abonoCita; //0 ABONO ANTIGUO - 30 ABONO NUEVO = -30 DE DIFERENCIA EN ABONO
                $nuevoAbonoTratamiento = $abonoCita; //NUEVO ABONO:30
                $saldoActualCita = DB::table('citas') //SALDO ACTUAL DE MI CITA ES 30
                    ->select('saldoCita')
                    ->where('citas_id', $idCita)
                    ->first();
                $nuevoSaldo = $saldoActualCita->saldoCita + $auxiliar; //SALDO ACTUAL + DIFERENCIA EN ABONO = 30+(-30)=0

                if ($nuevoSaldo < 0) {
                    Toastr()->error('El abono no puede ser mayor al saldo actual', '¡Aviso!');
                    return redirect()->back();
                }
                //SI MI SALDO ES 0, ENTRO ACA!!!!
                else if ($nuevoSaldo == 0) {
                    DB::table('citas')
                        ->where('citas_id', $idCita)
                        ->update(['abonoCita' => $nuevoAbonoTratamiento, //30
                            'saldoCita' => $nuevoSaldo, //0
                            'estadoCita' => 3]); //COMPLETADA

                    DB::table('citas')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id) //tratamiento seleccionado
                        ->where('fechaCita', '>', $fechaCita->fechaCita) //fecha sean superiores
                        ->update(['saldoCita' => 0,
                            'abonoCita' => 0]); //poner el nuevo saldo generado...

                    //ACTUALIZAMOS LOS DATOS DEL TRATAMIENTO
                    $totalAbonos = DB::table('citas')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
                        ->sum('abonoCita');
                    $totalSaldo = $costoTotal->costoTotal - $totalAbonos;

                    DB::table('plandetratamientos')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
                        ->update(['abonoTratamiento' => $totalAbonos,
                            'saldoTratamiento' => $totalSaldo]);
                    Toastr()->success('¡El abono ha sido registrado!', '¡Aviso!');
                    return redirect()->back();
                } else {
                    DB::table('citas')
                        ->where('citas_id', $idCita)
                        ->update(['abonoCita' => $nuevoAbonoTratamiento, //5
                            'saldoCita' => $nuevoSaldo, //45
                            'estadoCita' => 3]);

                    DB::table('citas')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id) //tratamiento seleccionado
                        ->where('fechaCita', '>', $fechaCita->fechaCita) //fecha sean superiores
                        ->increment('saldoCita', $auxiliar); //poner el nuevo saldo generado...

                    //ACTUALIZAMOS LOS DATOS DEL TRATAMIENTO
                    $totalAbonos = DB::table('citas')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
                        ->sum('abonoCita');

                    $totalSaldo = $costoTotal->costoTotal - $totalAbonos;

                    DB::table('plandetratamientos')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
                        ->update(['abonoTratamiento' => $totalAbonos,
                            'saldoTratamiento' => $totalSaldo]);

                    Toastr()->success('¡El abono ha sido registrado!', '¡Aviso!');
                    return redirect()->back();
                }
            } else //mi abono actual es 5
            {
                //60 5 55
                //60 2 58

                $auxiliar = $auxAbonoCita->abonoCita - $abonoCita; //5 ABONO ANTIGUO - 2 ABONO NUEVO = 3 DE DIFERENCIA EN ABONO
                $nuevoAbonoTratamiento = $abonoCita; //NUEVO ABONO = 2
                $saldoActualCita = DB::table('citas') //SALDO ACTUAL DE MI CITA
                    ->select('saldoCita')
                    ->where('citas_id', $idCita)
                    ->first();
                $nuevoSaldo = $saldoActualCita->saldoCita + $auxiliar; //55 saldo actual de la cita+3=58 NUEVO SALDO

                if ($nuevoSaldo < 0) {
                    Toastr()->error('El abono no puede ser mayor al saldo actual', '¡Aviso!');
                    return redirect()->back();
                } else if ($nuevoSaldo == 0) {
                    DB::table('citas')
                        ->where('citas_id', $idCita)
                        ->update(['abonoCita' => $nuevoAbonoTratamiento, //5
                            'saldoCita' => $nuevoSaldo, //45
                            'estadoCita' => 3]);

                    DB::table('citas')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id) //tratamiento seleccionado
                        ->where('fechaCita', '>', $fechaCita->fechaCita) //fecha sean superiores
                        ->update(['saldoCita' => 0,
                            'abonoCita' => 0]); //poner el nuevo saldo generado...

                    //ACTUALIZAMOS LOS DATOS DEL TRATAMIENTO
                    $totalAbonos = DB::table('citas')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
                        ->sum('abonoCita');

                    $totalSaldo = $costoTotal->costoTotal - $totalAbonos;

                    DB::table('plandetratamientos')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
                        ->update(['abonoTratamiento' => $totalAbonos,
                            'saldoTratamiento' => $totalSaldo]);
                    Toastr()->success('¡El abono ha sido registrado!', '¡Aviso!');
                    return redirect()->back();
                } else {

                    DB::table('citas')
                        ->where('citas_id', $idCita)
                        ->update(['abonoCita' => $nuevoAbonoTratamiento, //2
                            'saldoCita' => $nuevoSaldo, //58
                            'estadoCita' => 3]);

                    DB::table('citas')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id) //tratamiento seleccionado
                        ->where('fechaCita', '>', $fechaCita->fechaCita) //fecha sean superiores
                        ->increment('saldoCita', $auxiliar); //poner el nuevo saldo generado...

                    //ACTUALIZAMOS LOS DATOS DEL TRATAMIENTO
                    $totalAbonos = DB::table('citas')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
                        ->sum('abonoCita');

                    $totalSaldo = $costoTotal->costoTotal - $totalAbonos;

                    DB::table('plandetratamientos')
                        ->where('plandetratamientos_id', $idTratamiento->plandetratamientos_id)
                        ->update(['abonoTratamiento' => $totalAbonos,
                            'saldoTratamiento' => $totalSaldo]);

                    Toastr()->success('¡El abono ha sido registrado!', '¡Aviso!');
                    return redirect()->back();
                }
            }
        }

    }

    public function EditarCita(Request $request)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {

            $idCita = $request->input('citaid');
            $estadoCita = $request->estadoCita;
            $fechaCita = $request->input('fecha');
            $horaCita = $request->input('hora');
            $descripcionCita = $request->input('descripcionCita');

            DB::table('citas')
                ->where('citas_id', $idCita)
                ->update(['estadoCita' => $estadoCita,
                    'fechaCita' => $fechaCita,
                    'horaCita' => $horaCita,
                    'descripcionCita' => $descripcionCita]);

            Toastr()->success('¡La cita ha sido actualizada!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function GestionDeReservaCitas()
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {
            $citasPendientes = DB::table('reservacitas')
                ->where('estadoReservaCita', 1)
                ->count('reservaCitas_id');
            $citasCompletadas = DB::table('reservacitas')
                ->where('estadoReservaCita', 3)
                ->count('reservaCitas_id');
            $citasCanceladas = DB::table('reservacitas')
                ->where('estadoReservaCita', 4)
                ->count('reservaCitas_id');

            return view('GestionDeReservaCitas', compact('citasPendientes', 'citasCompletadas', 'citasCanceladas'));
        }
    }

    public function CitasReservadasTabla2()
    {
        $reservaCitas = Reservacita::join('users', 'users.User_id', '=', 'reservacitas.User_id')
            ->select(['users.*', 'reservacitas.*']);
        return DataTables::of($reservaCitas)
            ->addColumn('estadoReservaCita', function ($reservaCitas) {
                return view('Botones_EstadoReservaCita2', compact('reservaCitas'))->render();
            })
            ->addColumn('action', function ($reservaCitas) {
                return view('Botones_ReservaCita2', compact('reservaCitas'))->render();
            })
            ->rawColumns(['estadoReservaCita', 'action'])
            ->make(true);
    }

    public function CitasReservadasTabla3()
    {
        $reservaCitas = Reservacita::join('users', 'users.User_id', '=', 'reservacitas.User_id')
            ->select(['users.*', 'reservacitas.*'])
            ->where('reservacitas.fechaReservaCita', Carbon::now()->format('Y-m-d'));
        return DataTables::of($reservaCitas)
            ->addColumn('estadoReservaCita', function ($reservaCitas) {
                return view('Botones_EstadoReservaCita2', compact('reservaCitas'))->render();
            })
            ->addColumn('action', function ($reservaCitas) {
                return view('Botones_ReservaCita3', compact('reservaCitas'))->render();
            })
            ->rawColumns(['estadoReservaCita', 'action'])
            ->make(true);
    }

    public function EditEstadoReservaCita($id)
    {
        if (Auth::User()->Role_id != 1) {
            return redirect("/");
        } else {
            $Estado = DB::table('reservacitas')->select('estadoReservaCita')->where('reservaCitas_id', $id)->get();

            if ($Estado[0]->estadoReservaCita == 1) {
                DB::table('reservacitas')
                    ->where('reservaCitas_id', $id)
                    ->update(['estadoReservaCita' => 2]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            } else if ($Estado[0]->estadoReservaCita == 2) {
                DB::table('reservacitas')
                    ->where('reservaCitas_id', $id)
                    ->update(['estadoReservaCita' => 3]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            } else if ($Estado[0]->estadoReservaCita == 3) {
                DB::table('reservacitas')
                    ->where('reservaCitas_id', $id)
                    ->update(['estadoReservaCita' => 4]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            } else {

                DB::table('reservacitas')
                    ->where('reservaCitas_id', $id)
                    ->update(['estadoReservaCita' => 1]);
                Toastr()->success('¡El estado ha sido actualizado!', '¡Aviso!');
                return redirect()->back();
            }
        }
    }

    public function EditarReservaCita(Request $request)
    {
        if (Auth::User()->Role_id == 2) {
            return redirect("/");
        } else {

            $idCita = $request->input('reservaid');
            $estadoCita = $request->estadoCita;
            $fechaCita = $request->input('fecha');
            $horaCita = $request->input('hora');

            DB::table('reservacitas')
                ->where('reservaCitas_id', $idCita)
                ->update(['estadoReservaCita' => $estadoCita,
                    'fechaReservaCita' => $fechaCita,
                    'horaReservaCita' => $horaCita]);

            Toastr()->success('¡La reservación de cita ha sido actualizada!', '¡Aviso!');
            return redirect()->back();
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
