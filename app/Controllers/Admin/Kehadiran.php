<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KehadiranModel;
use App\Models\MahasiswaModel;

class Kehadiran extends BaseController
{
    public function __construct()
    {
        $this->kehadiran = new KehadiranModel();
        $this->mahasiswa = new MahasiswaModel();
    }
    public function index($id)
    {
        $data['kelas_id'] = $id;
        $data['kehadiran'] = $this->kehadiran->getKehadiran($data['kelas_id']);
        return view('admin/kehadiran/index', $data);
    }

    public function formAdd()
    {
        $data['kelas_id'] = $this->request->getPost('kelas_id');
        $data['tanggal'] = $this->request->getPost('tanggal');
        $data['kehadiran'] = $this->mahasiswa->getMahasiswaPerKelas($data['kelas_id']);
        $cekTanggalKehadiran =  $this->kehadiran->cekTanggalKehadiran($data['tanggal']);
        if ($cekTanggalKehadiran) {
            session()->setFlashdata('warning', 'Data pada tanggal tersebut telah diinput');
            return redirect()->route('admin_data_kehadiran', [$data['kelas_id']]);
        } else {
            foreach ($data['kehadiran'] as $value) {
                $dataKehadiran = [
                    'mahasiswa_id' => $value['mahasiswa_id'],
                    'kelas_id' => $value['kelas_id'],
                    'tanggal' => $data['tanggal'],
                ];
                $this->kehadiran->insertKehadiran($dataKehadiran);
            }
            return redirect()->route('admin_form_update_data_kehadiran', [$data['kelas_id'], $data['tanggal']]);
        }
    }

    public function formUpdate($kelasId, $tanggal)
    {
        $data['kelas_id'] = $kelasId;
        $data['tanggal'] = $tanggal;
        $data['kehadiran'] = $this->kehadiran->getKehadiranPerKelasTanggal($kelasId, $tanggal);
        return view('admin/kehadiran/form_update', $data);
    }

    public function update()
    {
        $data['kelas_id'] = $this->request->getPost('kelas_id');
        $data['tanggal'] = $this->request->getPost('tanggal');
        $dataKehadiran = $this->request->getPost('kehadiran');
        $simpan = $this->kehadiran->updateKehadiran($dataKehadiran, $data['kelas_id'], $data['tanggal']);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil memasukkan data');
            return redirect()->route('admin_data_kehadiran', [$data['kelas_id']]);
        }
    }

    public function delete($kelasId, $tanggal)
    {
        $hapus = $this->kehadiran->deleteKehadiran($kelasId, $tanggal);
        if ($hapus) {
            session()->setFlashdata('warning', 'Berhasil menghapus data');
            return redirect()->route('admin_data_kehadiran', [$kelasId]);
        }
    }
}
