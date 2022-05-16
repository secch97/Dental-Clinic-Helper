            @if($tratamientos->estado==1)
            <a style="text-decoration: none;" href="{{ route('Editar_EstadoTratamiento', [$tratamientos->plandetratamientos_id])}}">
                <span style="font-family:Candara; font-size:15px;" class="label bg-green"> Activo </span>
            </a>
            @elseif($tratamientos->estado==2)
            <a style="text-decoration: none;" href="{{ route('Editar_EstadoTratamiento', [$tratamientos->plandetratamientos_id])}}">
                <span style="font-family:Candara; font-size:15px;" class="label bg-blue"> Finalizado </span>
            </a>
            @elseif($tratamientos->estado==3)
            <a style="text-decoration: none;" href="{{ route('Editar_EstadoTratamiento', [$tratamientos->plandetratamientos_id])}}">
                <span style="font-family:Candara; font-size:15px;" class="label bg-red"> Cancelado </span>
            </a>
            @endif
