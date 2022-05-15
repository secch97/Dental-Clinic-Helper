<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Image;

class Controlador extends Controller
{
    public function paginaPrincipal()
    {
        return view('paginaPrincipal');
    }

    public function SobreNosotros()
    {
        return view('sobreNosotros');
    }

    public function Servicios()
    {
        return view('servicios');
    }

    public function Contacto()
    {
        return view('contacto');
    }
}
