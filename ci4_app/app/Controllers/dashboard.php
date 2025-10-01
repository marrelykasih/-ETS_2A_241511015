<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $data = [
            'title'    => 'Dashboard',
            'username' => session()->get('username'),
            'fullname' => session()->get('fullname'),
            'role'     => session()->get('role')
        ];

        return view('dashboard', $data);
    }
    public function create()
{
    if (session()->get('role') !== 'admin') {
        return redirect()->to('/courses');
    }

    return view('courses/create'); // <- penting
}

}
