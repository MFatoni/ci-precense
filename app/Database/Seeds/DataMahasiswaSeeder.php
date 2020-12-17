<?php

namespace App\Database\Seeds;

class DataMahasiswaSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->query("
        INSERT INTO `mahasiswa` (`mahasiswa_id`, `mahasiswa_nama`, `kelas_id`) VALUES
        (1, 'Leanna Boyer', 1),
        (2, 'Aarron Bloom', 1),
        (3, 'Jayden-James Burt', 1),
        (4, 'Muhammed Russell', 1),
        (5, 'Bilaal Ross', 1),
        (6, 'Megan Fischer', 2),
        (7, 'Bella-Rose Malone', 2),
        (8, 'Ralph Roy', 3),
        (9, 'Eoghan Arias', 3),
        (10, 'Janine Rollins', 3),
        (11, 'Becky Hanson', 3),
        (12, 'Destiny Ramirez', 3),
        (13, 'Luc Macfarlane', 3),
        (14, 'Arabella Stout', 3),
        (15, 'Rianna Plant', 5),
        (16, 'Karson Rush', 5),
        (17, 'Rosina Bradshaw', 5),
        (18, 'Huzaifa Spencer', 4);
        ");
    }
}
