<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\TrabajadorM;
use App\Models\UsuarioM;
use App\Models\Sede;
use App\Models\DactilarM;
use App\Models\AsistenciaM;




class TrabajadorC extends Controller
{
    public function trabajador()
    {
        return view('trabajador');
    }


    public function usuario(){
        return view('usuario');
    }




    public function guardarusuario()
{
    $usuarioModel = new UsuarioM();
    $asistenciaModel = new AsistenciaM();

    $validacion = $this->validate([
        'id' => 'required',
    ]);

    if (!$validacion) {
        $session = session();
        $session->setFlashdata('sms', 'Todos los campos deben estar llenos.');

        return redirect()->back()->withInput();
    }

    $subir = [
        'usuario' => $this->request->getVar('id'),
        'id_rol' => '2'
    ];

    $usuarioModel->insert($subir);

    // Obtener el último ID insertado en la tabla usuario
    $ultimoID = $usuarioModel->insertID();

    // Insertar la fecha y hora inicial en la tabla asistencia
    $dataAsistencia = [
        'fecha' => date('Y-m-d'), // Fecha actual
        'hora_entrada' => date('H:i'), // Hora actual
    ];

    $asistenciaModel->insert($dataAsistencia);

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
        $session->setFlashdata('sms', 'Todos los campos deben estar llenos.');

        return redirect()->back()->withInput();
    }

    // Obtener el último valor del atributo usuario de la tabla usuario
    $ultimoUsuario = $this->obtenerUltimoUsuario();

    // Verificar si se obtuvo un resultado válido
    if ($ultimoUsuario) {
        $usuario = $ultimoUsuario->usuario;
    } else {
        $usuario = 'default'; // Valor predeterminado en caso de no obtener resultado
    }

    // Generar el valor para el atributo id_huella
    $indice = '_INDICE'; // Índice a concatenar
    $idHuella = $usuario . $indice;

    $subir = [
        'id_huella' => $idHuella,
        'huella' => $this->request->getVar('huella'),
    ];

    $Trabajador->insert($subir);

    return redirect()->to(base_url('/trabajador'));
}
// Obtener el último valor del atributo usuario de la tabla usuario
private function obtenerUltimoUsuario()
{
    $db = db_connect();
    $query = $db->query("SELECT usuario FROM usuario ORDER BY id DESC LIMIT 1");
    $ultimoUsuario = $query->getRow();

    return $ultimoUsuario;
}



private function obtenerUltimoIDHuella()
{
    $db = db_connect();
    $ultimoHuella = $db->query("SELECT id_huella FROM huella ORDER BY id_huella DESC LIMIT 1")->getRow();
    return $ultimoHuella;
}




public function guardar()
{
    $Trabajador = new TrabajadorM();

    $validacion = $this->validate([
        'nombre' => 'required',
        'paterno' => 'required',
        'materno' => 'required',
        'puesto' => 'required'
    ]);

    if (!$validacion) {
        $session = session();
        $session->setFlashdata('sms', 'Todos los campos deben de estar llenos.');

        return redirect()->back()->withInput();
    }

    // Obtener el último valor del atributo id de la tabla usuario
    $ultimoUsuario = $this->obtenerUltimoUsuario();
    // Obtener el último valor del atributo id_huella de la tabla huella
    $ultimoHuella = $this->obtenerUltimoIDHuella();

    $subir = [
        'id_trabajador' => $ultimoUsuario->usuario,
        'id_huella' => $ultimoHuella->id_huella,
        'nombres' => $this->request->getVar('nombre'),
        'apellido_pat' => $this->request->getVar('paterno'),
        'apellido_mat' => $this->request->getVar('materno'),
        'puesto' => $this->request->getVar('puesto'),
        'id_usuario' => $ultimoUsuario->usuario,
    ];
    $Trabajador->insert($subir);
    return $this->response->redirect(base_url('/sede'));
}


    public function sede(){
        return view('sede');
    }



    public function guardarsede()
{
    $sedeModel = new Sede();
    $asistenciaModel = new AsistenciaM();

    $validacion = $this->validate([
        'sede' => 'required',
        'id' => 'required'
    ]);

    if (!$validacion) {
        $session = session();
        $session->setFlashdata('sms', 'Todos los campos deben estar llenos.');

        return redirect()->back()->withInput();
    }

    $subir = [
        'id' => $this->request->getVar('sede'),
        'nombre' => $this->request->getVar('id'),
    ];

    $sedeModel->insert($subir);

    // Obtener el último ID insertado en la tabla sede
    $ultimoID = $sedeModel->insertID();

// Obtener la última asistencia del trabajador
$asistencia = $asistenciaModel->where('id_pertenencia', $ultimoID)->orderBy('id', 'DESC')->first();

if ($asistencia) {
    // Actualizar la hora de salida de la última asistencia
    $asistenciaModel->update($asistencia['id'], [
        'hora_salida' => date('Y-m-d H:i:s') // Fecha y hora actual
    ]);
}


    return redirect()->to(base_url('/menu'));
}


}

    
    

