<?= $this->extend('admin/template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Ubah Waktu <small> Pendaftaran</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="container">
          <div class="row">
            <form action="" method="post">
              <div class='form-group col-sm-3'>
                Periode Pendaftaran
                <input type='text' name="pendaftaran_periode" placeholder="Periode Pendaftaran" class="form-control form-contorl-sm <?= ($_validation->hasError('pendaftaran_periode') ? "is-invalid" : "") ?>" value="<?= old('pendaftaran_periode', $_pendaftaran['pendaftaran_periode']) ?>" />
                <div class="invalid-feedback">
                  <?= $_validation->getError('pendaftaran_periode') ?>
                </div>
              </div>
              <div class='form-group col-sm-3'>
                Batas Awal Waktu Pendaftaran
                <input type='date' name="pendaftaran_tgl_mulai" placeholder="Waktu Awal Pendaftaran" class="form-control form-contorl-sm <?= ($_validation->hasError('pendaftaran_tgl_mulai') ? "is-invalid" : "") ?>" value="<?= old('pendaftaran_tgl_mulai', date("Y-m-d", strtotime($_pendaftaran['pendaftaran_tgl_mulai']))) ?>" />
                <div class="invalid-feedback">
                  <?= $_validation->getError('pendaftaran_tgl_mulai') ?>
                </div>
              </div>
              <div class='form-group col-sm-3'>
                Batas Akhir Waktu Pendaftaran
                <input type='date' name="pendaftaran_tgl_selesai" placeholder="Waktu Akhir Pendaftaran" class="form-control form-contorl-sm <?= ($_validation->hasError('pendaftaran_tgl_selesai') ? "is-invalid" : "") ?>" value="<?= old('pendaftaran_tgl_selesai', date("Y-m-d", strtotime($_pendaftaran['pendaftaran_tgl_selesai']))) ?>" />
                <div class="invalid-feedback">
                  <?= $_validation->getError('pendaftaran_tgl_selesai') ?>
                </div>
              </div>
              <div class='form-group col-sm-3'>
                Kuota Maksimal
                <input type='number' name="pendaftaran_kuota" placeholder="Masukan Jumlah Maksimal Kuota" class="form-control form-contorl-sm <?= ($_validation->hasError('pendaftaran_kuota') ? "is-invalid" : "") ?>" value="<?= old('pendaftaran_kuota', $_pendaftaran['pendaftaran_kuota']) ?>" />
                <div class="invalid-feedback">
                  <?= $_validation->getError('pendaftaran_kuota') ?>
                </div>
              </div>
              <div class="col-sm-12">
                <center>
                  <button type="submit" class="btn btn-success">Ubah</button>
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>
<?= $this->section('customjs') ?>
<?= $this->endSection('customjs') ?>