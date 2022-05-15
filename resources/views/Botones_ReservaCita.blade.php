    @if($reservaCitas->estadoReservaCita==1)
    <a class="show-modal-citaspaciente btn btn-danger btn-sm" href="{{ route('EditarEstadoReservaCita', [$reservaCitas->reservaCitas_id])}}">
        <i class=" fa fa-calendar-times-o" style="color:white;font-size:15px;"><span style="font-family:Candara; font-size:15px;"><b> Cancelar cita</b></span></i>
    </a>
    @elseif($reservaCitas->estadoReservaCita==2)
    <a class="show-modal-citaspaciente btn btn-danger btn-sm" href="{{ route('EditarEstadoReservaCita', [$reservaCitas->reservaCitas_id])}}">
        <i class=" fa fa-calendar-times-o" style="color:white;font-size:15px;"><span style="font-family:Candara; font-size:15px;"><b> Cancelar cita</b></span></i>
    </a>
    @else
    <a disabled readonly class="show-modal-citaspaciente btn btn-danger btn-sm">
        <i class=" fa fa-calendar-times-o" style="color:white;font-size:15px;"><span style="font-family:Candara; font-size:15px;"><b> Cancelar cita</b></span></i>
    </a>
    @endif
