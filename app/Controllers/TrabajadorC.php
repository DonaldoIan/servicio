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
      $session->setFlashdata('sms', 'Todos los campos deben de estar llenos.');

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
  public function borrar($id=null){

    $Usuario = new TrabajadorM();
    $sede = new Sede();

    $Usuario->where('id',$id)->delete($id);
    $sede->where('id',$id)->delete($id);

    return $this->response->redirect(base_url('menu'));

  }
}
