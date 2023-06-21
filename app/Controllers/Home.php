<?php

namespace App\Controllers;

use App\Models\TrabajadorM;
use App\Models\AsistenciaM;
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
        return view('menu', $datos);
    }
    
    public function obtenerUsuario($id)
    {
        $usuarioM = new TrabajadorM();
        $usuario = $usuarioM->find($id);
        return $usuario;
    }
    
    public function huella($id = null)
    {
        $usuario = $this->obtenerUsuario($id);
        return view('huella', ['usuario' => $usuario]);
    }
    public function tasistencia(){

        $Trabajador = new TrabajadorM();
        $asistencia = new AsistenciaM();

        $datos['trabajadores'] = $Trabajador->orderBy('id', 'ASC')->findAll();
        $datos['asistencias'] = $asistencia->orderBy('id', 'ASC')->findAll();
        
        return view('tasistencia', $datos);
    }
}
