<?php

namespace App\Controllers;

use App\Models\TrabajadorM;
use App\Models\AsistenciaM;
use App\Models\Sede;
use App\Models\UsuarioM;
use CodeIgniter\Controller;
// Importar la clase FPDF
use FPDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class Home extends BaseController
{
    protected $user_model; // Agrega esta línea para definir la propiedad $user_model
    protected $session; // Agrega esta línea para definir la propiedad $session

    public function __construct()
    {
        $this->user_model = new UsuarioM(); // Carga el modelo UsuarioM
        $this->session = \Config\Services::session(); // Carga la biblioteca de sesión
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
                $this->session->set('user', $user); // Usa set() en lugar de set_userdata()
                return redirect()->to('menu');
            } else if ($rol == 2) {
                return redirect()->to('huella');
            } else {
                $this->session->setFlashdata('error', 'El rol no existe'); // Usa setFlashdata() en lugar de set_flashdata()
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
        $sede = new Sede();

        $datos['trabajadores'] = $Trabajador->orderBy('id', 'ASC')->findAll();
        $datos['sede'] = $sede->orderBy('id', 'ASC')->findAll();
        $datos['cabecera'] = view('cabecera');
        $datos['modalusuario'] = view('modalusuario');

        return view('tusuarios', $datos);
    }

    public function reporte()
{
    // Crear opciones para Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);

    // Crear una instancia de Dompdf
    $pdf = new Dompdf($options);

    // Contenido HTML para el PDF
    $html = '<html><body>';
    $html .= '<h1 style="text-align: center; color: #000080; font-weight: bold;">Reporte de asistencias de trabajadores</h1>';

    // Agregar una imagen al reporte
    $imageUrl = base_url('public/img/logo.png');
    $html .= '<img src="' . $imageUrl . '" height="90" style="display: block; margin: 0 auto;" />';

    // Estilos CSS para la tabla
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

    // Obtener los datos de las asistencias
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

    // Cargar el contenido HTML en Dompdf
    $pdf->loadHtml($html);

    // Renderizar el PDF
    $pdf->render();

    // Configurar los encabezados y el tipo de contenido
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="reporte_trabajadores.pdf"');

    // Enviar el PDF al navegador
    $pdf->stream();
}

}
