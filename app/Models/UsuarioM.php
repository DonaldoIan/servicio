<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioM extends Model{
    protected $table      = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','usuario','contraseña','id_rol'];
}