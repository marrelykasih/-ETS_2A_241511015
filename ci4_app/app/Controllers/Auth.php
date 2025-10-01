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
            // simpan data user ke session
            $session->set([
                'id'       => $user['id'],
                'username' => $user['username'],
                'fullname' => $user['fullname'],
                'role'     => $user['role'],
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
