<?php 
namespace App\Models;

use CodeIgniter\Model;

class DactilarM extends Model{
    protected $table      = 'huella';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     protected $allowedFields = ['huella_registro','id_trabajador'];
}