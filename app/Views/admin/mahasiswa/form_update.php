<?= $this->extend('admin/layout/default_admin_layout') ?>
<?= $this->section('header-content') ?>
Edit Data Mahasiswa
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-6">
      <form action="<?php echo route_to('admin_update_data_mahasiswa'); ?>" method="post">
        <div class="form-group">
          <label for="formGroupExampleInput">Nama</label>
          <input type="text" class="form-control" id="formGroupExampleInput" name="mahasiswa_nama" value="<?php echo $mahasiswa_nama; ?>">
        </div>
        <input type="hidden" class="form-control" id="formGroupExampleInput" name="mahasiswa_id" value="<?php echo $mahasiswa_id; ?>">
        <input type="hidden" value="<?php echo $kelas_id; ?>" class="form-control" id="formGroupExampleInput" name="kelas_id" value="<?php echo $kelas_id; ?>">
        <button type="submit" class="btn btn-success">Tambah Data</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>