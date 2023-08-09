<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;


class Login extends Controller{


    //logeo
    public function logeo()
    {
        helper(['form']);
        return view('login');
    } 
  
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();

        // Obtiene los datos del formulario
        $email = trim($this->request->getVar('email'));
        $password = trim($this->request->getVar('password'));

        // Busca el registro de usuario correspondiente al correo electrónico
        $data = $userModel->where('email', $email)->first();

        if ($data) {
            // Verifica la contraseña ingresada con la almacenada en la base de datos
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);//quitaloo weyyyy password_verify
        
            if ($authenticatePassword) {
                $session->set('user_id', $data['id']); // Establece el ID de usuario en la sesión
                $rol = $data['rol_id'];
                
                if($rol == 2){
                    $ses_data = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/perfil');
                }else{
                    $ses_data = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/admin');
                }
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                echo($pass);
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/login');
        }
    }


   
}