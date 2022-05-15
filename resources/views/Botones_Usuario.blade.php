<td >
    <a href="#" class="show-modal btn btn-info btn-sm" data-nombre="{{$usuarios->nombre}}"
        data-usuario="{{$usuarios->usuario}}" data-tipousuario="{{$usuarios->nombre_rol}}"
        data-estado="{{$usuarios->estado}}" data-correo="{{$usuarios->email}}"
        data-fecha="{{$usuarios->fecha_creacion}}">
        <i class="fa fa-eye"></i>
    </a>
    <a href="#" class="edit-modal btn btn-warning btn-sm" data-nombre="{{$usuarios->nombre}}"
        data-usuario="{{$usuarios->usuario}}" data-tipousuario="{{$usuarios->Role_id}}"
        data-estado="{{$usuarios->estado}}" data-correo="{{$usuarios->email}}"
        data-fecha="{{$usuarios->fecha_creacion}}" data-id="{{$usuarios->User_id}}">
        <i class="fa fa-pencil"></i>
    </a>
    <a href="#" class="password-modal btn btn-success btn-sm" data-id="{{$usuarios->User_id}}">
        <i class="fa fa-lock"></i>
    </a>
  
</td>
