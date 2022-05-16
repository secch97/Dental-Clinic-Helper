<td class="text-center">
    <a href="#" class="show-modal-paciente btn btn-info btn-sm" data-nombrepaciente="{{$pacientes->nombrePaciente}}"
        data-edadpaciente="{{$pacientes->edadPaciente}}" data-direccionpaciente="{{$pacientes->direccionPaciente}}"
        data-telefonofijopaciente="{{$pacientes->telefonoFijoPaciente}}" data-telefonomovilpaciente="{{$pacientes->telefonoMovilPaciente}}"
        data-observacionespaciente="{{$pacientes->observacionesPaciente}}">
        <i class="fa fa-eye"></i>
    </a>

    <a href="#" class="show-modal-tablatratamientos btn btn-info btn-sm" data-id="{{$pacientes->paciente_id}}">
        <i class="fa fa-file-text"></i>
    </a>

    
    <a href="#" class="show-modal-tablacitasporpaciente btn btn-info btn-sm" data-id="{{$pacientes->paciente_id}}">
        <i class="fa fa-calendar"></i>
    </a>

   
    
    <a href="#" class="edit-modal-paciente btn btn-warning btn-sm" data-nombrepaciente="{{$pacientes->nombrePaciente}}"
        data-edadpaciente="{{$pacientes->edadPaciente}}" data-direccionpaciente="{{$pacientes->direccionPaciente}}"
        data-telefonofijopaciente="{{$pacientes->telefonoFijoPaciente}}" data-telefonomovilpaciente="{{$pacientes->telefonoMovilPaciente}}"
        data-observacionespaciente="{{$pacientes->observacionesPaciente}}" data-idpaciente="{{$pacientes->paciente_id}}">
        <i class="fa fa-pencil"></i>
    </a> 

    <a href="#" class="show-modal-tablacitas btn btn-danger btn-sm">
        <i class="fa fa-file-pdf-o"></i>
    </a>
</td>
