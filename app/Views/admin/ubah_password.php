<?= $this->extend('admin/template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Ubah Password</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <div class="col-md-9 col-sm-9 col-xs-12">
            <!-- start of user-activity-graph -->
            <div class="col-md-12"><br>
              <form action="" method="post" class="contact-form">
                <div class="form-group row">
                  <label class="col-form-label col-md-3 col-sm-3 ">Password Lama</label>
                  <div class="col-md-9 col-sm-9 ">
                    <input type="password" name="password_lama" class="form-control <?= ($_validation->hasError('password_lama') ? "is-invalid" : "") ?>" placeholder="Masukkan Password Lama">
                    <div class="invalid-feedback">
                      <?= $_validation->getError('password_lama') ?>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-3 col-sm-3 ">Password Baru</label>
                  <div class="col-md-9 col-sm-9 ">
                    <input type="password" name="password_baru" id="pass1" class="form-control <?= ($_validation->hasError('password_baru') ? "is-invalid" : "") ?>" placeholder="Masukkan Password Baru">
                    <div class="invalid-feedback">
                      <?= $_validation->getError('password_baru') ?>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-3 col-sm-3 ">Konfirmasi Password Baru</label>
                  <div class="col-md-9 col-sm-9 ">
                    <input type="password" name="konfirmasi_password" id="pass2" onkeyup="checkPass(); return false;" class="form-control <?= ($_validation->hasError('konfirmasi_password') ? "is-invalid" : "") ?>" placeholder="Masukkan Password Baru">
                    <div class="invalid-feedback">
                      <?= $_validation->getError('konfirmasi_password') ?>
                    </div>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group row">
                  <div class="col-md-9 col-sm-9  offset-md-3">
                    <button type="button" class="btn btn-primary" onclick="self.history.back()">Kembali</button>
                    <button type="submit" class="btn btn-success">Ubah</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- end of user-activity-graph -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>
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
      message.innerHTML = "Passwords Match!"
    } else {
      //The passwords do not match.
      //Set the color to the bad color and
      //notify the user.
      pass2.style.backgroundColor = badColor;
      message.style.color = badColor;
      message.innerHTML = "Passwords Do Not Match!"
    }
  }
</script>
<?= $this->endSection('customjs') ?>