<?= $this->extend('admin/template') ?>
<?= $this->section('customcss') ?>
<!-- Datatables -->
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<div class="">
  <div class="page-title">
    <div class="title_left w-100">
      <h3>Pendaftar Santri <?= $_title_header ?> <span class="text-secondary" style="font-size:0.6em">Pon.Pes Darussalam Dukuhwaluh Purwokerto</span></h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <h5>Filter</h5>
          <div class="form-group row">
            <div class="col-md-4 mb-1"><input class="form-control form-control-sm" type="text" id="pendaftar_santri_no_daftar" placeholder="No Pendaftaran" /></div>
            <div class="col-md-4 mb-1"><input class="form-control form-control-sm" type="text" id="pengguna_nik" placeholder="NIK Pendaftar" /></div>
            <div class="col-md-4 mb-1"><input class="form-control form-control-sm" type="text" id="pengguna_nama" placeholder="Nama Pendaftar" /></div>
            <div class="col-md-4">
              <div id="daterange" class="form-control form-control-sm"><span class="date">Pilih Tanggal</span> <i class="fa fa-fw fa-calendar"></i>&nbsp;<span></span> <i class="fa fa-caret-down"></i></div>
            </div>
          </div>
          <table id="datatable-custom" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>No Pendaftaran</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>No Pendaftaran</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="detailPendaftarModal" tabindex="-1" role="dialog" aria-labelledby="detailPendaftarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailPendaftarModalLabel">Detail Pendaftar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" data-id="">
        <div class="col-md-12"><br>
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <tr>
                <td width="150">Foto 3x4</td>
                <td>
                  <div class="foto"></div>
                </td>
              </tr>
              <tr>
                <td width="250">Nomor Pendaftaran</td>
                <td><span class="pendaftar_santri_no_daftar"></span></td>
              </tr>
              <tr>
                <td width="150">Nomor NIK</td>
                <td><span class="pengguna_nik"></span></td>
              </tr>
              <tr>
                <td width="250">Nama Santri</td>
                <td><span class="pengguna_nama"></span></td>
              </tr>
              <tr>
                <td width="250">Email Santri</td>
                <td><span class="pengguna_email"></span></td>
              </tr>
              <tr>
                <td width="250">No Telepon Santri</td>
                <td><span class="pendaftar_santri_notelp"></span></td>
              </tr>
              <tr>
                <td width="250">Ditempatkan dikelas</td>
                <td><span class="pendaftar_santri_kelas"></span></td>
              </tr>
              <tr>
                <td width="150">Jenis Kelamin</td>
                <td><span class="pendaftar_santri_jk"></span></td>
              </tr>
              <tr>
                <td width="150">Golongan Darah</td>
                <td><span class="pendaftar_santri_goldar"></span></td>
              </tr>
              <tr>
                <td width="150">Anak Ke - </td>
                <td><span class="pendaftar_santri_anak_ke"></span> dari <span class="pendaftar_santri_jml_sdr"></span> saudara</td>
              </tr>
              <tr>
                <td width="150">Cita - cita</td>
                <td><span class="pendaftar_santri_cita"></span></td>
              </tr>
              <tr>
                <td width="150">Hobi</td>
                <td><span class="pendaftar_santri_hobi"></span></td>
              </tr>
              <tr>
                <td width="150">Alamat</td>
                <td><span class="pendaftar_santri_alamat"></span></td>
              </tr>
              <tr>
                <td width="150">Kecamatan</td>
                <td><span class="kecamatan_nama"></span></td>
              </tr>
              <tr>
                <td width="150">Kabupaten</td>
                <td><span class="kabupaten_nama"></span></td>
              </tr>
              <tr>
                <td width="150">Provinsi</td>
                <td><span class="provinsi_nama"></span></td>
              </tr>
              <tr>
                <td width="150">Tempat, Tanggal Lahir</td>
                <td><span class="pendaftar_santri_tempat_lahir"></span>, <span class="pendaftar_santri_tgl_lahir"></span></td>
              </tr>

              <tr>
                <td width="150">Asal Sekolah</td>
                <td><span class="pendaftar_santri_asal_sekolah"></span></td>
              </tr>

              <tr>
                <td width="150">Prestasi</td>
                <td><span class="pendaftar_santri_prestasi"></span></td>
              </tr>
              <tr>
                <td width="150">Program Program yang Diambil</td>
                <td><span class="program_nama"></span></td>
              </tr>
              <tr>
                <td width="150">Nama Ayah</td>
                <td><span class="pendaftar_santri_nama_ayah"></span></td>
              </tr>
              <tr>
                <td width="150">Nama Ibu</td>
                <td><span class="pendaftar_santri_nama_ibu"></span></td>
              </tr>
              <tr>
                <td width="150">Kerja Ayah</td>
                <td><span class="pendaftar_santri_kerja_ayah"></span></td>
              </tr>
              <tr>
                <td width="150">Kerja Ibu</td>
                <td><span class="pendaftar_santri_kerja_ibu"></span></td>
              </tr>
              <tr>
                <td width="150">Alamat Orang Tua</td>
                <td><span class="pendaftar_santri_alamat_ortu"></span></td>
              </tr>
              <tr>
                <td width="150">Nomor Telp/HP Orang Tua</td>
                <td><span class="pendaftar_santri_notelp_ortu"></span></td>
              </tr>
              <tr>
                <td width="150">Penghasilan Orang Tua</td>
                <td><span class="pendaftar_santri_penghasilan_ortu"></span></td>
              </tr>
              <tr>
                <td width="150">KTP KTS/lainnya</td>
                <td>
                  <div class="ktp"></div>
                </td>
              </tr>
              <tr>
                <td width="150">Kartu Keluarga</td>
                <td>
                  <div class="kk"></div>
                </td>
              </tr>
              <tr>
                <td width="150">Pembayaran</td>
                <td>
                  <div class="pembayaran"></div>
                </td>
              </tr>
              <tr>
                <td width="150">Masuk Kelas</td>
                <td><span class="label label-info pendaftar_santri_kelas"></span></td>
              </tr>
              <tr>
                <td width="150">Status</td>
                <td><span class="label label-info pendaftar_santri_status"></span></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>
<?= $this->section('customjs') ?>
<!-- Datatables -->
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/pdfmake/build/vfs_fonts.js"></script>
<script>
  var tabel = null;
  var datas = [];
  var id = null;
  var data = {};
  var date = "";
  var start;
  var end;

  function detail(index) {
    var pendaftar = datas[index];
    var url_foto = "<?= base_url('uploads/foto') ?>/" + pendaftar.pendaftar_santri_foto;
    var url_kk = "<?= base_url('uploads/kk') ?>/" + pendaftar.pendaftar_santri_kk;
    var url_ktp = "<?= base_url('uploads/ktp') ?>/" + pendaftar.pendaftar_santri_ktp;
    var url_pembayaran = "<?= base_url('uploads/pembayaran') ?>/" + pendaftar.pendaftar_santri_pembayaran;
    '<a class="fancybox pendaftar_santri_foto_a" data-fancybox-group="gallery" href="#" title="Gambar Foto 3x4" width="100%"><img src="" alt="Thumbnail Image" class="img-thumbnail img-responsive pendaftar_santri_foto_img"></a>'
    var image = $("<img>");
    image.attr("src", url_foto);
    image.attr("alt", "Foto 3x4");
    image.addClass("img-thumbnail img-responsive w-50")
    var link = $("<a>");
    link.attr("href", url_foto);
    link.attr("target", '_blank');
    link.attr("title", "Foto 3x4");
    link.html(image);
    link.addClass("fancybox");
    link.data('fancybox-group', 'gallery')
    link.width('100%')
    $(".foto").html(link);
    var image = $("<img>");
    image.attr("src", url_ktp);
    image.attr("alt", "KTP");
    image.addClass("img-thumbnail img-responsive w-50")
    var link = $("<a>");
    link.attr("href", url_ktp);
    link.attr("target", '_blank');
    link.attr("title", "KTP");
    link.html(image);
    link.addClass("fancybox");
    link.data('fancybox-group', 'gallery')
    link.width('100%')
    $(".ktp").html(link);
    var image = $("<img>");
    image.attr("src", url_kk);
    image.attr("alt", "KK");
    image.addClass("img-thumbnail img-responsive w-50")
    var link = $("<a>");
    link.attr("href", url_kk);
    link.attr("target", '_blank');
    link.attr("title", "KK");
    link.html(image);
    link.addClass("fancybox");
    link.data('fancybox-group', 'gallery')
    link.width('100%')
    $(".kk").html(link);
    var image = $("<img>");
    image.attr("src", url_pembayaran);
    image.attr("alt", "Bukti Pembayaran");
    image.addClass("img-thumbnail img-responsive w-50")
    var link = $("<a>");
    link.attr("href", url_pembayaran);
    link.attr("target", '_blank');
    link.attr("title", "Bukti Pembayaran");
    link.html(image);
    link.addClass("fancybox");
    link.data('fancybox-group', 'gallery')
    link.width('100%')
    $(".pembayaran").html(link);
    $('.pendaftar_santri_no_daftar').html(pendaftar.pendaftar_santri_no_daftar)
    $('.pengguna_nik').html(pendaftar.pengguna_nik)
    $('.pengguna_nama').html(pendaftar.pengguna_nama)
    $('.pengguna_email').html(pendaftar.pengguna_email)
    $('.pendaftar_santri_notelp').html(pendaftar.pendaftar_santri_notelp)
    $('.pendaftar_santri_kelas').html(pendaftar.pendaftar_santri_kelas)
    $('.pendaftar_santri_jk').html(pendaftar.pendaftar_santri_jk)
    $('.pendaftar_santri_goldar').html(pendaftar.pendaftar_santri_goldar)
    $('.pendaftar_santri_anak_ke').html(pendaftar.pendaftar_santri_anak_ke)
    $('.pendaftar_santri_jml_sdr').html(pendaftar.pendaftar_santri_jml_sdr)
    $('.pendaftar_santri_cita').html(pendaftar.pendaftar_santri_cita)
    $('.pendaftar_santri_hobi').html(pendaftar.pendaftar_santri_hobi)
    $('.pendaftar_santri_alamat').html(pendaftar.pendaftar_santri_alamat)
    $('.kecamatan_nama').html(pendaftar.kecamatan_nama)
    $('.kabupaten_nama').html(pendaftar.kabupaten_nama)
    $('.provinsi_nama').html(pendaftar.provinsi_nama)
    $('.pendaftar_santri_tempat_lahir').html(pendaftar.pendaftar_santri_tempat_lahir)
    $('.pendaftar_santri_tgl_lahir').html(pendaftar.pendaftar_santri_tgl_lahir)
    $('.pendaftar_santri_asal_sekolah').html(pendaftar.pendaftar_santri_asal_sekolah)
    $('.pendaftar_santri_prestasi').html(pendaftar.pendaftar_santri_prestasi)
    $('.program_nama').html(pendaftar.program_nama)
    $('.pendaftar_santri_nama_ayah').html(pendaftar.pendaftar_santri_nama_ayah)
    $('.pendaftar_santri_nama_ibu').html(pendaftar.pendaftar_santri_nama_ibu)
    $('.pendaftar_santri_kerja_ayah').html(pendaftar.pendaftar_santri_kerja_ayah)
    $('.pendaftar_santri_kerja_ibu').html(pendaftar.pendaftar_santri_kerja_ibu)
    $('.pendaftar_santri_alamat_ortu').html(pendaftar.pendaftar_santri_alamat_ortu)
    $('.pendaftar_santri_penghasilan_ortu').html(pendaftar.pendaftar_santri_penghasilan_ortu)
    $('.pendaftar_santri_notelp_ortu').html(pendaftar.pendaftar_santri_notelp_ortu)
    var status = "Belum diverifikasi"
    if (pendaftar.pendaftar_santri_status == 1) {
      status = "Diterima oleh " + pendaftar.admin_nama + " pada " + toLocaleDate(pendaftar.pendaftar_santri_status_at)
    } else if (pendaftar.pendaftar_santri_status == 2) {
      status = "Ditolak oleh " + pendaftar.admin_nama + " pada " + toLocaleDate(pendaftar.pendaftar_santri_status_at)
    }
    $('.pendaftar_santri_status').html(status)
    $('.pendaftar_santri_kelas').html(pendaftar.pendaftar_santri_kelas)
    $('#detailPendaftarModal').modal()
  }

  function terima(id) {
    var conf = confirm("Yakin ingin menerima santri ini?")
    if (conf) {
      window.location.href = "<?= $_uri_terima ?? "" ?>/" + id
    }
  }

  function tolak(id) {
    var conf = confirm("Yakin ingin menolak santri ini?")
    if (conf) {
      window.location.href = "<?= $_uri_tolak  ?? "" ?>/" + id
    }
  }

  function batal(id) {
    var conf = confirm("Yakin ingin mengembalikan ke proses santri ini?")
    if (conf) {
      window.location.href = "<?= $_uri_batal ?? "" ?>/" + id
    }
  }

  $(document).ready(function() {
    tabel = $("#datatable-custom").DataTable({
      "language": {
        "buttons": {
          "pageLength": {
            "_": "Tampil %d baris <i class='fas fa-fw fa-caret-down'></i>",
            "-1": "Tampil Semua <i class='fas fa-fw fa-caret-down'></i>"
          }
        },
        "lengthMenu": "Tampil _MENU_ data per hal",
        "zeroRecords": "Data tidak ditemukan",
        "info": "Tampil halaman _PAGE_ dari _PAGES_",
        "infoEmpty": "Tidak ada data",
        "infoFiltered": "(difilter dari _MAX_ total data)"
      },
      "dom": 'Bfrtip',
      "buttons": [{
        extend: "pageLength",
        className: "btn btn-primary btn-sm"
      }, {
        text: '<i class="fas fa-fw fa-sync"></i> Segarkan',
        className: "btn btn-info btn-sm",
        action: function(e, dt, node, config) {
          data = {};
          $('#pendaftar_santri_no_daftar').val('');
          $('#pengguna_nik').val('');
          $('#pengguna_nama').val('');
          start = moment();
          end = moment();
          cb(start, end)
          dt.ajax.reload()
        }
      }],
      "searching": false,
      "processing": true,
      "serverSide": true,
      "ordering": true, // Set true agar bisa di sorting
      "order": [
        [0, 'desc'],
      ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
      'columnDefs': [{
        "targets": [6],
        "orderable": false
      }],
      "ajax": {
        "url": "<?= $_uri_datatable ?>", // URL file untuk proses select datanya
        "type": "POST",
        "data": function(d) {
          return {
            ...d,
            ...data
          }
        }
      },
      "initComplete": function(settings, json) {
        datas = json.data;
      },
      "scrollY": "<?= $_scroll_datatable ?>",
      "scrollCollapse": true,
      "lengthChange": true,
      "lengthMenu": [
        [10, 25, 50, -1],
        ['10 baris', '25 baris', '50 baris', 'Tampilkan Semua']
      ],
      "columns": [{
          "data": "pendaftar_santri_id",
        }, {
          "data": "pendaftar_santri_no_daftar",
        }, {
          "data": "pengguna_nik",
        }, {
          "data": "pengguna_nama",
        }, {
          "data": "pendaftar_santri_jk",
        }, {
          "data": "pendaftar_santri_created",
          "render": function(dt, type, row, meta) {
            return toLocaleDate(row.pendaftar_santri_created)
          }
        },
        {
          "render": function(data, type, row, meta) {
            var html = '<button type="button" class="btn btn-info btn-sm" onClick="detail(' + meta.row + ')">Detail</button>'
            if (row.pendaftar_santri_status == 0) {
              html += '<button type="button" class="btn btn-success btn-sm" onClick="terima(' + row.pendaftar_santri_id + ')">Terima</button>'
              html += '<button type="button" class="btn btn-danger btn-sm" onClick="tolak(' + row.pendaftar_santri_id + ')">Tolak</button>'
            } else {
              html += '<button type="button" class="btn btn-danger btn-sm" onClick="batal(' + row.pendaftar_santri_id + ')">Batal</button>'
            }
            return html
          }
        },
      ],
    });

    tabel.on('order.dt page.dt', function() {
      tabel.column(0, {
        order: 'applied',
        page: 'applied',
      }).nodes().each(function(cell, i) {
        cell.innerHTML = i + 1;
      });
    }).draw();
    $('#pendaftar_santri_no_daftar').on('keyup change clear', function() {
      var value = $(this).val();
      data.pendaftar_santri_no_daftar = value;
      tabel.ajax.reload(null, function(data) {
        datas = json.data
      })
    })
    $('#pengguna_nik').on('keyup change clear', function() {
      var value = $(this).val();
      data.pengguna_nik = value;
      tabel.ajax.reload(null, function(data) {
        datas = json.data
      })
    })
    $('#pengguna_nama').on('keyup change clear', function() {
      var value = $(this).val();
      data.pengguna_nama = value;
      tabel.ajax.reload(null, function(data) {
        datas = json.data
      })
    })
    moment.locale('id')
    start = moment();
    end = moment();

    function cb(start, end) {
      data.date = start.format('YYYY-MM-D') + '/' + end.format('YYYY-MM-D');
      $('.date').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'))
      tabel.ajax.reload(function(json) {
        datas = json.data
      })
    }

    $('#daterange').daterangepicker({
      showDropdowns: true,
      autoApply: false,
      startDate: start,
      endDate: end,
      locale: {
        customRangeLabel: 'Tentukan Sendiri',
        cancelLabel: 'Batal',
        applyLabel: 'Pilih',
      },
      ranges: {
        'Hari ini': [moment(), moment()],
        'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '7 Hari terakhir': [moment().subtract(6, 'days'), moment()],
        '30 Hari terakhir': [moment().subtract(29, 'days'), moment()],
        'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
        'Bulan sebelumnya': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
    }, cb);
    cb(start, end)
    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
      cb(picker.startDate, picker.endDate)
    })
  })
</script>
<?= $this->endSection('customjs') ?>