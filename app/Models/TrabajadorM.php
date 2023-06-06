<?php

namespace App\Models;

use CodeIgniter\Model;

class TrabajadorM extends Model
{
    protected $table = 'trabajador';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','id_huella', 'nombres', 'apellido_pat', 'apellido_mat', 'puesto', 'id_usuario'];

    
}
