<!-- modal daftar akun -->
<div class="modal fade" id="daftarModal" tabindex="-1" aria-labelledby="daftarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarModalLabel"><b>Daftar Akun</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><img src="assets/img/logo_ds.png" style="max-height: 120px; width:120px;"></center>
        <p>
        <div class="card-body">
          <form action="" id="registerForm">
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="number" name="nik" id="nik" class="form-control" placeholder="Masukan nik" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input type="password" name="password" id="passworddaftar" class="form-control" placeholder="Masukkan Password" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>