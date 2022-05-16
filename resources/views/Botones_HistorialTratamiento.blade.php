<td class="text-center">
    <a href="#" class="show-modal-historialtratamientospacientes btn btn-info btn-sm" data-nombreusuario="{{$tratamientos->nombre}}"
        data-nombrepaciente="{{$tratamientos->nombrePaciente}}" data-edadpaciente="{{$tratamientos->edadPaciente}}"
        data-direccionpaciente="{{$tratamientos->direccionPaciente}}" data-telefonofijo="{{$tratamientos->telefonoFijoPaciente}}"
        data-telefonomovil="{{$tratamientos->telefonoMovilPaciente}}" data-observaciones="{{$tratamientos->observacionesPaciente}}"
        >
        <i class="fa fa-id-card-o" style="font-size:20px;"></i>
    </a>
    <a href="#" class="show-modal-historialtratamientosdatos btn btn-info btn-sm" data-nombreusuario="{{$tratamientos->nombre}}"
        data-nombretratamiento="{{$tratamientos->nombreTratamiento}}" data-costotratamiento="{{$tratamientos->costoTratamiento}}"
        data-fechaasignacion="{{$tratamientos->fechaCreacionTratamiento}}"
        data-cantidadtratamiento="{{$tratamientos->cantidad}}" data-costototaltratamiento="{{$tratamientos->costoTotal}}"
        data-abonotratamiento="{{$tratamientos->abonoTratamiento}}" data-saldotratamiento="{{$tratamientos->saldoTratamiento}}"
        data-descripciontratamiento="{{$tratamientos->descripcion}}" data-estadotratamiento="{{$tratamientos->estado}}" 
        >
        <i class="fa fa-file-text" style="font-size:20px;"></i>
    </a>
    <a href="#" class="edit-modal-historialtratamientos btn btn-warning btn-sm" data-nombreusuario="{{$tratamientos->nombre}}"
        data-nombrepaciente="{{$tratamientos->nombrePaciente}}" data-edadpaciente="{{$tratamientos->edadPaciente}}"
        data-direccionpaciente="{{$tratamientos->direccionPaciente}}" data-telefonofijo="{{$tratamientos->telefonoFijoPaciente}}"
        data-telefonomovil="{{$tratamientos->telefonoMovilPaciente}}" data-observaciones="{{$tratamientos->observacionesPaciente}}"
        data-nombretratamiento="{{$tratamientos->nombreTratamiento}}" data-costotratamiento="{{$tratamientos->costoTratamiento}}"
        data-cantidadtratamiento="{{$tratamientos->cantidad}}" data-costototaltratamiento="{{$tratamientos->costoTotal}}"
        data-abonotratamiento="{{$tratamientos->abonoTratamiento}}" data-saldotratamiento="{{$tratamientos->saldoTratamiento}}"
        data-descripciontratamiento="{{$tratamientos->descripcion}}" data-estadotratamiento="{{$tratamientos->estado}}" 
        data-idpaciente="{{$tratamientos->paciente_id}}"
        data-idtratamiento="{{$tratamientos->tratamiento_id}}"
        data-idplantratamiento="{{$tratamientos->plandetratamientos_id}}">
        <i class="fa fa-pencil" style="font-size:20px;"></i>
    </a>

</td>
