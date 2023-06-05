<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TrabajadorM;
use App\Models\UsuarioM;

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

        return redirect()->to(base_url('/menu'));

    }
    public function guardar()
    {
        $Trabajador = new TrabajadorM();

        $validacion = $this->validate([
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'puesto' => 'required',
            'id_huella' => 'required',
            'id_usuario' => 'required'
        ]);

        if (!$validacion) {
            $session = session();
            $session->setFlashdata('sms', 'Todos los campos deben de estar llenos.');

            return redirect()->back()->withInput();
        }

        // Obtener los valores de las llaves foráneas
        $idHuella = $this->request->getVar('id_huella');
        $idUsuario = $this->request->getVar('id_usuario');

        // Obtener los valores de las tablas relacionadas
        $valorHuella = obtenerValorHuella($idHuella);
        $nombreUsuario = obtenerNombreUsuario($idUsuario);

        // Verificar si se obtuvieron los valores de las tablas relacionadas
        if (!$valorHuella || !$nombreUsuario) {
            $session = session();
            $session->setFlashdata('sms', 'No se encontraron los valores de las llaves foráneas.');

            return redirect()->back()->withInput();
        }

        // Crear el array de datos a insertar
        $subir = [
            'nombres' => $this->request->getVar('nombre'),
            'apellido_pat' => $this->request->getVar('paterno'),
            'apellido_mat' => $this->request->getVar('materno'),
            'puesto' => $this->request->getVar('puesto'),
            'id_huella' => $idHuella,
            'id_usuario' => $idUsuario,
            'valor_huella' => $valorHuella,
            'nombre_usuario' => $nombreUsuario
        ];

        $Trabajador->insert($subir);

        return redirect()->to(base_url('/trabajador'));
    }

    // Obtener el valor de la huella en base al ID de la huella
    private function obtenerValorHuella($idHuella)
    {
        // Lógica para obtener el valor de la huella
        // Puedes implementar tu propia lógica de consulta a la tabla "huella" y obtener el valor correspondiente

        // Ejemplo:
        // $valorHuella = $this->db->select('valor')->from('huella')->where('id', $idHuella)->get()->row('valor');

        // Retorna el valor de la huella
        // return $valorHuella;
    }

    // Obtener el nombre de usuario en base al ID de usuario
    private function obtenerNombreUsuario($idUsuario)
    {
        // Lógica para obtener el nombre de usuario
        // Puedes implementar tu propia lógica de consulta a la tabla "usuario" y obtener el nombre correspondiente

        // Ejemplo:
        // $nombreUsuario = $this->db->select('nombre')->from('usuario')->where('id', $idUsuario)->get()->row('nombre');

        // Retorna el nombre de usuario
        // return $nombreUsuario;
    }
}
