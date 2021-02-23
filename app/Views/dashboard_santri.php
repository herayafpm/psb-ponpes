<?= $this->extend('template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="banner_bottom_in text-sm-center">
  <h3 class="headerw3">Selamat datang, <i><?= $_pengguna->pengguna_nama ?></i> </h3>

  <p>Pada halaman ini anda dapat melakukan pengisian formulir, melihat data diri, merubah data diri apabila ada kesalahan</p>
  <?php
  if ($_pendaftaran != null && $todays_date >= $start_date && $todays_date <= $end_date) : ?>
    <div class="edu_button">
      <?php if ($_pendaftar_santri == null) : ?>
        <a class="btn btn-primary btn-lg hvr-underline-from-left" href="<?= base_url('formulir') ?>" role="button">Isi Formulir</a>
      <?php endif; ?>
    </div>
  <?php elseif ($_pendaftaran != null && $todays_date < $start_date) : ?>
    <h2><span class="label label-primary">Pendaftaran Belum dibuka</span></h2>
  <?php else : ?>
    <h2><span class="label label-warning">Pendaftaran Sudah ditutup</span></h2>
  <?php endif; ?>
  <?php if ($_pendaftar_santri != null) : ?>
    <div class="edu_button">
      <a class="btn btn-primary btn-lg hvr-underline-from-left" href="<?= base_url('hasil_pengumuman') ?>" role="button">Pengumuman</a>
    </div>
  <?php endif ?>
</div>
<hr>
<div class="top_spl_courses">
  <div class="container"><br>
    <?php
    if ($_pendaftar_santri != null) :
    ?>
      <div class="row owner">
        <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
          <div class="avatar">
            <img src="uploads/foto/<?= $_pendaftar_santri['pendaftar_santri_foto']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive">
          </div><br>
        </div>
      </div>
      <div class="profile-tabs">
        <div id="my-tab-content" class="tab-content">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <table class="table">
                <tr>
                  <td width="250">Nomor Pendaftaran</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_no_daftar']; ?></td>
                </tr>
                <tr>
                  <td width="150">Nomor Induk Keluarga</td>
                  <td><?= $_pendaftar_santri['pengguna_nik']; ?></td>
                </tr>
                <tr>
                  <td width="250">Nama Santri</td>
                  <td><?= $_pendaftar_santri['pengguna_nama']; ?></td>
                </tr>
                <tr>
                  <td width="150">Jenis Kelamin</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_jk']; ?></td>
                </tr>
                <tr>
                  <td width="150">Alamat</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_alamat']; ?></td>
                </tr>
                <tr>
                  <td width="150">Kecamatan</td>
                  <td><?= $_pendaftar_santri['kecamatan_nama']; ?></td>
                </tr>
                <tr>
                  <td width="150">Kabupaten</td>
                  <td><?= $_pendaftar_santri['kabupaten_nama']; ?></td>
                </tr>
                <tr>
                  <td width="150">Provinsi</td>
                  <td><?= $_pendaftar_santri['provinsi_nama']; ?></td>
                </tr>
                <tr>
                  <td width="150">Tempat, Tanggal Lahir</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_tempat_lahir']; ?>, <?= indonesian_date($_pendaftar_santri['pendaftar_santri_tgl_lahir']); ?></td>
                </tr>
                <tr>
                  <td width="150">Golongan Darah</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_goldar']; ?></td>
                </tr>
                <tr>
                  <td width="150">Anak Ke - </td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_anak_ke']; ?> dari <?= $_pendaftar_santri['pendaftar_santri_jml_sdr']; ?> bersaudara</td>
                </tr>
                <tr>
                  <td width="150">Cita - cita</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_cita']; ?></td>
                </tr>
                <tr>
                  <td width="150">Hobi</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_hobi']; ?></td>
                </tr>
                <tr>
                  <td width="150">Prestasi</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_prestasi']; ?></td>
                </tr>
                <tr>
                  <td width="150">Program yang Diambil</td>
                  <td><?= $_pendaftar_santri['program_nama']; ?></td>
                </tr>
                <tr>
                  <td width="150">Nama Ayah</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_nama_ayah']; ?></td>
                </tr>
                <tr>
                  <td width="150">Nama Ibu</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_nama_ibu']; ?></td>
                </tr>
                <tr>
                  <td width="150">Pekrjaan Ayah</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_kerja_ayah']; ?></td>
                </tr>
                <tr>
                  <td width="150">Pekrjaan Ibu</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_kerja_ibu']; ?></td>
                </tr>
                <tr>
                  <td width="150">Alamat Orang Tua</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_alamat_ortu']; ?></td>
                </tr>
                <tr>
                  <td width="150">Nomor Telp/HP Orang Tua</td>
                  <td><?= $_pendaftar_santri['pendaftar_santri_notelp_ortu']; ?></td>
                </tr>
                <tr>
                  <td width="150">KTP/KTS/lainnya</td>
                  <td><img src="<?= base_url('') ?>/uploads/ktp/<?= $_pendaftar_santri['pendaftar_santri_ktp']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></td>
                </tr>
                <tr>
                  <td width="150">Kartu Keluarga</td>
                  <td><img src="<?= base_url('') ?>/uploads/kk/<?= $_pendaftar_santri['pendaftar_santri_kk']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></td>
                </tr>
                <tr>
                  <td width="150">Bukti Pembayaran</td>
                  <td><img src="<?= base_url('') ?>/uploads/pembayaran/<?= $_pendaftar_santri['pendaftar_santri_pembayaran']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></td>
                </tr>
                <?php if ($_pendaftar_santri['pendaftar_santri_kelas'] != null && !empty($_pendaftar_santri['pendaftar_santri_kelas'])) : ?>
                  <tr>
                    <td width="150">Masuk Kelas</td>
                    <td>
                      <?= $_pendaftar_santri['pendaftar_santri_kelas'] ?>
                    </td>
                  </tr>
                <?php endif ?>
                <tr>
                  <td width="150">Status</td>
                  <?php
                  $status = "Belum diverifikasi";
                  if ($_pendaftar_santri['pendaftar_santri_status'] == 1) {
                    $status = "Sudah Diterima oleh " . $_pendaftar_santri['admin_nama'] . " Pada " . indonesian_date($_pendaftar_santri['pendaftar_santri_status_at']);
                  } else if ($_pendaftar_santri['pendaftar_santri_status'] == 2) {
                    $status = "Ditolak oleh " . $_pendaftar_santri['admin_nama'] . " Pada " . indonesian_date($_pendaftar_santri['pendaftar_santri_status_at']);
                  }
                  ?>
                  <td><span class="label label-info"><?= $status ?></span></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row justify-content-center">
        <?php if ($_pendaftar_santri['pendaftar_santri_status'] == 0 || $_pendaftar_santri['pendaftar_santri_status'] == 2) : ?>
          <div class="col-md-2 mb-1">
            <a class="btn btn-success btn-lg hvr-underline-from-left" href="<?= base_url('edit_formulir') ?>" role="button">Edit Formulir</a>
          </div>
        <?php endif ?>
        <?php if ($_pendaftar_santri['pendaftar_santri_kelas'] == null) : ?>
          <div class="col-md-2">
            <a class="btn btn-primary btn-lg hvr-underline-from-left" href="<?= base_url('tes') ?>" role="button">Mulai Tes</a>
          </div>
        <?php endif ?>
      </div>
    <?php else : ?>
      <div class="tab-pane text-center" id="following">
        <h3>Belum ada data !</h3><br>
        <div class="avatar">
          <img src="assets/img/file_empty.png" alt="Thumbnail Image" class="img-thumbnail img-responsive" style="width:30%">
        </div>
      </div>
    <?php endif ?>

  </div>
</div>
<?= $this->endSection('content') ?>
<?= $this->section('modal') ?>
<?= view('modals/login_modal'); ?>
<?= $this->endSection('modal') ?>
<?= $this->section('customjs') ?>
<?= $this->endSection('customjs') ?>