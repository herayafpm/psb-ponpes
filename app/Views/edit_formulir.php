<?= $this->extend('template') ?>
<?= $this->section('customcss') ?>
<link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12">
    <div class="p-5">
      <h3 class="text-center">Form Pendaftaran Santri Baru</h3><br>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Formulir Pendaftaran</li>
        </ol>
      </nav>
      <div class="alert alert-info">
        <strong>A. DATA PESERTA DIDIK</strong>
      </div>
      <?= form_open_multipart('', ['class' => 'contact-form']) ?>
      <div class="row">
        <div class="col-md-4">
          <label>NIK</label>
          <input type="text" class="form-control" name="pengguna_nik" value="<?= $_pengguna->pengguna_nik; ?>" readonly>
        </div>

        <div class="col-md-4">
          <label>Nama Lengkap</label>
          <input type="text" class="form-control <?= ($_validation->hasError('pengguna_nama') ? "is-invalid" : "") ?>" name="pengguna_nama" value="<?= old('pengguna_nama', $_pengguna->pengguna_nama) ?>">
          <div class="invalid-feedback">
            <?= $_validation->getError('pengguna_nama') ?>
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-5">
          <label>Jenis Kelamin</label>
          <div class="form-check">
            <input name="pendaftar_santri_jk" class="form-check-input <?= ($_validation->hasError('pendaftar_santri_jk') ? "is-invalid" : "") ?>" type="radio" data-toggle="radio" value="Laki - Laki" id="Laki - Laki" <?= old('pendaftar_santri_jk', $_pendaftar_santri['pendaftar_santri_jk']) == 'Laki - Laki' ? "checked" : "" ?>>
            <label class="form-check-label" for="Laki - Laki">
              Laki - Laki
            </label>
          </div>
          <div class="form-check">
            <input name="pendaftar_santri_jk" class="form-check-input <?= ($_validation->hasError('pendaftar_santri_jk') ? "is-invalid" : "") ?>" type="radio" data-toggle="radio" value="Perempuan" id="Perempuan" <?= old('pendaftar_santri_jk', $_pendaftar_santri['pendaftar_santri_jk']) == 'Perempuan' ? "checked" : "" ?>>
            <label class="form-check-label" for="Perempuan">
              Perempuan
            </label>
            <div class="invalid-feedback">
              <?= $_validation->getError('pendaftar_santri_jk') ?>
            </div>
          </div>

        </div>
        <div class="col-md-4">
          <label>Tempat Lahir</label>
          <input type="text" class="form-control <?= ($_validation->hasError('pendaftar_santri_tempat_lahir') ? "is-invalid" : "") ?>" name="pendaftar_santri_tempat_lahir" placeholder="Masukan Tempat Lahir" value="<?= old('pendaftar_santri_tempat_lahir', $_pendaftar_santri['pendaftar_santri_tempat_lahir']) ?>">
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_tempat_lahir') ?>
          </div>
        </div>
        <div class="col-md-3">
          <label>Tanggal Lahir</label>
          <input class="form-control <?= ($_validation->hasError('pendaftar_santri_tgl_lahir') ? "is-invalid" : "") ?>" type="date" name="pendaftar_santri_tgl_lahir" value="<?= old('pendaftar_santri_tgl_lahir', date("Y-m-d", strtotime($_pendaftar_santri['pendaftar_santri_tgl_lahir']))) ?>" />
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_tgl_lahir') ?>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-4">
          <label>Golongan Darah</label>
          <select class="form-control <?= ($_validation->hasError('pendaftar_santri_goldar') ? "is-invalid" : "") ?>" name="pendaftar_santri_goldar">
            <option value="">Pilih Golongan Darah</option>
            <?php foreach (['A', 'B', 'AB', 'O', 'Tidak Tahu'] as $goldar) : ?>
              <option value="<?= $goldar ?>" <?= old('pendaftar_santri_goldar', $_pendaftar_santri['pendaftar_santri_goldar']) == $goldar ? "selected" : "" ?>><?= $goldar ?></option>
            <?php endforeach ?>
          </select>
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_goldar') ?>
          </div>
        </div>
        <div class="col-md-3">
          <label>Anak Ke</label>
          <input class="form-control <?= ($_validation->hasError('pendaftar_santri_anak_ke') ? "is-invalid" : "") ?>" type="number" name="pendaftar_santri_anak_ke" value="<?= old('pendaftar_santri_anak_ke', $_pendaftar_santri['pendaftar_santri_anak_ke']) ?>" placeholder="Anak ke-" />
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_anak_ke') ?>
          </div>
        </div>
        <div class="col-md-3">
          <label>Jml Saudara</label>
          <input class="form-control <?= ($_validation->hasError('pendaftar_santri_jml_sdr') ? "is-invalid" : "") ?>" type="number" name="pendaftar_santri_jml_sdr" value="<?= old('pendaftar_santri_jml_sdr', $_pendaftar_santri['pendaftar_santri_jml_sdr']) ?>" placeholder="Jumlah Saudara" />
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_jml_sdr') ?>
          </div>
        </div>
        <div class="col-md-12">
          <label>Nomor Telp/HP</label>
          <input class="form-control <?= ($_validation->hasError('pendaftar_santri_notelp') ? "is-invalid" : "") ?>" type="number" name="pendaftar_santri_notelp" value="<?= old('pendaftar_santri_notelp', $_pendaftar_santri['pendaftar_santri_notelp']) ?>" placeholder="Nomor Telepon" />
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_notelp') ?>
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-4">
          <label>Hobi</label>
          <input class="form-control <?= ($_validation->hasError('pendaftar_santri_hobi') ? "is-invalid" : "") ?>" type="text" name="pendaftar_santri_hobi" value="<?= old('pendaftar_santri_hobi', $_pendaftar_santri['pendaftar_santri_hobi']) ?>" placeholder="Hobi" />
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_hobi') ?>
          </div>

        </div>
        <div class="col-md-4">
          <label>Cita-cita</label>
          <input class="form-control <?= ($_validation->hasError('pendaftar_santri_cita') ? "is-invalid" : "") ?>" type="text" name="pendaftar_santri_cita" value="<?= old('pendaftar_santri_cita', $_pendaftar_santri['pendaftar_santri_cita']) ?>" placeholder="Cita-cita" />
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_cita') ?>
          </div>
        </div>
        <div class="col-md-4">
          <label>Asal Sekolah</label>
          <input class="form-control <?= ($_validation->hasError('pendaftar_santri_asal_sekolah') ? "is-invalid" : "") ?>" type="text" name="pendaftar_santri_asal_sekolah" value="<?= old('pendaftar_santri_asal_sekolah', $_pendaftar_santri['pendaftar_santri_asal_sekolah']) ?>" placeholder="Asal Sekolah" />
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_asal_sekolah') ?>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-6">
          <label>Alamat</label>
          <textarea class="form-control <?= ($_validation->hasError('pendaftar_santri_alamat') ? "is-invalid" : "") ?>" placeholder="Masukkan alamat rumah" rows="3" name="pendaftar_santri_alamat"><?= old('pendaftar_santri_alamat', $_pendaftar_santri['pendaftar_santri_alamat']) ?></textarea>
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_alamat') ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-3">
          <select class="form-control <?= ($_validation->hasError('provinsi_id') ? "is-invalid" : "") ?>" name="provinsi_id" id="provinsi_id" required>
            <option value="">Pilih Provinsi</option>
            <?php foreach ($_provinsis as $provinsi) : ?>
              <option value="<?= $provinsi['provinsi_id'] ?>" <?= old('provinsi_id', $_pendaftar_santri['provinsi_id']) == $provinsi['provinsi_id'] ? "selected" : "" ?>><?= $provinsi['provinsi_nama'] ?></option>
            <?php endforeach ?>
          </select>
          <div class="invalid-feedback">
            <?= $_validation->getError('provinsi_id') ?>
          </div>
        </div>
        <div class="form-group col-sm-3">
          <select class="form-control <?= ($_validation->hasError('kabupaten_id') ? "is-invalid" : "") ?>" name="kabupaten_id" id="kabupaten_id" required>
            <option value="">Pilih Kabupaten</option>
          </select>
          <div class="invalid-feedback">
            <?= $_validation->getError('kabupaten_id') ?>
          </div>
        </div>
        <div class="form-group col-sm-3">
          <select class="form-control <?= ($_validation->hasError('kecamatan_id') ? "is-invalid" : "") ?>" name="kecamatan_id" id="kecamatan_id" required>
            <option value="">Pilih Kecamatan</option>
          </select>
          <div class="invalid-feedback">
            <?= $_validation->getError('kecamatan_id') ?>
          </div>
        </div>

      </div>
      <div class="row">

        <div class="col-md-6" style="padding-top: 20px;">
          <label>Foto KTP/KTS/Tanda Pengenal</label>
          <p>*) KTP/KTS/Tanda Pengenal </p>
          <p>*) Lewati jika tidak ingin mengubahnya </p>
          <div class="avatar">
            <img src="<?= base_url('') ?>/uploads/ktp/<?= $_pendaftar_santri['pendaftar_santri_ktp'] ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
          </div><br>
          <input class="form-control-file <?= ($_validation->hasError('pendaftar_santri_ktp') ? "is-invalid" : "") ?>" type="file" name="pendaftar_santri_ktp" id="fileToUpload" accept="image/*">
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_ktp') ?>
          </div>
        </div>
        <div class="col-md-6" style="padding-top: 20px;">
          <label>Foto KK</label>
          <p>*) KK </p>
          <p>*) Lewati jika tidak ingin mengubahnya </p>
          <div class="avatar">
            <img src="<?= base_url('') ?>/uploads/kk/<?= $_pendaftar_santri['pendaftar_santri_kk'] ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
          </div><br>
          <input class="form-control-file <?= ($_validation->hasError('pendaftar_santri_kk') ? "is-invalid" : "") ?>" type="file" name="pendaftar_santri_kk" id="fileToUpload" accept="image/*">
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_kk') ?>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-sm-12">
          <label>Prestasi yg pernah diraih</label>
          <p> <i>*) Biarkan apabila tidak memiliki prestasi</i> </p>
          <input class="form-control <?= ($_validation->hasError('pendaftar_santri_prestasi') ? "is-invalid" : "") ?>" type="text" name="pendaftar_santri_prestasi" value="<?= old('pendaftar_santri_prestasi', $_pendaftar_santri['pendaftar_santri_prestasi']) ?>" placeholder="Prestasi" />
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_prestasi') ?>
          </div>
        </div>
        <div class="col-sm-6">
        </div>
      </div><br>
      <div class="row">

        <div class="col-md-6" style="padding-top: 20px;">
          <label>Foto 3x4</label>
          <p>*) 3x4 </p>
          <p>*) Lewati jika tidak ingin mengubahnya </p>
          <div class="avatar">
            <img src="<?= base_url('') ?>/uploads/foto/<?= $_pendaftar_santri['pendaftar_santri_foto'] ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="25%">
          </div><br>
          <input class="form-control-file <?= ($_validation->hasError('pendaftar_santri_foto') ? "is-invalid" : "") ?>" type="file" name="pendaftar_santri_foto" id="fileToUpload" accept="image/*">
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_foto') ?>
          </div>
        </div>
        <div class="col-md-6" style="padding-top: 20px;">
          <label>Bukti Pembayaran Pendaftaran</label>
          <p>*) Bukti Pembayaran </p>
          <p>*) Lewati jika tidak ingin mengubahnya </p>
          <div class="avatar">
            <img src="<?= base_url('') ?>/uploads/pembayaran/<?= $_pendaftar_santri['pendaftar_santri_pembayaran'] ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="25%">
          </div><br>
          <input class="form-control-file <?= ($_validation->hasError('pendaftar_santri_pembayaran') ? "is-invalid" : "") ?>" type="file" name="pendaftar_santri_pembayaran" id="fileToUpload" accept="image/*">
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_pembayaran') ?>
          </div>
        </div>

      </div><br>
      <div class="row">
        <div class="col-md-12">
          <label>Program </label> <br>
          <p> <i>*) Pilih Program Yang Ingin Anda Masuki</i> </p>
          <select class="form-control <?= ($_validation->hasError('program_id') ? "is-invalid" : "") ?> col-md-6" name="program_id">
            <option value="">Pilih Program </option>
            <?php foreach ($_programs as $program) : ?>
              <option value="<?= $program['program_id'] ?>" <?= old('program_id', $_pendaftar_santri['program_id']) == $program['program_id'] ? "selected" : "" ?>><?= $program['program_nama'] ?></option>
            <?php endforeach ?>
          </select>
          <div class="invalid-feedback">
            <?= $_validation->getError('program_id') ?>
          </div>
        </div>
      </div><br>
      <div class="alert alert-info">
        <strong>A. DATA ORANG TUA</strong>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label>Nama Ayah</label>
          <input type="text" class="form-control <?= ($_validation->hasError('pendaftar_santri_nama_ayah') ? "is-invalid" : "") ?>" name="pendaftar_santri_nama_ayah" value="<?= old('pendaftar_santri_nama_ayah', $_pendaftar_santri['pendaftar_santri_nama_ayah']) ?>" placeholder="Masukan Nama Ayah">
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_nama_ayah') ?>
          </div>
        </div>

        <div class="col-md-6">
          <label>Nama Ibu</label>
          <input type="text" class="form-control <?= ($_validation->hasError('pendaftar_santri_nama_ibu') ? "is-invalid" : "") ?>" name="pendaftar_santri_nama_ibu" value="<?= old('pendaftar_santri_nama_ibu', $_pendaftar_santri['pendaftar_santri_nama_ibu']) ?>" placeholder="Masukan Nama Ibu">
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_nama_ibu') ?>
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-6">
          <label>Pekerjaan Ayah</label>
          <input class="form-control <?= ($_validation->hasError('pendaftar_santri_kerja_ayah') ? "is-invalid" : "") ?>" type="text" name="pendaftar_santri_kerja_ayah" value="<?= old('pendaftar_santri_kerja_ayah', $_pendaftar_santri['pendaftar_santri_kerja_ayah']) ?>" placeholder="Pekerjaan Ayah" />
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_kerja_ayah') ?>
          </div>
        </div>
        <div class="col-md-6">
          <label>Pekerjaan Ibu</label>
          <input class="form-control <?= ($_validation->hasError('pendaftar_santri_kerja_ibu') ? "is-invalid" : "") ?>" type="text" name="pendaftar_santri_kerja_ibu" value="<?= old('pendaftar_santri_kerja_ibu', $_pendaftar_santri['pendaftar_santri_kerja_ibu']) ?>" placeholder="Pekerjaan Ibu" />
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_kerja_ibu') ?>
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-6">
          <label>Alamat Orang Tua</label>
          <textarea class="form-control <?= ($_validation->hasError('pendaftar_santri_alamat_ortu') ? "is-invalid" : "") ?>" placeholder="Masukkan alamat rumah" rows="3" name="pendaftar_santri_alamat_ortu"><?= old('pendaftar_santri_alamat_ortu', $_pendaftar_santri['pendaftar_santri_alamat_ortu']) ?></textarea>
          <div class="invalid-feedback">
            <?= $_validation->getError('pendaftar_santri_alamat_ortu') ?>
          </div>
        </div>

        <div class="col-md-6">
          <div class="col-sm-12">
            <label>Penghasilan Orang Tua</label>
            <select class="form-control <?= ($_validation->hasError('pendaftar_santri_penghasilan_ortu') ? "is-invalid" : "") ?>" name="pendaftar_santri_penghasilan_ortu">
              <option value="">Pilih Penghasilan</option>
              <?php foreach (['Kurang dari Rp.500.000,.', 'Rp.500.000,. s/d Rp.1.000.000,.', 'Rp.1.000.000,. s/d Rp.3.000.000,.', 'Rp.3.000.000,. s/d Rp.5.000.000,.', 'Diatas Rp.5.000.000,.'] as $penghasilan) : ?>
                <option value="<?= $penghasilan ?>" <?= old('pendaftar_santri_penghasilan_ortu', $_pendaftar_santri['pendaftar_santri_penghasilan_ortu']) == $penghasilan ? "selected" : "" ?>><?= $penghasilan ?></option>
              <?php endforeach ?>
            </select>
            <div class="invalid-feedback">
              <?= $_validation->getError('pendaftar_santri_penghasilan_ortu') ?>
            </div>
          </div>
          <div class="col-sm-12">
            <label>No Telp/HP Orang Tua</label>
            <input type="text" class="form-control <?= ($_validation->hasError('pendaftar_santri_notelp_ortu') ? "is-invalid" : "") ?>" name="pendaftar_santri_notelp_ortu" value="<?= old('pendaftar_santri_notelp_ortu', $_pendaftar_santri['pendaftar_santri_notelp_ortu']) ?>" placeholder="Masukan No.Telp">
            <div class="invalid-feedback">
              <?= $_validation->getError('pendaftar_santri_notelp_ortu') ?>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12 pl-4">
          <div class="form-check">
            <input class="form-check-input <?= ($_validation->hasError('persetujuan') ? "is-invalid" : "") ?>" type="checkbox" name="persetujuan" value="1" id="persetujuan">
            <label class="form-check-label" for="persetujuan">
              Setuju
            </label>
            <div class="invalid-feedback">
              <?= $_validation->getError('persetujuan') ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul>
            <li>Saya telah mengisi data dengan sebenar-benarnya dan dapat dipertanggungjawabkan.</li>
            <li>Saya telah mengingat atau mencatat password untuk login nanti setelah formulir dikirimkan.</li>
          </ul>
        </div>
      </div>
      <div class="row" align="center">
        <div class="edu_button">
          <input type="submit" name="submit" class="btn btn-primary hvr-underline-from-center" value="Update Formulir Saya">
        </div>
      </div>
      <?= form_close() ?>

    </div>

  </div>

</div>
<?= $this->endSection('content') ?>
<?= $this->section('modal') ?>
<?= $this->endSection('modal') ?>
<?= $this->section('customjs') ?>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/select2/dist/js/select2.full.min.js"></script>
<script>
  $(document).ready(function() {
    $('#provinsi_id').select2({
      placeholder: 'Pilih Provinsi'
    })
    // $('#kabupaten_id').prop('disabled', true)
    $('#kabupaten_id').select2({
      placeholder: "Pilih Kabupaten"
    })
    // $('#kecamatan_id').prop('disabled', true)
    $('#kecamatan_id').select2({
      placeholder: 'Pilih Kecamatan'
    })
    $('#provinsi_id').change(function(e) {
      var val = $(this).val()
      $.ajax(
        '<?= base_url('api/address/kabupaten?provinsi_id=') ?>' + val,
      ).done(function(result) {
        var datas = [{
            'id': 0,
            'text': 'Pilih Kabupaten'
          },
          ...result.data,
        ]
        $('#kabupaten_id').prop('disabled', false)
        $('#kabupaten_id').empty().select2({
          data: datas
        });
        $('#kabupaten_id').val("<?= old('kabupaten_id', $_pendaftar_santri['kabupaten_id'] ?? '0') ?>")
        $('#kabupaten_id').trigger('change')
      })
    })
    $('#provinsi_id').val("<?= old('provinsi_id', $_pendaftar_santri['provinsi_id'] ?? '') ?>").trigger('change')

    $('#kabupaten_id').change(function(e) {
      var val = $(this).val()
      $.ajax(
        '<?= base_url('api/address/kecamatan?kabupaten_id=') ?>' + val,
      ).done(function(result) {
        var datas = [{
            'id': 0,
            'text': 'Pilih Kecamatan'
          },
          ...result.data,
        ]
        $('#kecamatan_id').prop('disabled', false)
        $('#kecamatan_id').empty().select2({
          data: datas
        });
        $('#kecamatan_id').val("<?= old('kecamatan_id', $_pendaftar_santri['kecamatan_id'] ?? '0') ?>")
        $('#kecamatan_id').trigger('change')
      })
    })
  })
</script>
<?= $this->endSection('customjs') ?>