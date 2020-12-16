<?= $this->extend('admin/layout/default_admin_layout') ?>
<?= $this->section('header-content') ?>
Edit Data Kelas
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-6">
      <form action="<?php echo route_to('admin_update_data_kelas'); ?>" method="post">
        <input type="hidden" class="form-control" name="kelas_id" value="<?php echo $kelas_id; ?>">
        <div class="form-group">
          <label>Nama Kelas</label>
          <input type="text" class="form-control" name="kelas_nama" value="<?php echo $kelas_nama; ?>">
        </div>

        <button type="submit" class="btn btn-success">Tambah Data</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>