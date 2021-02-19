<?= $this->extend('admin/template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="row container-fluid" style="display: inline-block;">
  <div class="tile_count row">
    <div class="col-sm-4 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Formulir / Pendaftar</span>
      <div class="count">
        <p class="green d-inline"><?= $_total_formulir ?></p> / <?= $_total_pendaftar ?>
      </div>
    </div>
    <div class="col-sm-4 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Laki - Laki</span>
      <div class="count"><?= $_total_laki ?></div>
    </div>
    <div class="col-sm-4 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Perempuan</span>
      <div class="count"><?= $_total_perempuan ?></div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="dashboard_graph">

      <div class="row x_title">
        <div class="col-md-6">
          <h3>dashboard <small>Admin</small></h3>
        </div>
      </div>
      <div class="x_content">

        <div class="bs-example" data-example-id="simple-jumbotron">
          <div class="jumbotron">
            <h3>Selamat datang <i><?= $_admin->pengguna_nama ?></i></h3>
            <p>Pada Halaman ini admin dapat menambahkan akun untuk admin lain, melihat pendaftar kemudian menyeleksi pendaftar siswa</p>
          </div>
        </div>

      </div>

      <div class="clearfix"></div>
    </div>
  </div>

</div>
<?= $this->endSection('content') ?>
<?= $this->section('customjs') ?>
<?= $this->endSection('customjs') ?>