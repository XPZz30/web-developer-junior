<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Eloquent\User;
use CodeIgniter\Exceptions\PageNotFoundException;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function autenticar()
    {
        require_once APPPATH . 'Config/Eloquent.php';

        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $usuario = User::where('email', $email)->first();

        if (!$usuario || !password_verify($senha, $usuario->password)) {
            return redirect()->back()->with('erro', 'Usuário ou senha inválidos.');
        }



        // Salvando dados do usuário na sessão
        session()->set('usuario_logado', [
            'id' => $usuario->id,
            'nome' => $usuario->username,
            'email' => $usuario->email
        ]);


        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
