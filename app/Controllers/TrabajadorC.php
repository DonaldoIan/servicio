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
        'trabajador' => 'required', 
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
        'puesto' => $this->request->getVar('tema'),
        'viaticos' => $this->request->getVar('via'),
        'id_trabajador' => $this->request->getVar('trabajador')
    ];    
    $otro = [
        'sede' => $this->request->getVar('sede')
    ];  

    $nombreag = $this->request->getVar('nombre');//se guarda en variable el nombre de la persona para mostrar en la alerta
    $apellidoag = $this->request->getVar('paterno');//se guarda en variable el apellido de la persona para mostrar en la alerta
    $Trabajador->insert($subir);
    $sede->insert($otro);

    // Redirigir y refrescar la página
    return redirect()->to(site_url('menu'))->with('mensaje', 'Trabajador agregado: ' . $nombreag . ' ' . $apellidoag);

}



    public function borrar($id=null)
    {
        $Usuario = new TrabajadorM();
        $sede = new Sede();

        $Usuario->where('id', $id)->delete($id);
        $sede->where('id', $id)->delete($id);

        return redirect()->to(site_url('tusuarios'))->with('borrar', 'Usuario borrado');
    }
    public function editar($id_producto = null)
{
    $ep = new ProductoModel();
    $datos['producto'] = $ep->where('id_producto', $id_producto)->first();

    return view('ep', $datos);
}

    public function actualizar(){

        $usuarios = new TrabajadorM();
        $sedeModel = new Sede();

        $id=$this->request->getVar('id');
        
        $validacion = $this->validate([
            'nombre'=>'required',
            'paterno'=>'required',
            'materno'=>'required',
            'trabajador'=>'required',
        ]);
        if(!$validacion){
            $session=session();
            $session->setFlashdata('sms','Revise la información.');

            return redirect()->back()->withInput();
        }
        
        $subir = [
            'nombre' => $this->request->getVar('nombre'),
            'apellido_pat' => $this->request->getVar('paterno'),
            'apellido_mat' => $this->request->getVar('materno'),
            'puesto' => $this->request->getVar('tema'),
            'viaticos' => $this->request->getVar('via'),
            'id_trabajador' => $this->request->getVar('trabajador')
        ];    
        $otro = [
            'sede' => $this->request->getVar('sede')
        ];  
        $nombreag =$this->request->getVar('nombre');
        $apellidoag = $this->request->getVar('paterno');

        $usuarios->update($id, $subir); // Agrega el ID del trabajador y los datos a actualizar
        $sedeModel->update($id, $otro); // Agrega el ID de la sede y los datos a actualizar


        return redirect()->to(site_url('tusuarios'))->with('mensaje', 'Datos del trabajador actualizados: ' . $nombreag . ' ' . $apellidoag);
        
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

    return redirect()->to(site_url('menu'))->with('mensaje', 'Asistencia tomada: ' . $nombre);
}





}
