<td class="text-center">
    <a class="show-modal-reservacitaspaciente btn btn-info btn-sm" href="#"
        data-nombresolicitante="{{$reservaCitas->nombre}}" data-usuario="{{$reservaCitas->usuario}}"
        data-correo="{{$reservaCitas->email}}" data-telefono="{{$reservaCitas->telefonoReservaCita}}"
        data-direccion="{{$reservaCitas->direccionReservaCita}}">
        <i class="fa fa-id-card-o" style="font-size:15px;"></span></i>
    </a>

    <a class="show-modal-reservacitasdatos btn btn-info btn-sm" href="#"
        data-fecha="{{$reservaCitas->fechaReservaCita}}" data-hora="{{$reservaCitas->horaReservaCita}}"
        data-razon="{{$reservaCitas->descripcionReservaCita}}">
        <i class="fa fa-calendar" style="font-size:15px;"></i>
    </a>

    <a class="show-modal-reservacitaseditar btn btn-warning btn-sm" href="#"
        data-fecha="{{$reservaCitas->fechaReservaCita}}" data-hora="{{$reservaCitas->horaReservaCita}}"
        data-estado="{{$reservaCitas->estadoReservaCita}}"
        data-id="{{$reservaCitas->reservaCitas_id}}">
        <i class="fa fa-pencil" style="font-size:15px;"></i>
    </a>
</td>
