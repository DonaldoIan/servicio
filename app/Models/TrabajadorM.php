<?php

namespace App\Models;

use CodeIgniter\Model;

class TrabajadorM extends Model
{
    protected $table = 'trabajador';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido_pat', 'apellido_mat', 'puesto'];

    
}
