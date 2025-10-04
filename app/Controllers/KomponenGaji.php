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

    // Edit Komponen Gaji
    public function edit($id)
    {
        $model = new KomponenGajiModel();
        $data['komponen'] = $model->find($id);

        if (!$data['komponen']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Komponen dengan ID $id tidak ditemukan");
        }

        return view('komponen/edit', $data);
    }

    public function update($id)
    {
        $model = new KomponenGajiModel();

        $data = [
            'nama_komponen' => $this->request->getPost('nama_komponen'),
            'kategori'      => $this->request->getPost('kategori'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'nominal'       => $this->request->getPost('nominal'),
            'satuan'        => $this->request->getPost('satuan'),
        ];

        $model->update($id, $data);

        return redirect()->to('/komponen')->with('success', 'Data komponen gaji berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new KomponenGajiModel();

        $komponen = $model->find($id);
        if (!$komponen) {
            return redirect()->to('/komponen')->with('error', 'Data komponen tidak ditemukan.');
        }

        $model->delete($id);
        return redirect()->to('/komponen')->with('success', 'Komponen gaji berhasil dihapus.');
    }

}
