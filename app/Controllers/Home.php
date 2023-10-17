<?php

namespace App\Controllers;

use App\Models\TrabajadorM;
use App\Models\AsistenciaM;
use App\Models\Sede;
use App\Models\UsuarioM;
use CodeIgniter\Controller;
use FPDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class Home extends BaseController
{
    protected $user_model;
    protected $session;

    public function __construct()
    {
        $this->user_model = new UsuarioM();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('index');
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password_user');

        $user = $this->user_model->login_user($email, $password);

        if ($user) {
            $rol = $user['id_rol'];

            if ($rol == 1) {
                $this->session->set('user', $user);
                return redirect()->to('menu');
            } else if ($rol == 2) {
                return redirect()->to('huella');
            } else {
                $this->session->setFlashdata('error', 'El rol no existe');
                return redirect()->to('/');
            }
        } else {
            $this->session->setFlashdata('error', 'Los datos ingresados son incorrectos');
            return redirect()->to('/');
        }
    }

    public function menu()
    {
        $Trabajador = new TrabajadorM();
        $datos['trabajadores'] = $Trabajador->orderBy('id', 'ASC')->findAll();
        $datos['cabecera'] = view('cabecera');
        $datos['modalusuario'] = view('modalusuario');

        return view('menu', $datos);
    }

    public function obtenerUsuario($id)
    {
        $usuarioM = new TrabajadorM();
        $usuario = $usuarioM->find($id);
        return $usuario;
    }

    public function huella()
    {
        return view('huella');
    }

    public function tasistencia()
    {
        $Trabajador = new TrabajadorM();
        $asistencia = new AsistenciaM();

        $datos['trabajadores'] = $Trabajador->orderBy('id', 'ASC')->findAll();
        $datos['asistencias'] = $asistencia->orderBy('id', 'ASC')->findAll();
        $datos['cabecera'] = view('cabecera');
        $datos['modalusuario'] = view('modalusuario');

        return view('tasistencia', $datos);
    }

    public function tusuarios()
    {
        $Trabajador = new TrabajadorM();
        $sedeModel = new Sede();

        $datos['trabajadores'] = $Trabajador->orderBy('id', 'ASC')->findAll();
        $datos['sede'] = $sedeModel->orderBy('id', 'ASC')->findAll();
        $datos['cabecera'] = view('cabecera');
        $datos['modalusuario'] = view('modalusuario');

        return view('tusuarios', $datos);
    }

    public function reporte()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $pdf = new Dompdf($options);

        $html = '<html><body>';
        $html .= '<h1 style="text-align: center; color: #000080; font-weight: bold;">Reporte de asistencias de trabajadores</h1>';

        $html .= '<style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th {
                    font-weight: bold;
                }
                th, td {
                    padding: 5px;
                    border: 1px solid #000;
                }
                th {
                    text-align: center;
                }
              </style>';

        $html .= '<table>';
        $html .= '<tr><th>Trabajador</th><th>Fecha</th><th>Hora</th><th>Sede</th><th>Huella</th></tr>';

        $asistenciaModel = new AsistenciaM();
        $asistencias = $asistenciaModel->orderBy('id', 'ASC')->findAll();

        foreach ($asistencias as $asistencia) {
            $html .= '<tr>';
            $html .= '<td>' . $asistencia['id_trabajador'] . '</td>';
            $html .= '<td>' . $asistencia['fecha'] . '</td>';
            $html .= '<td>' . $asistencia['hora'] . '</td>';
            $html .= '<td>' . $asistencia['id_sede'] . '</td>';
            $html .= '<td>' . $asistencia['id_huella'] . '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';
        $html .= '</body></html>';

        $pdf->loadHtml($html);
        $pdf->render();

        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="reporte_trabajadores.pdf"');
        $pdf->stream();
    }

    public function repviatico()
{
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);

    $pdf = new Dompdf($options);

    $html = '<html><body>';
    $html .= '<h1 style="text-align: center; color: #000080; font-weight: bold;">Reporte de asistencias de trabajadores</h1>';
    $html .= '<h4 style="text-align: center; color: #000000; font-weight: bold;">Todos los trabajadores que aparecen en este reporte, RECIBEN viáticos</h4>';

    $html .= '<style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th {
                font-weight: bold;
            }
            th, td {
                padding: 5px;
                border: 1px solid #000;
            }
            th {
                text-align: center;
            }
          </style>';

    $html .= '<table>';
    $html .= '<tr><th>Trabajador</th><th>Fecha</th><th>Hora</th><th>Sede</th><th>Huella</th></tr>';

    // Consulta los trabajadores con viáticos "si" desde el modelo TrabajadorM
    $trabajadorModel = new TrabajadorM();
    $trabajadores = $trabajadorModel->where('viaticos', 'si')->findAll();

    //$html .= '<pre>' . print_r($trabajadores, true) . '</pre>';

    // Obtén las asistencias para los trabajadores con viáticos
    $asistenciaModel = new AsistenciaM();
    foreach ($trabajadores as $trabajador) {
        $asistencias = $asistenciaModel->where('id_trabajador', $trabajador['nombre'])->findAll();
        foreach ($asistencias as $asistencia) {
            $html .= '<tr>';
            $html .= '<td>' . $trabajador['nombre'] . '</td>';
            $html .= '<td>' . $asistencia['fecha'] . '</td>';
            $html .= '<td>' . $asistencia['hora'] . '</td>';
            $html .= '<td>' . $asistencia['id_sede'] . '</td>';
            $html .= '<td>' . $asistencia['id_huella'] . '</td>';
            $html .= '</tr>';
        }
    }

    $html .= '</table>';
    $html .= '</body></html>';

    $pdf->loadHtml($html);
    $pdf->render();

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="reporte_trabajadores.pdf"');
    $pdf->stream();
}


    public function repusuario()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $pdf = new Dompdf($options);

        $html = '<html><body>';
        $html .= '<h1 style="text-align: center; color: #000080; font-weight: bold;">Reporte de Usuarios Registrados</h1>';


        $html .= '<style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th {
                    font-weight: bold;
                }
                th, td {
                    padding: 5px;
                    border: 1px solid #000;
                }
                th {
                    text-align: center;
                }
              </style>';

        $html .= '<table>';
        $html .= '<tr><th>ID_Trabajador</th><th>Nombre</th><th>Puesto</th><th>Viáticos</th></tr>';

        $asistenciaModel = new TrabajadorM();
        $asistencias = $asistenciaModel->orderBy('id', 'ASC')->findAll();
        $sedeModel = new Sede();

        foreach ($asistencias as $asistencia) {
            $html .= '<tr>';
            $html .= '<td>' . $asistencia['id_trabajador'] . '</td>';
            $html .= '<td>' . $asistencia['nombre'] . ' ' . $asistencia['apellido_pat'] . '</td>';
            $html .= '<td>' . $asistencia['puesto'] . '</td>';
            $html .= '<td>' . $asistencia['viaticos'] . '</td>';
            
            
            $html .= '</tr>';
        }
        

        $html .= '</table>';
        $html .= '</body></html>';

        $pdf->loadHtml($html);
        $pdf->render();

        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="reporte_trabajadores.pdf"');
        $pdf->stream();
    }
}
