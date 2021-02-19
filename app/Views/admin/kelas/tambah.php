<?= $this->extend('admin/template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tambah <small> Kelas</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="container">
          <div class="row">
            <form action="" method="post">
              <div class='form-group col-sm-4'>
                Nama Kelas
                <input type='text' name="kelas_nama" placeholder="Nama Kelas" class="form-control form-contorl-sm <?= ($_validation->hasError('kelas_nama') ? "is-invalid" : "") ?>" value="<?= old('kelas_nama') ?>" />
                <div class="invalid-feedback">
                  <?= $_validation->getError('kelas_nama') ?>
                </div>
              </div>
              <div class='form-group col-sm-4'>
                Nilai Awal Kelas
                <input type='number' name="kelas_mulai" placeholder="Nilai Awal Kelas" class="form-control form-contorl-sm <?= ($_validation->hasError('kelas_mulai') ? "is-invalid" : "") ?>" value="<?= old('kelas_mulai') ?>" />
                <div class="invalid-feedback">
                  <?= $_validation->getError('kelas_mulai') ?>
                </div>
              </div>
              <div class='form-group col-sm-4'>
                Nilai Akhir Kelas
                <input type='number' name="kelas_selesai" placeholder="Nilai Akhir Kelas" class="form-control form-contorl-sm <?= ($_validation->hasError('kelas_selesai') ? "is-invalid" : "") ?>" value="<?= old('kelas_selesai') ?>" />
                <div class="invalid-feedback">
                  <?= $_validation->getError('kelas_selesai') ?>
                </div>
              </div>
              <div class="col-sm-12">
                <center>
                  <button type="submit" class="btn btn-success">Tambah</button>
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