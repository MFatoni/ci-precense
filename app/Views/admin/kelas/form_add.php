<?= $this->extend('admin/layout/default_admin_layout') ?>
<?= $this->section('header-content') ?>
Input Data Kelas
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-6">
      <form action="<?php echo route_to('admin_add_data_kelas'); ?>" method="post">
        <div class="form-group">
          <label>Nama Kelas</label>
          <input type="text" class="form-control" name="kelas_nama">
        </div>
        <button type="submit" class="btn btn-success">Tambah Data</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>