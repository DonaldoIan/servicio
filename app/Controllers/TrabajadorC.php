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
    public function guardar()
    {
        $Trabajador = new TrabajadorM();
        $sede = new Sede();

        $validacion = $this->validate([
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'sede' => 'required', 
        ]);

        if (!$validacion) {
            $session = session();
            $session->setFlashdata('sms', 'Todos los campos deben estar llenos.');

            return redirect()->back()->withInput();
        }

        $subir = [
            'nombre' => $this->request->getVar('nombre'),
            'apellido_pat' => $this->request->getVar('paterno'),
            'apellido_mat' => $this->request->getVar('materno'),
            'puesto' => $this->request->getVar('tema')
        ];    
        $otro = [
            'sede' => $this->request->getVar('sede')
        ];  

        $Trabajador->insert($subir);
        $sede->insert($otro);

        // Redirigir y refrescar la página
        return redirect()->to(site_url('menu'))->with('status', 'Datos guardados exitosamente');
    }

    public function borrar($id=null)
    {
        $Usuario = new TrabajadorM();
        $sede = new Sede();

        $Usuario->where('id', $id)->delete($id);
        $sede->where('id', $id)->delete($id);

        return $this->response->redirect(base_url('menu'));
    }

    public function asistencia($id)
{
    $trabajadorM = new TrabajadorM();
    $dactilarM = new DactilarM();
    $asistenciaM = new AsistenciaM();
    $sedeM = new Sede();

    // Obtener el nombre del trabajador según el ID
    $nombre = $trabajadorM->getNombreById($id);
    // Obtener el nombre de sede según el ID
    $sedename = $sedeM->getNombreById($id);


    // Validar y guardar la huella digital
    $validacion = $this->validate([
        'huella' => 'required',
    ]);

    if (!$validacion) {
        $session = session();
        $session->setFlashdata('sms', 'Todos los campos deben estar llenos.');
        return redirect()->back()->withInput();
    }

    // Datos a insertar en el modelo DactilarM
    $datos = [
        'id_trabajador' => $nombre,
        'huella_registro' => $this->request->getVar('huella'),
    ];

    // Insertar los datos en el modelo DactilarM
    $dactilarM->insert($datos);

    // Datos a insertar en el modelo AsistenciaM
    $ga = [
        'id_trabajador' => $nombre,
        'fecha' => date('Y-m-d'),
        'hora' => date('Y-m-d H:i:s'),
        'id_sede' => $sedename,
        'id_huella' => 'registrada'
    ];

    // Insertar los datos en el modelo AsistenciaM
    $asistenciaM->insert($ga);

    return redirect()->to(base_url('/menu'));
}



}
