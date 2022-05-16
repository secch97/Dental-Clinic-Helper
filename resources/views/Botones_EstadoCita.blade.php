            @if($citas->estadoCita==1)
            <a style="text-decoration: none;" href="{{ route('Editar_EstadoCita', [$citas->citas_id])}}">
                <span style="font-family:Candara; font-size:15px;" class="label bg-orange"> Pendiente </span>
            </a>
            @elseif($citas->estadoCita==2)
            <a style="text-decoration: none;" href="{{ route('Editar_EstadoCita', [$citas->citas_id])}}">
                <span style="font-family:Candara; font-size:15px;" class="label bg-blue"> Confirmada </span>
            </a>
            @elseif($citas->estadoCita==3)
            <a style="text-decoration: none;" href="{{ route('Editar_EstadoCita', [$citas->citas_id])}}">
                <span style="font-family:Candara; font-size:15px;" class="label bg-green"> Completada </span>
            </a>
            @elseif($citas->estadoCita==4)
            <a style="text-decoration: none;" href="{{ route('Editar_EstadoCita', [$citas->citas_id])}}">
                <span style="font-family:Candara; font-size:15px;" class="label bg-red"> Cancelada </span>
            </a>
            @endif
