<?php 
namespace App\Models;

use CodeIgniter\Model;

class AsistenciaM extends Model{
    protected $table      = 'asistencia';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     protected $allowedFields = ['id_trabajador','fecha','hora','id_sede','id_huella'];
}