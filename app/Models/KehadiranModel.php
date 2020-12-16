<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table = "Kehadiran";

    public function getKehadiran($id = false)
    {
        if ($id === false) {
            return $this->table('Kehadiran')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('Kehadiran')
                ->select('kehadiran.kelas_id, sum(status = true) as total,tanggal')
                ->join('mahasiswa', 'mahasiswa.mahasiswa_id = kehadiran.mahasiswa_id')
                ->where('kehadiran.kelas_id', $id)
                ->groupBy("tanggal")
                ->get()
                ->getResultArray();
        }
    }
    public function insertKehadiran($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function getKehadiranPerKelasTanggal($kelasId, $tanggal)
    {
        return $this->table('Kehadiran')
            ->join('mahasiswa', 'mahasiswa.mahasiswa_id = kehadiran.mahasiswa_id','left')
            ->where('mahasiswa.kelas_id', $kelasId)
            ->where('tanggal', $tanggal)
            ->get()
            ->getResultArray();
    }
    public function updateKehadiran($data, $kelasId, $tanggal)
    {
        $hadir = ['status' => true];
        $tidakHadir = ['status' => false];
        if(!empty($data)){
            $query1 = $this->db->table($this->table)
                ->where('kelas_id', $kelasId)
                ->where('tanggal', $tanggal)
                ->whereIn('mahasiswa_id', $data)->update($hadir);
            $query2 = $this->db->table($this->table)
                ->where('kelas_id', $kelasId)
                ->where('tanggal', $tanggal)
                ->whereNotIn('mahasiswa_id', $data)->update($tidakHadir);
        } else {
            $query1 = true;
            $query2 = $this->db->table($this->table)
                ->where('kelas_id', $kelasId)
                ->where('tanggal', $tanggal)
                ->update($tidakHadir);
        }
        if ($query1 == true && $query2 == true) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteKehadiran($kelas_id, $tanggal)
    {
        return $this->db->table($this->table)->delete(['kelas_id' => $kelas_id, 'tanggal' => $tanggal]);
    }
    public function deleteKehadiranByKelas($kelas_id)
    {
        return $this->db->table($this->table)->delete(['kelas_id' => $kelas_id]);
    }
    public function deleteKehadiranByMahasiswa($mahasiswa_id)
    {
        return $this->db->table($this->table)->delete(['mahasiswa_id' => $mahasiswa_id]);
    }
}
