<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KehadiranModel;
use App\Models\MahasiswaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends BaseController
{
    public function __construct()
    {
        $this->kehadiran = new KehadiranModel();
        $this->mahasiswa = new MahasiswaModel();
    }
    public function download($kelasId, $tanggal)
    {
        $data['kelas_id'] = $kelasId;
        $data['tanggal'] = $tanggal;
        $data['kehadiran'] = $this->kehadiran->getKehadiranPerKelasTanggal($kelasId, $tanggal);
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama')
            ->setCellValue('B1', 'Tanggal')
            ->setCellValue('C1', 'Kehadiran');
        $column = 2;
        foreach ($data['kehadiran'] as $data) {
            if ($data['status'] == 1) {
                $kehadiran = 'Hadir';
            } else {
                $kehadiran = 'Tidak Hadir';
            }
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['mahasiswa_nama'])
                ->setCellValue('B' . $column, $data['tanggal'])
                ->setCellValue('C' . $column, $kehadiran);
            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Mahasiswa';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
