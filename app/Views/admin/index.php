<?= $this->extend('admin/layout/default_admin_layout') ?>
<?= $this->section('header-content') ?>
Data Kelas
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kelas</th>
      <th scope="col">Jumlah Mahasiswa</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>4IA88</td>
      <td>40</td>
      <td>Hapus Edit Lihat Kehadiran</td>
    </tr>
  </tbody>
</table>
</div>
<?= $this->endSection() ?>