<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
class PostController extends Controller
{
    public function details($url, $id)
    {
        $Visualizador=DB::table('publicaciones')
        ->select('vistas')
        ->where('Publicacion_id', $id)
        ->first();

        $visua=$Visualizador->vistas;
        $visua=$visua+1;
        DB::table('publicaciones')
        ->where('Publicacion_id', $id)
        ->update(['vistas' => $visua]);



         $post['post']= DB::table('publicaciones')
        ->join('users', 'publicaciones.User_id', '=', 'users.User_id')
        ->select('publicaciones.*','users.User_id','users.email','users.sobre_mi','users.nombre', 'users.imagen as imagen2')
        ->where('publicaciones.url', $url)
        ->where('publicaciones.Publicacion_id', $id)
        ->get();


        if (count($post)>0)
        {
            return view('post', $post);
        }

        else
        {
            return view('post');
        }
    }


    
}
