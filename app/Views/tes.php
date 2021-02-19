<?= $this->extend('template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<h3 class="headerw3">KERJAKAN SOAL PILIHAN GANDA DI BAWAH INI!</h3>
<hr>
<?= form_open('', ['class' => 'contact-form']) ?>
<?php foreach ($_soals as $soal) : ?>
  <div class="form-group">
    <label><?= $soal['soal_soal'] ?></label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jawaban[<?= $soal['soal_id'] ?>]" id="soalA<?= $soal['soal_id'] ?>" value="a" <?= old("jawaban.{$soal['soal_id']}") == 'a' ? "checked" : "" ?>>
      <label class="form-check-label" for="soalA<?= $soal['soal_id'] ?>">
        <?= $soal['soal_a'] ?>
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jawaban[<?= $soal['soal_id'] ?>]" id="soalB<?= $soal['soal_id'] ?>" value="b" <?= old("jawaban.{$soal['soal_id']}") == 'b' ? "checked" : "" ?>>
      <label class="form-check-label" for="soalB<?= $soal['soal_id'] ?>">
        <?= $soal['soal_b'] ?>
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jawaban[<?= $soal['soal_id'] ?>]" id="soalC<?= $soal['soal_id'] ?>" value="c" <?= old("jawaban.{$soal['soal_id']}") == 'c' ? "checked" : "" ?>>
      <label class="form-check-label" for="soalC<?= $soal['soal_id'] ?>">
        <?= $soal['soal_c'] ?>
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jawaban[<?= $soal['soal_id'] ?>]" id="soalD<?= $soal['soal_id'] ?>" value="d" <?= old("jawaban.{$soal['soal_id']}") == 'd' ? "checked" : "" ?>>
      <label class="form-check-label" for="soalD<?= $soal['soal_id'] ?>">
        <?= $soal['soal_d'] ?>
      </label>
    </div>
  </div>
<?php endforeach ?>

<div class="row-cols-md-3" align="center">
  <div class="edu_button">
    <input type="reset" class="btn btn-danger hvr-underline-from-center" value="Reset">
    <input type="submit" name="submit" class="btn btn-primary hvr-underline-from-center" value="Jawab">
  </div>
</div>
<?= form_close() ?>
<?= $this->endSection('content') ?>
<?= $this->section('modal') ?>
<?= view('modals/login_modal'); ?>
<?= $this->endSection('modal') ?>
<?= $this->section('customjs') ?>
<script type="text/javascript">
</script>

<?= $this->endSection('customjs') ?>