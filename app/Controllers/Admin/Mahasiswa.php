<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\KehadiranModel;

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        $this->mahasiswa = new MahasiswaModel();
        $this->kehadiran = new KehadiranModel();
    }
    public function index($id)
    {
        $data['kelas_id'] = $id;
        $data['mahasiswa'] = $this->mahasiswa->getMahasiswaPerKelas($id);
        return view('admin/mahasiswa/index', $data);
    }

    public function formAdd($id)
    {
        $data['kelas_id'] = $id;
        return view('admin/mahasiswa/form_add', $data);
    }

    public function store()
    {
        $mahasiswaNama = $this->request->getPost('mahasiswa_nama');
        $kelasId = $this->request->getPost('kelas_id');
        $data = [
            'mahasiswa_nama' => $mahasiswaNama,
            'kelas_id' => $kelasId,
        ];

        $simpan = $this->mahasiswa->insertMahasiswa($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil menambahkan data');
            return redirect()->route('admin_data_mahasiswa', [$kelasId]);
        }
    }


    public function formUpdate($kelasId, $mahasiswaId)
    {
        $data['kelas_id'] = $kelasId;
        $data['mahasiswa'] = $this->mahasiswa->getMahasiswa($mahasiswaId);
        return view('admin/mahasiswa/form_update', $data);
    }

    public function update()
    {
        $mahasiswaId = $this->request->getPost('mahasiswa_id');
        $mahasiswaNama = $this->request->getPost('mahasiswa_nama');
        $kelasId = $this->request->getPost('kelas_id');
        $data = [
            'mahasiswa_nama' => $mahasiswaNama,
            'kelas_id' => $kelasId,
        ];
        $ubah = $this->mahasiswa->updateMahasiswa($data, $mahasiswaId);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil mengubah data');
            return redirect()->route('admin_data_mahasiswa', [$kelasId]);
        }
    }

    public function delete($kelasId, $id)
    {
        $hapusKehadiran = $this->kehadiran->deleteKehadiranByMahasiswa($id);
        $hapusMahasiswa = $this->mahasiswa->deleteMahasiswa($id);
        if ($hapusKehadiran && $hapusMahasiswa) {
            session()->setFlashdata('warning', 'Berhasil menghapus data');
            return redirect()->route('admin_data_mahasiswa', [$kelasId]);
        }
    }
}
