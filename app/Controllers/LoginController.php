<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login/index');
    }

    public function logar()
    {
        $validated = $this->validate(
            [
                'email' => 'required|valid_email',
                'senha' => 'required'
            ],
            [
                'email' => [
                    'required' => 'O email é obrigatório',
                    'valid_email' => 'Informe um email válido'
                ],
                'senha' => [
                    'required' => 'A senha é obrigatória'
                ]
            ]
        );

        if (!$validated) {
            return redirect()->to('/')->with('erros', $this->validator->getErrors());
        }

        $user = new UserModel();
        $userFound = $user->select('id,nome,email,senha')->where('email', $this->request->getPost('email'))->first();

        if (!$userFound) {
            return redirect()->to('/')->with('error', 'Usuário ou senha incorretos!');
        }

        $senha = $this->request->getPost('senha');

        if (!password_verify($senha, $userFound->senha)) {
            return redirect()->to('/')->with('error', 'Usuário ou senha incorretos!');
        }

        unset($userFound->senha);
        session()->set('user', $userFound);
        return redirect()->to('home');
    }

    public function logout()
    {
        session()->remove('user');
        return view('login/logout');
    }
}
