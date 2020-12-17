<?= $this->extend('admin/layout/default_admin_layout') ?>
<?= $this->section('header-content') ?>
Edit Data Mahasiswa
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <form action="<?php echo route_to('admin_update_data_mahasiswa'); ?>" method="post">
        <?php foreach ($mahasiswa as $key => $data) { ?>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="mahasiswa_nama" value="<?php echo $data['mahasiswa_nama']; ?>" required>
          </div>
          <input type="hidden" class="form-control" name="mahasiswa_id" value="<?php echo $data['mahasiswa_id']; ?>">
          <input type="hidden" value="<?php echo $kelas_id; ?>" class="form-control" name="kelas_id" value="<?php echo $data['kelas_id']; ?>">
          <button type="submit" class="btn btn-success">Ubah Data</button>
        <?php } ?>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>