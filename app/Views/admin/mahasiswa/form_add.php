<?= $this->extend('admin/layout/default_admin_layout') ?>
<?= $this->section('header-content') ?>
Input Data Mahasiswa
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-6">
      <form action="<?php echo route_to('admin_add_data_mahasiswa'); ?>" method="post">
        <div class="form-group">
          <label for="formGroupExampleInput">Nama</label>
          <input type="text" class="form-control" id="formGroupExampleInput" name="mahasiswa_nama">
        </div>
        <input type="hidden" value="<?php echo $kelas_id; ?>" class="form-control" id="formGroupExampleInput" name="kelas_id">
        <button type="submit" class="btn btn-success">Tambah Data</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>