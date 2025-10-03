<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
           
            $session->set([
                'id_pengguna'       => $user['id_pengguna'],
                'username' => $user['username'],
                'email' => $user['email'],
                'nama_depan'     => $user['nama_depan'],
                'nama_belakang' => $user['nama_belakang'],
                'isLoggedIn' => true
            ]);

            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('error', 'Username atau password salah!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
