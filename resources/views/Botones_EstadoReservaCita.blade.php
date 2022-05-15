
            @if($reservaCitas->estadoReservaCita==1)
            <a style="text-decoration: none;">
                <span style="font-family:Candara; font-size:15px;" class="label label-warning"> Pendiente </span>
            </a>
            @elseif($reservaCitas->estadoReservaCita==2)
            <a style="text-decoration: none;">
                <span style="font-family:Candara; font-size:15px;" class="label label-primary"> Confirmada </span>
            </a>
            @elseif($reservaCitas->estadoReservaCita==3)
            <a style="text-decoration: none;">
                <span style="font-family:Candara; font-size:15px;" class="label label-success"> Completada </span>
            </a>
            @elseif($reservaCitas->estadoReservaCita==4)
            <a style="text-decoration: none;">
                <span style="font-family:Candara; font-size:15px;" class="label label-danger"> Cancelada </span>
            </a>
            @endif
