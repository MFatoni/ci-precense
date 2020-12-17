<?php

namespace App\Database\Seeds;

class DataKehadiranSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->query("
        INSERT INTO `kehadiran` (`kehadiran_id`, `mahasiswa_id`, `kelas_id`, `tanggal`, `status`) VALUES
        (1, 1, 1, '2020-12-01', 1),
        (2, 2, 1, '2020-12-01', 1),
        (3, 3, 1, '2020-12-01', 1),
        (4, 4, 1, '2020-12-01', 0),
        (5, 5, 1, '2020-12-01', 0),
        (6, 1, 1, '2020-12-03', 1),
        (7, 2, 1, '2020-12-03', 1),
        (8, 3, 1, '2020-12-03', 1),
        (9, 4, 1, '2020-12-03', 1),
        (10, 5, 1, '2020-12-03', 1),
        (11, 1, 1, '2020-12-19', 1),
        (12, 2, 1, '2020-12-19', 1),
        (13, 3, 1, '2020-12-19', 1),
        (14, 4, 1, '2020-12-19', 1),
        (15, 5, 1, '2020-12-19', 0);
        ");
    }
}
