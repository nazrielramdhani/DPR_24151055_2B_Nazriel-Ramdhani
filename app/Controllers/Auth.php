<?php namespace App\Controllers;

use App\Models\PenggunaModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attempt()
    {
        $model = new PenggunaModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user', $user);
            return redirect()->to('/dashboard');
        }

        return redirect()->to('/login');
    }

    public function dashboard()
    {
        if (! session()->has('user')) {
            return redirect()->to('/login');
        }

        $user = session()->get('user');
        return view('dashboard', ['user' => $user]);
    }

    public function logout()
    {
        session()->remove('user');
        return redirect()->to('/login');
    }
}
