<td class="text-center">
    <a href="#" class="show-modal-citaspaciente btn btn-info btn-sm" data-nombrepaciente="{{$citas->nombrePaciente}}"
        data-edadpaciente="{{$citas->edadPaciente}}" data-direccionpaciente="{{$citas->direccionPaciente}}"
        data-telefonofijo="{{$citas->telefonoFijoPaciente}}" data-telefonomovil="{{$citas->telefonoMovilPaciente}}"
        data-observaciones="{{$citas->observacionesPaciente}}">
        <i class="fa fa-id-card-o" style="font-size:15px;"></i>
    </a>
    <a href="#" class="show-modal-citastratamiento btn btn-info btn-sm" data-nombreusuario="{{$citas->nombre}}"
        data-nombretratamiento="{{$citas->nombreTratamiento}}" data-costotratamiento="{{$citas->costoTratamiento}}"
        data-cantidadtratamiento="{{$citas->cantidad}}" data-costototaltratamiento="{{$citas->costoTotal}}"
        data-abonotratamiento="{{$citas->abonoTratamiento}}" data-saldotratamiento="{{$citas->saldoTratamiento}}"
        data-descripciontratamiento="{{$citas->descripcion}}" data-estadotratamiento="{{$citas->estado}}">
        <i class="fa fa-file-text" style="font-size:15px;"></i>
    </a>

    <a href="#" class="show-modal-citas btn btn-info btn-sm" data-nombreusuario="{{$citas->nombre2}}"
        data-fechacita="{{$citas->fechaCita}}" data-horacita="{{$citas->horaCita}}"
        data-descripcioncita="{{$citas->descripcionCita}}" data-costototaltratamiento="{{$citas->costoTotal}}"
        data-abonocita="{{$citas->abonoCita}}" data-saldocita="{{$citas->saldoCita}}"
        data-estadocita="{{$citas->estadoCita}}">
        <i class="fa fa-calendar" style="font-size:15px;"></i>
    </a>

    <a href="#" class="agregar-abono-modal btn btn-primary btn-sm" data-idcita="{{$citas->citas_id}}" data-abonocita="{{$citas->abonoCita}}">
        <i class="fa fa-usd" style="font-size:15px;"></i>
    </a>

    <a href="#" class="edit-modal-historialcitas btn btn-warning btn-sm" data-idcita="{{$citas->citas_id}}"
        data-fechacita="{{$citas->fechaCita}}"
        data-horacita="{{$citas->horaCita}}" data-descripcioncita="{{$citas->descripcionCita}}"
        data-costototaltratamiento="{{$citas->costoTotal}}" data-abonocita="{{$citas->abonoCita}}"
        data-estadocita="{{$citas->estadoCita}}">
        <i class="fa fa-pencil" style="font-size:15px;"></i>
    </a>

</td>
