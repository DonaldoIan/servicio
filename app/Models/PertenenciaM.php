<?php 
namespace App\Models;

use CodeIgniter\Model;

class PertenenciaM extends Model{
    protected $table      = 'pertenencia';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','id_trabajador','id_sede'];
}