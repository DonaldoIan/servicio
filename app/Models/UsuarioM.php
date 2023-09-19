<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioM extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'usuario', 'contraseña', 'id_rol'];

    public function login_user($email, $password)
    {
        // Realiza la consulta para buscar un usuario con el correo y contraseña proporcionados
        return $this->where('usuario', $email)
                    ->where('contraseña', $password)
                    ->first(); // Devuelve el primer resultado
    }
}
