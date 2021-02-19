<?= $this->extend('template') ?>
<?= $this->section('customcss') ?>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<!-- /.card-header -->
<h3 class="headerw3">Panduan PSB</h3>
<hr>
<div class="about-sub-gd">
  <h4 style="color: #000">Tata Cara Pendaftaran : </h4>
  <table class="table" style="text-align: left;">
    <tr>
      <td><span class="fa fa-check" aria-hidden="true"></td>
      <td>Siswa mendaftarkan di halaman utama untuk mendapatkan akun dengan memasukan NISN, Nama serta Password. Perlu diperhatikan NISN dan Password bersifat rahasia</td>
    </tr>
    <tr>
      <td><span class="fa fa-check" aria-hidden="true"></td>
      <td>Setelah mendaftar, siswa melakukan login dengan NISN dan password yang telah terdaftar sebelumnya</td>
    </tr>
    <tr>
      <td><span class="fa fa-check" aria-hidden="true"></td>
      <td>Setelah login berhasil kemudian siswa dapat langsung mengisi formulir pendaftaran PPBD Online. diwajibkan untuk mengisi semua data dengan data yang valid dan dapat dipertanggung jawabkan</td>
    </tr>
    <tr>
      <td><span class="fa fa-check" aria-hidden="true"></td>
      <td>Saat proses pengisian formulir berhasil, maka data diri akan muncul. kemudian apa bila ingin merubah data diri dapat dilakukan melalui tombol edit yang ada dibawah</td>
    </tr>
    <tr>
      <td><span class="fa fa-check" aria-hidden="true"></td>
      <td>Tunggu sampai waktu pengumuman tiba, maka hasil akan diumumkan di halaman pengumuman yang dapat di akses di dashboard siswa</td>
    </tr>
    <tr>
      <td><span class="fa fa-check" aria-hidden="true"></td>
      <td>Untuk calon siswa yang diterima melakukan pendaftaran ulang ke sekolah dengan membawa berkas/dokumen asli yang terlampir pada persyaratan</td>
    </tr>
    <tr>
      <td><span class="fa fa-check" aria-hidden="true"></td>
      <td>Verifikasi data oleh pihak sekolah</td>
    </tr>
    <tr>
      <td><span class="fa fa-check" aria-hidden="true"></td>
      <td>Pihak sekolah menyatakan calon siswa lolos seleksi / tidak (pengesahan).</td>
    </tr>
    <tr>
      <td><span class="fa fa-check" aria-hidden="true"></td>
      <td>Calon siswa membayar biaya masuk sekolah.</td>
    </tr>
  </table>
</div>
<h3 class="headerw3">Persyaratan PPDB</h3>
<hr>
<div class="about-sub-gd">
  <p>Setelah mendaftar di PSB Online, calon siswa menyerahkan hasil print out formulir online ke Sekretariat Panitia PPDB :</p>
  <table class="table" style="text-align: left;">
    <tr>
      <td><span class="fa fa-check" aria-hidden="true"></td>
      <td>Bagi Calon Siswa yang masih aktif di sekolah SMP/MTS harap melampirkan :</td>
    </tr>
    <tr>
      <td></td>
      <td>
        <ol type="a">
          <li>Foto copy NISN (Nomor Induk Siswa Nasional) : 1 lembar</li>
          <li>Foto copy raport minimal kelas 4, 5 dan 6 (semester gasal) : 1 lembar (dilegalisir)</li>
          <li>Foto copy Akta kelahiran dan Kartu Keluarga : 1 lembar</li>
          <li>pas photo berwarna ukuran 3 x 4 cm sebanyak 3 lembar</li>
          <li>Surat Pernyataan Orang Tua/Wali (disediakan Panitia)</li>
        </ol>
        (Calon siswa menunjukkan Buku Raport asli)
      </td>
    </tr>
  </table>


</div>
<?= $this->endSection('content') ?>
<?= $this->section('modal') ?>
<?= view('modals/login_modal'); ?>
<?= $this->endSection('modal') ?>
<?= $this->section('customjs') ?>
<?= $this->endSection('customjs') ?>