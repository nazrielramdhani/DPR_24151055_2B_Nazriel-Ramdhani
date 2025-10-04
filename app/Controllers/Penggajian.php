<?php

namespace App\Controllers;

use App\Models\PenggajianModel;
use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel;

class Penggajian extends BaseController
{
    public function index()
    {
        $penggajianModel = new PenggajianModel();
        $anggotaModel    = new AnggotaModel();
        $komponenModel   = new KomponenGajiModel();

        $dataPenggajian = $penggajianModel->findAll();

        $result = [];
        foreach ($dataPenggajian as $row) {
            $anggota  = $anggotaModel->find($row['id_anggota']);
            $komponen = $komponenModel->find($row['id_komponen_gaji']);

            $result[] = [
                'id_anggota' => $anggota['id_anggota'] ?? '-',
                'nama_anggota' => trim(($anggota['gelar_depan'] ?? '') . ' ' . $anggota['nama_depan'] . ' ' . $anggota['nama_belakang'] . ' ' . ($anggota['gelar_belakang'] ?? '')),
                'jabatan' => $anggota['jabatan'] ?? '-',
                'nama_komponen' => $komponen['nama_komponen'] ?? '-',
                'kategori' => $komponen['kategori'] ?? '-',
                'nominal' => $komponen['nominal'] ?? 0,
                'satuan' => $komponen['satuan'] ?? '-',
            ];
        }

        $data['penggajian'] = $result;

        return view('penggajian/index', $data);
    }

    public function create()
    {
        $anggotaModel   = new AnggotaModel();
        $komponenModel  = new KomponenGajiModel();

        $data['anggota']  = $anggotaModel->findAll();
        $data['komponen'] = $komponenModel->findAll();

        return view('penggajian/create', $data);
    }

    public function store()
    {
        $penggajianModel = new PenggajianModel();
        $anggotaModel    = new AnggotaModel();
        $komponenModel   = new KomponenGajiModel();

        $idAnggota  = $this->request->getPost('id_anggota');
        $idKomponen = $this->request->getPost('id_komponen_gaji');

        if (! $idAnggota || ! $idKomponen) {
            return redirect()->back()->with('error', 'Pilih anggota dan komponen.');
        }

        $anggota = $anggotaModel->find($idAnggota);
        if (! $anggota) {
            return redirect()->back()->with('error', 'Anggota tidak ditemukan.');
        }

        $komponen = $komponenModel->find($idKomponen);
        if (! $komponen) {
            return redirect()->back()->with('error', 'Komponen tidak ditemukan.');
        }

        if ($komponen['jabatan'] !== 'Semua' && $komponen['jabatan'] !== $anggota['jabatan']) {
            return redirect()->back()->with('error', 'Komponen tidak sesuai dengan jabatan anggota.');
        }

        $exists = $penggajianModel
            ->where('id_anggota', $idAnggota)
            ->where('id_komponen_gaji', $idKomponen)
            ->first();

        if ($exists) {
            return redirect()->back()->with('error', 'Komponen gaji ini sudah ditambahkan untuk anggota tersebut!');
        }

        $penggajianModel->insert([
            'id_anggota'       => $idAnggota,
            'id_komponen_gaji' => $idKomponen
        ]);

        return redirect()->to('/penggajian/create')->with('success', 'Komponen gaji berhasil ditambahkan.');
    }

    public function edit($idAnggota = null, $namaKomponen = null)
    {
        $anggotaModel   = new AnggotaModel();
        $komponenModel  = new KomponenGajiModel();
        $penggajianModel = new PenggajianModel();

        $anggota = $anggotaModel->find($idAnggota);
        $komponen = $komponenModel->where('nama_komponen', $namaKomponen)->first();

        if (! $anggota || ! $komponen) {
            return redirect()->to('/penggajian')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'anggota' => $anggotaModel->findAll(),
            'komponen' => $komponenModel->findAll(),
            'selected' => [
                'id_anggota' => $idAnggota,
                'id_komponen_gaji' => $komponen['id_komponen_gaji']
            ]
        ];

        return view('penggajian/edit', $data);
    }
    
    public function update()
    {
        $penggajianModel = new PenggajianModel();
        $anggotaModel    = new AnggotaModel();
        $komponenModel   = new KomponenGajiModel();

        $idAnggotaOld  = $this->request->getPost('id_anggota_old');
        $idKomponenOld = $this->request->getPost('id_komponen_old');
        $idAnggotaNew  = $this->request->getPost('id_anggota');
        $idKomponenNew = $this->request->getPost('id_komponen_gaji');

        if (! $idAnggotaNew || ! $idKomponenNew) {
            return redirect()->back()->with('error', 'Pilih anggota dan komponen.');
        }

        $anggota = $anggotaModel->find($idAnggotaNew);
        $komponen = $komponenModel->find($idKomponenNew);

        if ($komponen['jabatan'] !== 'Semua' && $komponen['jabatan'] !== $anggota['jabatan']) {
            return redirect()->back()->with('error', 'Komponen tidak sesuai dengan jabatan anggota.');
        }

        $exists = $penggajianModel
            ->where('id_anggota', $idAnggotaNew)
            ->where('id_komponen_gaji', $idKomponenNew)
            ->first();

        if ($exists && ($idAnggotaNew != $idAnggotaOld || $idKomponenNew != $idKomponenOld)) {
            return redirect()->back()->with('error', 'Data penggajian ini sudah ada!');
        }

        $penggajianModel
            ->where('id_anggota', $idAnggotaOld)
            ->where('id_komponen_gaji', $idKomponenOld)
            ->delete();

        $penggajianModel->insert([
            'id_anggota' => $idAnggotaNew,
            'id_komponen_gaji' => $idKomponenNew
        ]);

        return redirect()->to('/penggajian')->with('success', 'Data penggajian berhasil diubah.');
    }

    public function delete()
    {
        $idAnggota = $this->request->getPost('id_anggota');
        $namaKomponen = $this->request->getPost('nama_komponen');

        $penggajianModel = new PenggajianModel();
        $komponenModel = new KomponenGajiModel();

        $komponen = $komponenModel->where('nama_komponen', $namaKomponen)->first();

        if (! $komponen) {
            return redirect()->to('/penggajian')->with('error', 'Komponen tidak ditemukan.');
        }

        $deleted = $penggajianModel
            ->where('id_anggota', $idAnggota)
            ->where('id_komponen_gaji', $komponen['id_komponen_gaji'])
            ->delete();

        if ($deleted) {
            return redirect()->to('/penggajian')->with('success', 'Data penggajian berhasil dihapus.');
        } else {
            return redirect()->to('/penggajian')->with('error', 'Gagal menghapus data.');
        }
    }
}
