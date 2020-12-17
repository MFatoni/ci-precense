<?php

namespace App\Database\Seeds;

class DataKelasSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->query("
        INSERT INTO `kelas` (`kelas_id`, `kelas_nama`) VALUES
        (1, '4IA01'),
        (2, '4IA02'),
        (3, '4IA03'),
        (4, '4IA04'),
        (5, '4IA05');
        ");
    }
}
