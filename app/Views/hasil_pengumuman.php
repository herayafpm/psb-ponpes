<?= $this->extend('template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="banner_bottom_in text-sm-center">
  <h3 class="headerw3 text-center">Pengumuman Kelulusan PSB Online 2021</h3>
  <div class="top_spl_courses">
    <div class="container">
      <?php
      if ($_pendaftar_santri != null) :
      ?>
        <div class="profile-tabs">
          <div id="my-tab-content" class="tab-content">
            <div class="row">
              <div class="col-md-12 text-left">
                <table class="table">
                  <tr>
                    <td width="250">Nomor Pendaftaran</td>
                    <td width="10">:</td>
                    <td><?= $_pendaftar_santri['pendaftar_santri_no_daftar']; ?></td>
                  </tr>
                  <tr>
                    <td width="150">Nomor Induk Keluarga</td>
                    <td width="10">:</td>
                    <td><?= $_pendaftar_santri['pengguna_nik']; ?></td>
                  </tr>
                  <tr>
                    <td width="250">Nama Santri</td>
                    <td width="10">:</td>
                    <td><?= $_pendaftar_santri['pengguna_nama']; ?></td>
                  </tr>
                  <tr>
                    <td width="150">Jenis Kelamin</td>
                    <td width="10">:</td>
                    <td><?= $_pendaftar_santri['pendaftar_santri_jk']; ?></td>
                  </tr>
                  <?php if ($_pendaftar_santri['pendaftar_santri_kelas'] != null && !empty($_pendaftar_santri['pendaftar_santri_kelas'])) : ?>
                    <tr>
                      <td width="150">Masuk Kelas</td>
                      <td width="10">:</td>
                      <td><?= $_pendaftar_santri['pendaftar_santri_kelas']; ?></td>
                    </tr>
                  <?php endif ?>
                </table>
                <?php if ($_pendaftar_santri['pendaftar_santri_status'] == 1) : ?>
                  <h3 align="center"><span class="label label-success">Anda dinyatakan Lulus seleksi penerimaan santri baru</span></h3><br>
                <?php elseif ($_pendaftar_santri['pendaftar_santri_status'] == 2) : ?>
                  <h3 align="center"><span class="label label-danger">Anda dinyatakan Tidak Lulus seleksi penerimaan santri baru</span></h3>
                <?php else : ?>
                  <h3 align="center"><span class="label label-warning">Belum ada pengumuman</span></h3><br>
                <?php endif; ?>
              </div>
            </div>
            <?php if ($_pendaftar_santri['pendaftar_santri_status'] == 1) : ?>
              <div class="row">
                <div class="col-md-12 col-md-offset-1">
                  <div class="panel panel-success">
                    <div class="panel-heading" align="center">Persyaratan Daftar Ulang :</div>
                    <div class="panel-body" align="left" style="padding-left:100px;padding-right:100px;">
                      <ul>
                        <li>Membawa bukti daftar dengan mencetak formulir persyaratan, <a href="<?= base_url('hasil_pengumuman/cetak_formulir') ?>" target="_blank">Download Formulir</a> </li>
                        <li>Membawa KTP, KK, Foto 3x4, Bukti Pembayaran</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif ?>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>
<?= $this->section('modal') ?>
<?= view('modals/login_modal'); ?>
<?= $this->endSection('modal') ?>
<?= $this->section('customjs') ?>
<?= $this->endSection('customjs') ?>