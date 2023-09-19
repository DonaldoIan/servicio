<?php

namespace App\Controllers;

use App\Models\TrabajadorM;
use App\Models\AsistenciaM;
use App\Models\Sede;
use App\Models\UsuarioM;
use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $user_model; // Agrega esta línea para definir la propiedad $user_model
    protected $session; // Agrega esta línea para definir la propiedad $session

    public function __construct()
    {
        $this->user_model = new UsuarioM(); // Carga el modelo UsuarioM
        $this->session = \Config\Services::session(); // Carga la biblioteca de sesión
    }

    public function index()
    {
        return view('index');
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password_user');

        $user = $this->user_model->login_user($email, $password);

        if ($user) {
            $rol = $user['id_rol'];

            if ($rol == 1) {
                $this->session->set('user', $user); // Usa set() en lugar de set_userdata()
                return redirect()->to('menu');
            } else if ($rol == 2) {
                return redirect()->to('huella');
            } else {
                $this->session->setFlashdata('error', 'El rol no existe'); // Usa setFlashdata() en lugar de set_flashdata()
                return redirect()->to('/');
            }
        } else {
            $this->session->setFlashdata('error', 'Los datos ingresados son incorrectos');
            return redirect()->to('/');
        }
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


public function reporte()
{
    return view('reporte');
}


    
}
