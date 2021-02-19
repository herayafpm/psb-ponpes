<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SoalSeeder extends Seeder
{
  public function run()
  {
    $this->db->query("INSERT INTO soal (soal_id, soal_soal,soal_a,soal_b,soal_c,soal_d,soal_kunci,soal_aktif) VALUES
      (2, 'Siapa yang mengembangkan Sejarah Web pertama kali?', 'Ruben', 'Thomas Alpha Edison', 'Tim Berners-Lee', 'Albert ', 'c', '1'),
      (3, 'Profesi dalam pengembangan web, kecuali...', 'Web Developer', 'Web Programer', 'Web Administrator', 'Web Browser', 'd', '1'),
      (4, 'Browser bawaan OS Windows adalah ?', 'Opera mini', 'Mozila', 'Chrome', 'Internet Explorer', 'd', '1'),
      (6, 'Multimedia adalah ?', 'Teknologi yg memadukan gambar,video dan suara.', 'teknologi yg memadukan Daftar', 'teknologi yg memadukan Baris dan kolom', 'Teknologi yg memadukan Kelistrikan', 'a', '0'),
      (7, 'Menurut Anda, di bawah ini adalah gambar?', 'Avatar', 'Pelangi', 'Singa Laut', 'Bulan', 'a', '1'),
      (9, 'jarak suarabaya', 'ee', 'era', '3', 's', 'c', '1'),
      (10, 'sdadas', 'ee', 'era', '333333333333333333', 'qq', 'c', '0');");
  }
}
