<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = "mahasiswa";

    public function getMahasiswa($id = false)
    {
        if ($id === false) {
            return $this->table('mahasiswa')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('mahasiswa')
                ->where('kelas_id', $id)
                ->get()
                ->getResultArray();
        }
    }
    public function getMahasiswaPerKelas($id)
    {
        return $this->table('mahasiswa')
            ->where('kelas_id', $id)
            ->get()
            ->getResultArray();
    }
    public function insertMahasiswa($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updateMahasiswa($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['mahasiswa_id' => $id]);
    }
    public function deleteMahasiswa($id)
    {
        return $this->db->table($this->table)->delete(['mahasiswa_id' => $id]);
    }
    public function deleteMahasiswaByKelas($id)
    {
        return $this->db->table($this->table)->delete(['kelas_id' => $id]);
    }
}
