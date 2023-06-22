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
    public function tusuarios()
{
    $Trabajador = new TrabajadorM();
    $sede = new Sede();

    $datos['trabajadores'] = $Trabajador->orderBy('id', 'ASC')->findAll();
    $datos['sede'] = $sede->orderBy('id', 'ASC')->findAll();

    if (!empty($_GET['id_trabajador'])) {
        $idTrabajador = $_GET['id_trabajador'];
        $trabajadorSeleccionado = $Trabajador->obtenerTrabajador($idTrabajador);

        if ($trabajadorSeleccionado) {
            $datos['trabajadorSeleccionado'] = $trabajadorSeleccionado;
        }
    }

    return view('tusuarios', $datos);
}

    public function obtenerTrabajador($id)
    {
        $trabajador = $this->find($id); // Suponiendo que tienes un método "find" para buscar un trabajador por su ID
    
        if ($trabajador) {
            return $trabajador;
        } else {
            return null; // O puedes lanzar una excepción o manejar el caso de error de alguna otra manera
        }
    }
    
}
