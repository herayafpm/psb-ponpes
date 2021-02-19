<?= $this->extend('admin/template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tambah <small> Soal</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="container">
          <div class="row">
            <form action="" method="post">
              <div class='form-group col-sm-12'>
                Soal
                <textarea class="form-control form-control-sm <?= ($_validation->hasError('soal_soal') ? "is-invalid" : "") ?>" id="soal_soal" rows="4" name="soal_soal" placeholder="Soal"><?= old('soal_soal') ?></textarea>
                <div class="invalid-feedback">
                  <?= $_validation->getError('soal_soal') ?>
                </div>
              </div>
              <div class='form-group col-sm-12'>
                Jawaban A
                <textarea class="form-control form-control-sm <?= ($_validation->hasError('soal_a') ? "is-invalid" : "") ?>" id="soal_a" rows="4" name="soal_a" placeholder="Jawaban A"><?= old('soal_a') ?></textarea>
                <div class="invalid-feedback">
                  <?= $_validation->getError('soal_a') ?>
                </div>
              </div>
              <div class='form-group col-sm-12'>
                Jawaban B
                <textarea class="form-control form-control-sm <?= ($_validation->hasError('soal_b') ? "is-invalid" : "") ?>" id="soal_b" rows="4" name="soal_b" placeholder="Jawaban B"><?= old('soal_b') ?></textarea>
                <div class="invalid-feedback">
                  <?= $_validation->getError('soal_b') ?>
                </div>
              </div>
              <div class='form-group col-sm-12'>
                Jawaban C
                <textarea class="form-control form-control-sm <?= ($_validation->hasError('soal_c') ? "is-invalid" : "") ?>" id="soal_c" rows="4" name="soal_c" placeholder="Jawaban C"><?= old('soal_c') ?></textarea>
                <div class="invalid-feedback">
                  <?= $_validation->getError('soal_c') ?>
                </div>
              </div>
              <div class='form-group col-sm-12'>
                Jawaban D
                <textarea class="form-control form-control-sm <?= ($_validation->hasError('soal_d') ? "is-invalid" : "") ?>" id="soal_d" rows="4" name="soal_d" placeholder="Jawaban D"><?= old('soal_d') ?></textarea>
                <div class="invalid-feedback">
                  <?= $_validation->getError('soal_d') ?>
                </div>
              </div>
              <div class="form-group col-sm-12">
                Kunci Jawaban
                <select class="form-control form-control-sm <?= ($_validation->hasError('soal_kunci') ? "is-invalid" : "") ?>" id="soal_kunci" name="soal_kunci">
                  <option value="">-- Kunci Jawaban --</option>
                  <?php foreach (['a', 'b', 'c', 'd'] as $jawaban) : ?>
                    <option value="<?= $jawaban ?>" <?= old('soal_kunci') == $jawaban ? "selected" : "" ?>><?= $jawaban ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <?= $_validation->getError('soal_kunci') ?>
                </div>
              </div>
              <div class="form-group col-sm-12 pl-5">
                <input class="form-check-input" type="checkbox" value="1" id="soal_aktif" name="soal_aktif" <?= (old('soal_aktif', 1) == 1) ? "checked" : "" ?>>
                <label class="form-check-label" for="soal_aktif">
                  Aktif?
                </label>
                <div class="invalid-feedback">
                  <?= $_validation->getError('soal_aktif') ?>
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