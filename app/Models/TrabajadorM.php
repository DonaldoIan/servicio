<?php

namespace App\Models;

use CodeIgniter\Model;

class TrabajadorM extends Model
{
    protected $table = 'trabajador';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_huella', 'nombres', 'apellido_pat', 'apellido_mat', 'puesto', 'id_usuario'];

    public function obtenerDatosRelacionados($trabajadorId)
    {
        return $this->select('trabajador.*, huella.valor as valor_huella, usuario.nombre as nombre_usuario')
            ->join('huella', 'trabajador.id_huella = huella.id')
            ->join('usuario', 'trabajador.id_usuario = usuario.id')
            ->where('trabajador.id', $trabajadorId)
            ->first();
    }
}
