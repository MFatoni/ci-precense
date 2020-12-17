<?= $this->extend('admin/layout/default_admin_layout') ?>
<?= $this->section('header-content') ?>
Data Kelas
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div id="chartContainer" style="height: 370px; width: 100%;" class="mb-3"></div>

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
    <a href="<?= route_to('admin_form_add_data_kelas') ?>">
      <button type="button" class="btn btn-success mb-3">
        Tambah Data Kelas
      </button>
    </a>
  </div>
  <table class="table">
    <thead class="thead-dark text-center">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kelas</th>
        <th scope="col">Jumlah Mahasiswa</th>
        <th scope="col">Mahasiswa</th>
        <th scope="col">Kehadiran</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php
      $dataPoints = [];
      $i = 0;
      foreach ($kelas as $key => $data) {
        if ($i < 20) {
          array_push($dataPoints, (object)[
            'y' => $data['total'],
            'label' => $data['kelas_nama'],
          ]);
          $i++;
        }
      ?>
        <tr>
          <td><?php echo $key + 1; ?></td>
          <td><?php echo $data['kelas_nama']; ?></td>
          <td><?php echo $data['total']; ?></td>
          <td>
            <a href="<?= route_to('admin_form_add_data_mahasiswa', $data['kelas_id']) ?>">Tambah Mahasiswa</a> |
            <a href="<?= route_to('admin_data_mahasiswa', $data['kelas_id']) ?>">Lihat Daftar Mahasiswa</a>
          </td>
          <td>
            <a href="<?= route_to('admin_data_kehadiran', $data['kelas_id']) ?>">Detail Kehadiran</a>
          </td>
          <td>
            <div class="btn-group">
              <a href="<?= route_to('admin_form_update_data_kelas', $data['kelas_id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>&ensp;
              <a href="<?= route_to('admin_delete_data_kelas', $data['kelas_id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
  window.onload = function() {
    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      title: {
        text: "Grafik Jumlah Mahasiswa"
      },
      axisY: {
        includeZero: true,
      },
      data: [{
        type: "column",
        indexLabel: "{y}",
        indexLabelPlacement: "inside",
        indexLabelFontWeight: "bolder",
        indexLabelFontColor: "white",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart.render();
  }
</script>
<?= $this->endSection() ?>