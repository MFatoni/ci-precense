<?= $this->extend('admin/layout/default_admin_layout') ?>
<?= $this->section('header-content') ?>
Input Data Kehadiran
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <form action="<?php echo route_to('admin_update_data_kehadiran'); ?>" method="post">
    <button type="submit" class="btn btn-success mb-3">
      Input Kehadiran Baru
    </button>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">NPM</th>
          <th scope="col">Hadir</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($kehadiran as $key => $data) { ?>
          <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $data['mahasiswa_nama']; ?></td>
            <td><?php echo $data['mahasiswa_id']; ?></td>
            <td>
              <input type="checkbox" name="kehadiran[]" value="<?php echo $data['mahasiswa_id']; ?>" <?php echo  $data['status'] ? 'checked="checked"' : ''; ?>>
            </td>
          </tr>
        <?php } ?>
        <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
        <input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>">
      </tbody>
    </table>

  </form>
</div>
<?= $this->endSection() ?>