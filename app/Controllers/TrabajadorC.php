<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\TrabajadorM;
use App\Models\UsuarioM;
use App\Models\Sede;
use App\Models\DactilarM;


class TrabajadorC extends Controller
{
    public function trabajador()
    {
        return view('trabajador');
    }


    public function usuario(){
        return view('usuario');
    }
    public function guardarusuario(){
        $Trabajador = new UsuarioM();

        $validacion = $this->validate([
            'id' => 'required',
        ]);

        if (!$validacion) {
            $session = session();
            $session->setFlashdata('sms', 'Todos los campos deben de estar llenos.');

            return redirect()->back()->withInput();
        }

        $subir = [
            'id' => $this->request->getVar('id'),
            'id_rol'=> '2'
        ];

        $Trabajador->insert($subir);

        return redirect()->to(base_url('/dactilar'));

    }


    public function dactilar(){
        return view('dactilar');
    }
    public function guardardactilar()
{
    $Trabajador = new DactilarM();

    $validacion = $this->validate([
        'huella' => 'required',
    ]);

    if (!$validacion) {
        $session = session();
        $session->setFlashdata('sms', 'Todos los campos deben de estar llenos.');

        return redirect()->back()->withInput();
    }

    // Obtener el último valor del atributo id de la tabla usuario
    $ultimoIDUsuario = $this->obtenerUltimoIDUsuario();

    // Generar el valor para el atributo id_huella
    $indice = '_INDICE'; // Índice a concatenar
    $idHuella = $ultimoIDUsuario . $indice;

    $subir = [
        'id_huella' => $idHuella,
        'huella' => $this->request->getVar('huella'),

    ];

    $Trabajador->insert($subir);

    return redirect()->to(base_url('/trabajador'));
}

// Obtener el último valor del atributo id de la tabla usuario
private function obtenerUltimoIDUsuario()
{
    $db = db_connect();
    $ultimoID = $db->query("SELECT id FROM usuario ORDER BY id DESC LIMIT 1")->getRow();
    return $ultimoID->id;
}
private function obtenerUltimoIDHuella()
{
    $db = db_connect();
    $ultimoID = $db->query("SELECT id_huella FROM huella ORDER BY id_huella DESC LIMIT 1")->getRow();
    return $ultimoID->id_huella;
}




public function guardar(){

    $Trabajador = new TrabajadorM();
    
    $validacion = $this->validate([
        'nombre'=>'required',
        'paterno'=>'required',
        'materno'=>'required',
        'puesto'=>'required'
    ]);

    if(!$validacion){
        $session=session();
        $session->setFlashdata('sms','Todos los campos deben de estar llenos.');

        return redirect()->back()->withInput();
    }

        // Obtener el último valor del atributo id de la tabla usuario
        $ultimoIDUsuario = $this->obtenerUltimoIDUsuario();
        // Obtener el último valor del atributo id_huella de la tabla huella
        $ultimoIDHuella = $this->obtenerUltimoIDHuella();

    $subir=[
        'id'=>$ultimoIDUsuario,
        'id_huella'=>$ultimoIDHuella,
        'nombres'=>$this->request->getVar('nombre'),
        'apellido_pat'=>$this->request->getVar('paterno'),
        'apellido_mat'=>$this->request->getVar('materno'),
        'puesto'=>$this->request->getVar('puesto'),
        'id_usuario'=>$ultimoIDUsuario,
    ];
    $Trabajador->insert($subir);
    return $this->response->redirect(base_url('/sede'));
}

    public function sede(){
        return view('sede');
    }
    public function guardarsede(){
        $Trabajador = new Sede();

        $validacion = $this->validate([
            'sede'=> 'required',
            'id' => 'required'
        ]);

        if (!$validacion) {
            $session = session();
            $session->setFlashdata('sms', 'Todos los campos deben de estar llenos.');

            return redirect()->back()->withInput();
        }

        $subir = [
            'id' => $this->request->getVar('sede'),
            'nombre'=> $this->request->getVar('id'),
        ];

        $Trabajador->insert($subir);

        return redirect()->to(base_url('/dactilar'));

    }
}

    
    

