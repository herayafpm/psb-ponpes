<!DOCTYPE html>
<html>

<head>
  <?= view('css/bootstrap') ?>
  <style>
    * {
      font-family: DejaVu Sans, sans-serif;
    }
  </style>
</head>

<body>
  <?= view('components/header_surat') ?>
  <h4 align="center" style="line-height: 2.0;">PENERIMAAN SANTRI BARU <?= $_year_start ?>/<?= $_year_end ?><br>PONPES DARUSSALAM DUKUHWALUH PURWOKERTO<br></h4>
  <table class="table table-condensed">
    <tr>
      <td width="25">1</td>
      <th width="200">Nomor Pendaftaran</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_no_daftar']; ?></td>
    </tr>
    <tr>
      <td>2</td>
      <th>NIK</th>
      <td><?= $_pendaftar_santri['pengguna_nik']; ?></td>
    </tr>
    <tr>
      <td>3</td>
      <th>Nama Santri</th>
      <td><?= $_pendaftar_santri['pengguna_nama']; ?></td>
    </tr>
    <tr>
      <td>4</td>
      <th>Jenis Kelamin</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_jk']; ?></td>
    </tr>
    <tr>
      <td>5</td>
      <th>Alamat</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_alamat']; ?></td>
    </tr>
    <tr>
      <td>6</td>
      <th>Kecamatan</th>
      <td><?= $_pendaftar_santri['kecamatan_nama']; ?></td>
    </tr>
    <tr>
      <td>7</td>
      <th>Kabupaten</th>
      <td><?= $_pendaftar_santri['kabupaten_nama']; ?></td>
    </tr>
    <tr>
      <td>8</td>
      <th>Provinsi</th>
      <td><?= $_pendaftar_santri['provinsi_nama']; ?></td>
    </tr>
    <tr>
      <td>9</td>
      <th>Tempat, Tanggal Lahir</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_tempat_lahir']; ?>, <?= indonesian_date($_pendaftar_santri['pendaftar_santri_tgl_lahir']); ?></td>
    </tr>
    <tr>
      <td>10</td>
      <th>Golongan Darah</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_goldar']; ?></td>
    </tr>
    <tr>
      <td>11</td>
      <th>Anak Ke - </th>
      <td><?= $_pendaftar_santri['pendaftar_santri_anak_ke']; ?> dari <?= $_pendaftar_santri['pendaftar_santri_jml_sdr']; ?> bersaudara</td>
    </tr>
    <tr>
      <td>12</td>
      <th>Cita - cita</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_cita']; ?></td>
    </tr>
    <tr>
      <td>13</td>
      <th>Hobi</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_hobi']; ?></td>
    </tr>
    <tr>
      <td>14</td>
      <th>Prestasi</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_prestasi']; ?></td>
    </tr>
    <tr>
      <td>15</td>
      <th>Program yang Diambil</th>
      <td><?= $_pendaftar_santri['program_nama']; ?></td>
    </tr>
    <tr>
      <td>16</td>
      <th>Nama Ayah</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_nama_ayah']; ?></td>
    </tr>
    <tr>
      <td>17</td>
      <th>Nama Ibu</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_nama_ibu']; ?></td>
    </tr>
    <tr>
      <td>18</td>
      <th>Pekrjaan Ayah</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_kerja_ayah']; ?></td>
    </tr>
    <tr>
      <td>19</td>
      <th>Pekrjaan Ibu</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_kerja_ibu']; ?></td>
    </tr>
    <tr>
      <td>20</td>
      <th>Alamat Orang Tua</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_alamat_ortu']; ?></td>
    </tr>
    <tr>
      <td>21</td>
      <th>Nomor Telp/HP Orang Tua</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_notelp_ortu']; ?></td>
    </tr>
    <tr>
      <td>22</td>
      <th>Masuk Kelas</th>
      <td><?= $_pendaftar_santri['pendaftar_santri_kelas']; ?></td>
    </tr>
    <tr>
      <td>23</td>
      <th>Status</th>
      <?php
      $status = "Belum diverifikasi";
      if ($_pendaftar_santri['pendaftar_santri_status'] == 1) {
        $status = "Lulus";
      } else if ($_pendaftar_santri['pendaftar_santri_status'] == 2) {
        $status = "Tidak Lulus";
      }
      ?>
      <td><span class="label label-info"><?= $status ?></span></td>
    </tr>
    <tr>
      <td></td>
      <td align="center" style="padding-right:10px;"><br><br><img src="<?= base_url('') ?>/uploads/foto/<?= $_pendaftar_santri['pendaftar_santri_foto']; ?>" width="85px"></td>
      <td><br><br>
        <p>_______________,<?= indonesian_date(date('Y-m-d')) ?></p>
        Nama Pendaftar
        <br><br><br><br>
        <span class="text-capitalize"><?= $_pendaftar_santri['pengguna_nama']; ?></span>
      </td>
    </tr>
  </table>
</body>

</html>