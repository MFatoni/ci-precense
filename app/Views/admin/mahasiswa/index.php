<?= $this->extend('admin/layout/default_admin_layout') ?>
<?= $this->section('header-content') ?>
Data Mahasiswa
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <?php
  if (!empty(session()->getFlashdata('success'))) { ?>
    <div class="alert alert-success">
      <?php echo session()->getFlashdata('success'); ?>
    </div>
  <?php } ?>
  <?php if (!empty(session()->getFlashdata('info'))) { ?>
    <div class="alert alert-info">
      <?php echo session()->getFlashdata('info'); ?>
    </div>
  <?php } ?>
  <?php if (!empty(session()->getFlashdata('warning'))) { ?>
    <div class="alert alert-warning">
      <?php echo session()->getFlashdata('warning'); ?>
    </div>
  <?php } ?>
  <div class="float-right">
    <a href="<?= route_to('admin_form_add_data_mahasiswa', $kelas_id) ?>">
      <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModalCenter">
        Tambah Data Mahasiswa
      </button>
    </a>
  </div>
  <table class="table">
    <thead class="thead-dark text-center">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Mahasiswa</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($mahasiswa as $key => $data) { ?>
        <tr>
          <td class="text-center"><?php echo $key + 1; ?></td>
          <td><?php echo $data['mahasiswa_nama']; ?></td>
          <td class="text-center">
            <div class="btn-group">
              <a href="<?= route_to('admin_form_update_data_mahasiswa', $data['kelas_id'], $data['mahasiswa_id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>&ensp;
              <a href="<?= route_to('admin_delete_data_mahasiswa', $data['kelas_id'], $data['mahasiswa_id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>