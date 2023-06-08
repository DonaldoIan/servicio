<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioM extends Model{
    protected $table      = 'sede';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','nombre'];
}