<?= $this->extend('template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<h3 class="headerw3">Ubah Password</h3>
<hr>
<form class="contact-form" action="" method="post">
  <div class="row">
    <div class="col-md-4">
      <label>Password Lama</label>
      <input type="password" class="form-control <?= ($_validation->hasError('password_lama') ? "is-invalid" : "") ?>" name="password_lama" value="<?= old('password_lama') ?>">
      <div class="invalid-feedback">
        <?= $_validation->getError('password_lama') ?>
      </div>
    </div>

    <div class="col-md-4">
      <label>Password Baru</label>
      <input type="password" class="form-control <?= ($_validation->hasError('password_baru') ? "is-invalid" : "") ?>" name="password_baru" id="pass1" value="<?= old('password_baru') ?>">
      <div class="invalid-feedback">
        <?= $_validation->getError('password_baru') ?>
      </div>
    </div>

    <div class="col-md-4">
      <label>Konfirmasi Password Baru</label>
      <input type="password" class="form-control <?= ($_validation->hasError('konfirmasi_password') ? "is-invalid" : "") ?>" name="konfirmasi_password" value="<?= old('konfirmasi_password') ?>" id="pass2" onkeyup="checkPass(); return false;">
      <span id="confirmMessage" class="confirmMessage"></span>
      <div class="invalid-feedback">
        <?= $_validation->getError('konfirmasi_password') ?>
      </div>
    </div>
  </div><br>

  <div class="row-cols-md-3" align="center">
    <div class="edu_button">
      <input type="submit" name="submit" class="btn btn-primary hvr-underline-from-center" value="Ubah Password">
    </div>
  </div><br>
</form>
<?= $this->endSection('content') ?>
<?= $this->section('modal') ?>
<?= view('modals/login_modal'); ?>
<?= $this->endSection('modal') ?>
<?= $this->section('customjs') ?>
<script type="text/javascript">
  function checkPass() {
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if (pass1.value == pass2.value) {
      //The passwords match.
      //Set the color to the good color and inform
      //the user that they have entered the correct password
      pass2.style.backgroundColor = goodColor;
      message.style.color = goodColor;
      message.innerHTML = "Passwords Sama!"
    } else {
      //The passwords do not match.
      //Set the color to the bad color and
      //notify the user.
      pass2.style.backgroundColor = badColor;
      message.style.color = badColor;
      message.innerHTML = "Passwords Tidak sama!"
    }
  }
</script>

<?= $this->endSection('customjs') ?>