<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Absensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('style.css'); ?>">
</head>

<body>

    <div class="nav-side-menu">
        <div class="brand"><a class="link-unstyled-light" href="<?= route_to('admin_index') ?>">Dashboard</a></div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <li class="pl-3">
                    <a href="#">Tindakan</a>
                </li>
                <ul class="sub-menu collapse d-block" id="products">
                    <li><a href="<?= route_to('admin_data_kelas') ?>">Input Data</a></li>
                </ul>
                <li class="pl-3">
                    <a href="#">User </a>
                </li>
                <ul class="sub-menu collapse d-block" id="products">
                    <li><a href="<?= route_to('logout') ?>">Keluar</a></li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="content">
        <table class="mb-3" style="height: 50px;">
            <tbody>
                <tr>
                    <td class="align-middle px-3 text-white bg-dark" style="width:100vw">
                        <?= $this->renderSection('header-content') ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>