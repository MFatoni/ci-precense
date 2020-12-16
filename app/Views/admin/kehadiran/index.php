<?= $this->extend('admin/layout/default_admin_layout') ?>
<?= $this->section('header-content') ?>
Data Kehadiran
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
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModalCenter">
      Input Kehadiran Baru
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="<?= route_to('admin_form_add_data_kehadiran') ?>" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Mohon Input Tanggal Absensi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputPassword1">Tanggal</label>
                <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Password" name="tanggal">
                <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success">Mulai Absensi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Jumlah Yang Hadir</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $dataPoints = [];
      $i = 0;
      foreach ($kehadiran as $key => $data) {
        if ($i < 5) {
          array_push($dataPoints, (object)[
            'y' => $data['total'],
            'label' => $data['tanggal'],
          ]);
          $i++;
        }
      ?>
        <tr>
          <td><?php echo $key + 1; ?></td>
          <td><?php echo $data['tanggal']; ?></td>
          <td><?php echo $data['total']; ?></td>
          <td>
            <div class="btn-group">
              <a href="<?= route_to('admin_form_update_data_kehadiran', $data['kelas_id'], $data['tanggal']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
              <a href="<?= route_to('admin_delete_data_kehadiran', $data['kelas_id'], $data['tanggal']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
        text: "Grafik Data Kehadiran"
      },
      axisY: {
        includeZero: true,
      },
      data: [{
        type: "bar",
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