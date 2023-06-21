<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\TrabajadorM;
use App\Models\AsistenciaM;

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


}
