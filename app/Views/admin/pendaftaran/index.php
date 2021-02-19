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
      <h3>Pendaftaran <span class="text-secondary" style="font-size:0.6em">Pon.Pes Darussalam Dukuhwaluh Purwokerto</span></h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tambah Waktu <small> Pendaftaran</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="container">
            <div class="row">
              <form action="" method="post">
                <div class='form-group col-sm-3'>
                  Periode Pendaftaran
                  <input type='text' name="pendaftaran_periode" placeholder="Periode Pendaftaran" class="form-control form-contorl-sm <?= ($_validation->hasError('pendaftaran_periode') ? "is-invalid" : "") ?>" value="<?= old('pendaftaran_periode') ?>" />
                  <div class="invalid-feedback">
                    <?= $_validation->getError('pendaftaran_periode') ?>
                  </div>
                </div>
                <div class='form-group col-sm-3'>
                  Batas Awal Waktu Pendaftaran
                  <input type='date' name="pendaftaran_tgl_mulai" placeholder="Waktu Awal Pendaftaran" class="form-control form-contorl-sm <?= ($_validation->hasError('pendaftaran_tgl_mulai') ? "is-invalid" : "") ?>" value="<?= old('pendaftaran_tgl_mulai') ?>" />
                  <div class="invalid-feedback">
                    <?= $_validation->getError('pendaftaran_tgl_mulai') ?>
                  </div>
                </div>
                <div class='form-group col-sm-3'>
                  Batas Akhir Waktu Pendaftaran
                  <input type='date' name="pendaftaran_tgl_selesai" placeholder="Waktu Akhir Pendaftaran" class="form-control form-contorl-sm <?= ($_validation->hasError('pendaftaran_tgl_selesai') ? "is-invalid" : "") ?>" value="<?= old('pendaftaran_tgl_selesai') ?>" />
                  <div class="invalid-feedback">
                    <?= $_validation->getError('pendaftaran_tgl_selesai') ?>
                  </div>
                </div>
                <div class='form-group col-sm-3'>
                  Kuota Maksimal
                  <input type='number' name="pendaftaran_kuota" placeholder="Masukan Jumlah Maksimal Kuota" class="form-control form-contorl-sm <?= ($_validation->hasError('pendaftaran_kuota') ? "is-invalid" : "") ?>" value="<?= old('pendaftaran_kuota') ?>" />
                  <div class="invalid-feedback">
                    <?= $_validation->getError('pendaftaran_kuota') ?>
                  </div>
                </div>
                <div class="col-sm-12">
                  <center><button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                  </center>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Jadwal Pendaftaran<small>PPDB</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <h5>Filter</h5>
          <div class="form-group row">
            <div class="col-md-4 mb-1"><input class="form-control form-control-sm" type="text" id="pendaftaran_periode" placeholder="Periode" /></div>
            <div class="col-md-4 mb-1"><input class="form-control form-control-sm" type="date" id="pendaftaran_tgl_mulai" placeholder="Batas Awal" /></div>
            <div class="col-md-4 mb-1"><input class="form-control form-control-sm" type="date" id="pendaftaran_tgl_selesai" placeholder="Batas Akhir" /></div>
            <div class="col-md-4">
              <select class="form-control form-control-sm" id="pendaftaran_status">
                <option value="">--Pilih Status--</option>
                <?php
                $no = 0;
                foreach (['tidak aktif', 'aktif'] as $status) : ?>
                  <option value="<?= $no ?>"><?= $status ?></option>
                <?php
                  $no++;
                endforeach; ?>
              </select>
            </div>
          </div>
          <table id="datatable-custom" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Periode</th>
                <th>Batas Awal</th>
                <th>Batas Akhir</th>
                <th>Kuota</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Periode</th>
                <th>Batas Awal</th>
                <th>Batas Akhir</th>
                <th>Kuota</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
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

  function aktifkan(id) {
    var conf = confirm("Yakin ingin mengaktifkan pendaftaran ini?")
    if (conf) {
      window.location.href = "<?= $_uri_aktifkan ?>/" + id
    }
  }

  function matikan(id) {
    var conf = confirm("Yakin ingin mematikan pendaftaran ini?")
    if (conf) {
      window.location.href = "<?= $_uri_matikan ?>/" + id
    }
  }

  function hapus(id) {
    var conf = confirm("Yakin ingin menghapus pendaftaran ini?")
    if (conf) {
      window.location.href = "<?= $_uri_hapus ?>/" + id
    }
  }

  function edit(id) {
    window.location.href = "<?= $_uri_edit ?>/" + id
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
          $('#pendaftaran_periode').val('');
          $('#pendaftaran_tgl_mulai').val('');
          $('#pendaftaran_tgl_selesai').val('');
          $('#pendaftaran_status').val('');
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
          "data": "pendaftaran_id",
        }, {
          "data": "pendaftaran_periode",
        }, {
          "data": "pendaftaran_tgl_mulai",
          "render": function(data, type, row, meta) {
            return toLocaleDate(row.pendaftaran_tgl_mulai)
          }
        }, {
          "data": "pendaftaran_tgl_selesai",
          "render": function(data, type, row, meta) {
            return toLocaleDate(row.pendaftaran_tgl_selesai)
          }
        }, {
          "data": "pendaftaran_kuota",
        }, {
          "data": "pendaftaran_status",
          "render": function(data, type, row, meta) {
            var status = "Tidak berlangsung"
            if (row.pendaftaran_status == 1) {
              status = "Pendaftaran sedang berlangsung"
            }
            return status;
          }
        },
        {
          "render": function(data, type, row, meta) {
            var html = ''
            var varDate = new Date(row.pendaftaran_tgl_mulai); //dd-mm-YYYY
            var today = new Date();
            today.setHours(0, 0, 0, 0);
            if (row.pendaftaran_status == 0) {
              html += '<button type="button" class="btn btn-success btn-sm" onClick="aktifkan(' + row.pendaftaran_id + ')">Aktifkan</button>'
            } else if (row.pendaftaran_status == 1) {
              html += '<button type="button" class="btn btn-success btn-sm" onClick="matikan(' + row.pendaftaran_id + ')">Matikan</button>'
            }
            html += '<button type="button" class="btn btn-info btn-sm" onClick="edit(' + row.pendaftaran_id + ')">Edit</button>'
            html += '<button type="button" class="btn btn-danger btn-sm" onClick="hapus(' + row.pendaftaran_id + ')">Hapus</button>'
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
    $('#pendaftaran_periode').on('keyup change clear', function() {
      var value = $(this).val();
      data.pendaftaran_periode = value;
      tabel.ajax.reload(null, function(data) {
        datas = json.data
      })
    })
    $('#pendaftaran_tgl_mulai').on('keyup change clear', function() {
      var value = $(this).val();
      data.pendaftaran_tgl_mulai = value;
      tabel.ajax.reload(null, function(data) {
        datas = json.data
      })
    })
    $('#pendaftaran_tgl_selesai').on('keyup change clear', function() {
      var value = $(this).val();
      data.pendaftaran_tgl_selesai = value;
      tabel.ajax.reload(null, function(data) {
        datas = json.data
      })
    })
    $('#pendaftaran_status').on('change clear', function() {
      var value = $(this).val();
      data.pendaftaran_status = value;
      tabel.ajax.reload(null, function(data) {
        datas = json.data
      })
    })
  })
</script>
<?= $this->endSection('customjs') ?>