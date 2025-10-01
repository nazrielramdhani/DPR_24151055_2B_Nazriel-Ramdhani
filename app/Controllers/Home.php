<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user'  => session()->get()
        ];
        echo view('dashboard', $data);
    }
}
