<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class KelasModel extends Model
{
    protected $table = "kelas";
 
    public function getKelas($id = false)
    {
        if($id === false){
            return $this->table('kelas')
                        ->select('kelas.kelas_nama, kelas.kelas_id, count(mahasiswa.mahasiswa_id) as total')
                        ->join('mahasiswa', 'mahasiswa.kelas_id = kelas.kelas_id','left')
                        ->groupBy("kelas.kelas_id")
                        ->orderBy('kelas.kelas_id')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('kelas')
                        ->where('kelas_id', $id)
                        ->orderBy('kelas_id')
                        ->get()
                        ->getRowArray();
        }   
    } 
    public function insertKelas($data)
    {
        return $this->db->table($this->table)->insert($data);
    } 
    public function updateKelas($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['kelas_id' => $id]);
    }
    public function deleteKelas($id)
    {
        return $this->db->table($this->table)->delete(['kelas_id' => $id]);
    }   
}