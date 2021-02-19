<?= $this->extend('admin/template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tambah <small> Admin</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="container">
          <div class="row">
            <?= form_open('') ?>
            <div class='form-group col-sm-12'>
              NIK Santri
              <input type='text' name="pengguna_nik" placeholder="NIK Santri" class="form-control form-contorl-sm <?= ($_validation->hasError('pengguna_nik') ? "is-invalid" : "") ?>" value="<?= old('pengguna_nik', $_santri['pengguna_nik']) ?>" />
              <div class="invalid-feedback">
                <?= $_validation->getError('pengguna_nik') ?>
              </div>
            </div>
            <div class='form-group col-sm-12'>
              Nama Santri
              <input type='text' name="pengguna_nama" placeholder="Nama Santri" class="form-control form-contorl-sm <?= ($_validation->hasError('pengguna_nama') ? "is-invalid" : "") ?>" value="<?= old('pengguna_nama', $_santri['pengguna_nama']) ?>" />
              <div class="invalid-feedback">
                <?= $_validation->getError('pengguna_nama') ?>
              </div>
            </div>
            <div class='form-group col-sm-12'>
              Email Santri
              <input type='text' name="pengguna_email" placeholder="Email Santri" class="form-control form-contorl-sm <?= ($_validation->hasError('pengguna_email') ? "is-invalid" : "") ?>" value="<?= old('pengguna_email', $_santri['pengguna_email']) ?>" />
              <div class="invalid-feedback">
                <?= $_validation->getError('pengguna_email') ?>
              </div>
            </div>
            <div class='form-group col-sm-12'>
              Password Santri (Kosongi jika tidak ingin diubah)
              <input type='password' name="pengguna_password" placeholder="Password Baru Santri" class="form-control form-contorl-sm <?= ($_validation->hasError('pengguna_password') ? "is-invalid" : "") ?>" />
              <div class="invalid-feedback">
                <?= $_validation->getError('pengguna_password') ?>
              </div>
            </div>
            <div class="col-sm-12">
              <center>
                <button type="submit" class="btn btn-success">Ubah</button>
              </center>
            </div>
            <?= form_close() ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>
<?= $this->section('customjs') ?>
<?= $this->endSection('customjs') ?>