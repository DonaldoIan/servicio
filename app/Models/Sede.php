<?php 
namespace App\Models;

use CodeIgniter\Model;

class Sede extends Model{
    protected $table      = 'sede';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sede'];
}