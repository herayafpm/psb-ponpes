<?= $this->extend('admin/template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tambah <small> Program</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="container">
          <div class="row">
            <form action="" method="post">
              <div class='form-group col-sm-12'>
                Nama Program
                <input type='text' name="program_nama" placeholder="Nama Program" class="form-control form-contorl-sm <?= ($_validation->hasError('program_nama') ? "is-invalid" : "") ?>" value="<?= old('program_nama', $_program['program_nama']) ?>" />
                <div class="invalid-feedback">
                  <?= $_validation->getError('program_nama') ?>
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