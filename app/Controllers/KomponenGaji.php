<?php

namespace App\Controllers;

use App\Models\KomponenGajiModel;

class KomponenGaji extends BaseController
{
    public function index()
    {
        $model = new KomponenGajiModel();
        $data['komponen'] = $model->findAll();

        return view('komponen/index', $data);
    }

    public function create()
    {
        return view('komponen/create');
    }

    public function store()
    {
        $model = new KomponenGajiModel();

        $data = [
            'nama_komponen' => $this->request->getPost('nama_komponen'),
            'kategori'      => $this->request->getPost('kategori'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'nominal'       => $this->request->getPost('nominal'),
            'satuan'        => $this->request->getPost('satuan'),
        ];

        $model->insert($data);

        return redirect()->to('/komponen')->with('success', 'Komponen gaji berhasil ditambahkan.');
    }
}
