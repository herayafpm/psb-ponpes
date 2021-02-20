<!DOCTYPE html>
<html>

<head>
  <title></title>
  <?= view('css/bootstrap') ?>
  <style>
    * {
      font-family: DejaVu Sans, sans-serif;
    }
  </style>
</head>

<body>
  <?= view('components/header_surat') ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <center>
          <h4>PENERIMAAN SANTRI BARU <?= $_year_start ?>/<?= $_year_end ?><br>
            <h3>PONPES DARUSSALAM DUKUHWALUH PURWOKERTO</h3>
          </h4>
        </center>
      </div>
    </div>
    <p align="center">======================================================================================</p>
    <p align="center">Laporan Penerimaan Santri Baru (PSB)<br>Pon.Pes Darussalam Dukuhwaluh Purwokerto</p>
    <table class="table table-condensed">
      <tr>
        <th width="250px">Periode Pendaftaran</th>
        <td><?= $pendaftaran['pendaftaran_periode'] ?></td>
        <td></td>
      </tr>
      <tr>
        <th width="250px">Tanggal Mulai Pendaftaran</th>
        <td><?= indonesian_date($pendaftaran['pendaftaran_tgl_mulai']) ?></td>
        <td></td>
      </tr>
      <tr>
        <th width="250px">Tanggal Berakhir Pendaftaran</th>
        <td><?= indonesian_date($pendaftaran['pendaftaran_tgl_selesai']) ?></td>
        <td></td>
      </tr>
      <tr>
        <th width="250px">Kuota Yang Ada</th>
        <td><?= $pendaftaran['pendaftaran_kuota'] ?> Santri</td>
        <td></td>
      </tr>
      <tr>
        <th width="250px">Jumlah Formulir yang terkumpul</th>
        <td><?= $_total_formulir ?> Santri</td>
        <td></td>
      </tr>
      <tr>
        <th>Calon Santri</th>
        <td>
          <p><?= $_total_laki ?> Laki - laki</p>
          <p><?= $_total_perempuan ?> Perempuan</p>
        </td>
        <td></td>
      </tr>
      <tr>
        <th>Siswa diterima</th>
        <td><?= $_total_terima ?> Santri</td>
        <td></td>
      </tr>
      <tr>
        <th>Siswa ditolak</th>
        <td><?= $_total_tolak ?> Santri</td>
        <td></td>
      </tr>
    </table>
    <div style="page-break-after: always;"></div>
    <div class="row">
      <div class="col-md-6">
        <h3>Lampiran</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h3>Daftar Pendaftar Proses</h3>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No. </th>
              <th>No Pendaftaran</th>
              <th>NIK</th>
              <th>Nama Santri</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($_pendaftar_prosess as $pendaftar_proses) : ?>
              <tr>
                <td><?= $no ?></td>
                <td><?= $pendaftar_proses['pendaftar_santri_no_daftar'] ?></td>
                <td><?= $pendaftar_proses['pengguna_nik'] ?></td>
                <td><?= $pendaftar_proses['pengguna_nama'] ?></td>
                <td><?= $pendaftar_proses['pendaftar_santri_jk'] ?></td>
                <td><?= indonesian_date($pendaftar_proses['pengguna_created']) ?></td>
              </tr>
            <?php
              $no++;
            endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h3>Daftar Pendaftar Diterima</h3>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No. </th>
              <th>No Pendaftaran</th>
              <th>NIK</th>
              <th>Nama Santri</th>
              <th>Jenis Kelamin</th>
              <th>Kelas</th>
              <th>Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($_pendaftar_terimas as $pendaftar_terima) : ?>
              <tr>
                <td><?= $no ?></td>
                <td><?= $pendaftar_terima['pendaftar_santri_no_daftar'] ?></td>
                <td><?= $pendaftar_terima['pengguna_nik'] ?></td>
                <td><?= $pendaftar_terima['pengguna_nama'] ?></td>
                <td><?= $pendaftar_terima['pendaftar_santri_jk'] ?></td>
                <td><?= $pendaftar_terima['pendaftar_santri_kelas'] ?></td>
                <td><?= indonesian_date($pendaftar_terima['pengguna_created']) ?></td>
              </tr>
            <?php
              $no++;
            endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h3>Daftar Pendaftar Ditolak</h3>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No. </th>
              <th>No Pendaftaran</th>
              <th>NIK</th>
              <th>Nama Santri</th>
              <th>Jenis Kelamin</th>
              <th>Kelas</th>
              <th>Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($_pendaftar_tolaks as $pendaftar_tolak) : ?>
              <tr>
                <td><?= $no ?></td>
                <td><?= $pendaftar_tolak['pendaftar_santri_no_daftar'] ?></td>
                <td><?= $pendaftar_tolak['pengguna_nik'] ?></td>
                <td><?= $pendaftar_tolak['pengguna_nama'] ?></td>
                <td><?= $pendaftar_tolak['pendaftar_santri_jk'] ?></td>
                <td><?= $pendaftar_tolak['pendaftar_santri_kelas'] ?></td>
                <td><?= indonesian_date($pendaftar_tolak['pengguna_created']) ?></td>
              </tr>
            <?php
              $no++;
            endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>