<?php

namespace App\Controllers;

use App\Models\TrabajadorM;
use App\Models\AsistenciaM;
use App\Models\Sede;
use CodeIgniter\Controller;


class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }
    
    public function menu()
    {
        $Trabajador = new TrabajadorM();
        $datos['trabajadores'] = $Trabajador->orderBy('id', 'ASC')->findAll();
        $datos['cabecera']= view('cabecera');
        $datos['modalusuario']= view('modalusuario');

        return view('menu', $datos);
    }
    
    public function obtenerUsuario($id)
    {
        $usuarioM = new TrabajadorM();
        $usuario = $usuarioM->find($id);
        return $usuario;
    }
    
    public function huella()
    {
        
        return view('huella',);
    }
    public function tasistencia(){

        $Trabajador = new TrabajadorM();
        $asistencia = new AsistenciaM();

        $datos['trabajadores'] = $Trabajador->orderBy('id', 'ASC')->findAll();
        $datos['asistencias'] = $asistencia->orderBy('id', 'ASC')->findAll();
        $datos['cabecera']= view('cabecera');
        $datos['modalusuario']= view('modalusuario');
        
        return view('tasistencia', $datos);
    }
    public function tusuarios()
{
    $Trabajador = new TrabajadorM();
    $sede = new Sede();

    $datos['trabajadores'] = $Trabajador->orderBy('id', 'ASC')->findAll();
    $datos['sede'] = $sede->orderBy('id', 'ASC')->findAll();
    $datos['cabecera']= view('cabecera');
    $datos['modalusuario']= view('modalusuario');

    return view('tusuarios', $datos);
}


    
}
