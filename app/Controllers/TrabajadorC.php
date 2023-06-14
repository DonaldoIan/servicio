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

    public function usuario()
    {
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

    // Insertar una nueva entrada en la tabla asistencia
    $asistenciaData = [
        'id_pertenencia' => $ultimoID,
        'fecha' => date('Y-m-d'), // Fecha actual
        'hora_entrada' => date('Y-m-d H:i:s'), // Fecha y hora actual
    ];

    $asistenciaModel->insert($asistenciaData);

    return redirect()->to(base_url('/dactilar'));
}


    public function dactilar()
    {
        return view('dactilar');
    }

    public function guardardactilar()
    {
        $dactilarModel = new DactilarM();

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

        $dactilarModel->insert($subir);

        return redirect()->to(base_url('/trabajador'));
    }

    // Obtener el último valor del atributo usuario de la tabla usuario
    private function obtenerUltimoUsuario()
{
    $usuarioModel = new UsuarioM();
    $ultimoUsuario = $usuarioModel->orderBy('id', 'DESC')->first();

    return $ultimoUsuario ? (object) $ultimoUsuario : null;
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

    // Verificar si se obtuvo un resultado válido para $ultimoHuella
    $idHuella = $ultimoHuella ? $ultimoHuella->id_huella : null;

    $subir = [
        'id_trabajador' => $ultimoUsuario->usuario,
        'id_huella' => $idHuella,
        'nombres' => $this->request->getVar('nombre'),
        'apellido_pat' => $this->request->getVar('paterno'),
        'apellido_mat' => $this->request->getVar('materno'),
        'puesto' => $this->request->getVar('puesto'),
        'id_usuario' => $ultimoUsuario->usuario,
    ];
    $Trabajador->insert($subir);
    return $this->response->redirect(base_url('/sede'));
}

private function obtenerUltimoIDHuella()
{
    $db = db_connect();
    $ultimoHuella = $db->query("SELECT id_huella FROM huella ORDER BY id_huella DESC LIMIT 1")->getRow();
    return $ultimoHuella;
}

    public function sede()
    {
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
        // Obtener la fecha y hora actual
        $fechaActual = date('Y-m-d');
        $horaSalidaActual = date('H:i:s');

        // Actualizar la fecha y hora de salida de la última asistencia
        $asistenciaModel->update($asistencia['id'], [
            'fecha' => $fechaActual,
            'hora_salida' => $horaSalidaActual
        ]);
    }

    return redirect()->to(base_url('/menu'));
}









}
