            @if($usuarios->estado==1)
            <a style="text-decoration: none;" href="{{ route('Editar_Estado', [$usuarios->User_id])}}"><span
                    style="font-family:Candara; font-size:15px;" class="label bg-green"> Activo </span></a>
            @else
            <a style="text-decoration: none;" href="{{ route('Editar_Estado', [$usuarios->User_id])}}"><span
                    style="font-family:Candara; font-size:15px;" class="label bg-red"> Inactivo </span></a>
            @endif
