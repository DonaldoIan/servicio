<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

class Autoload extends AutoloadConfig
{
    public $psr4 = [
        APP_NAMESPACE => APPPATH, // For custom app namespace
        'Config'      => APPPATH . 'Config',
        'Dompdf'      => ROOTPATH . 'vendor/dompdf/dompdf/src', // Agregamos el autoload para Dompdf
    ];

    public $classmap = [];

    public $files = [];

    public $helpers = [];
}
