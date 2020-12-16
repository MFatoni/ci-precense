<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\MahasiswaModel;
use App\Models\KehadiranModel;

class Kelas extends BaseController
{
    public function __construct()
    {
        $this->kelas = new KelasModel();
        $this->mahasiswa = new MahasiswaModel();
        $this->kehadiran = new KehadiranModel();
    }
    public function index()
    {
        $data['kelas'] = $this->kelas->getKelas();
        return view('admin/kelas/index', $data);
    }

    public function formAdd()
    {
        return view('admin/kelas/form_add');
    }

    public function store()
    {
        $kelasNama = $this->request->getPost('kelas_nama');
        $data = [
            'kelas_nama' => $kelasNama,
        ];
        $simpan = $this->kelas->insertKelas($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil menambah data');
            return redirect()->route('admin_data_kelas');
        }
    }


    public function formUpdate($id)
    {
        $data = $this->kelas->getKelas($id);
        return view('admin/kelas/form_update', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('kelas_id');
        $kelas_nama = $this->request->getPost('kelas_nama');
        $data = [
            'kelas_nama' => $kelas_nama,
        ];
        $ubah = $this->kelas->updateKelas($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil mengubah data');
            return redirect()->route('admin_data_kelas');
        }
    }

    public function delete($id)
    {
        $hapusKehadiranByKelas = $this->kehadiran->deleteKehadiranByKelas($id);
        $hapusMahasiswaByKelas = $this->mahasiswa->deleteMahasiswaByKelas($id);
        $hapusKelas = $this->kelas->deleteKelas($id);
        if($hapusKelas && $hapusKehadiranByKelas && $hapusMahasiswaByKelas)
        {
            session()->setFlashdata('warning', 'Berhasil menghapus data');
            return redirect()->route('admin_data_kelas');
        }
    } 
}
