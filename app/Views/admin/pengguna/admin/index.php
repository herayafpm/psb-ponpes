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
      <h3>Admin <span class="text-secondary" style="font-size:0.6em">Pon.Pes Darussalam Dukuhwaluh Purwokerto</span></h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <h5>Filter</h5>
          <div class="form-group row">
            <div class="col-md-4 mb-1"><input class="form-control form-control-sm" type="text" id="pengguna_nik" placeholder="Username" /></div>
            <div class="col-md-4 mb-1"><input class="form-control form-control-sm" type="text" id="pengguna_nama" placeholder="Nama" /></div>
            <div class="col-md-4 mb-1"><input class="form-control form-control-sm" type="text" id="pengguna_email" placeholder="Email" /></div>
            <div class="col-md-4">
              <div id="daterange" class="form-control form-control-sm"><span class="date">Pilih Tanggal</span> <i class="fa fa-fw fa-calendar"></i>&nbsp;<span></span> <i class="fa fa-caret-down"></i></div>
            </div>
          </div>
          <table id="datatable-custom" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Dibuat</th>
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
  var date = "";
  var start;
  var end;

  function hapus(id) {
    var conf = confirm("Yakin ingin menghapus pendaftar ini?")
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
        text: '<i class="fas fa-fw fa-plus"></i> Tambah',
        className: "btn btn-success btn-sm",
        action: function(e, dt, node, config) {
          window.location.href = "<?= $_uri_tambah ?>"
        }
      }, {
        text: '<i class="fas fa-fw fa-sync"></i> Segarkan',
        className: "btn btn-info btn-sm",
        action: function(e, dt, node, config) {
          data = {};
          $('#pengguna_nik').val('');
          $('#pengguna_nama').val('');
          $('#pengguna_email').val('');
          $('.date').html('Pilih Tanggal');
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
        "targets": [5],
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
          "data": "pengguna_id",
        }, {
          "data": "pengguna_nik",
        }, {
          "data": "pengguna_nama",
        }, {
          "data": "pengguna_email",
        },
        {
          "data": "pengguna_created",
          "render": function(data, type, row, meta) {
            return toLocaleDate(row.pengguna_created)
          }
        },
        {
          "render": function(data, type, row, meta) {
            var html = '<button type="button" class="btn btn-info btn-sm" onClick="edit(' + row.pengguna_id + ')">Edit</button>'
            html += '<button type="button" class="btn btn-danger btn-sm" onClick="hapus(' + row.pengguna_id + ')">Hapus</button>'
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
    $('#pengguna_email').on('keyup change clear', function() {
      var value = $(this).val();
      data.pengguna_email = value;
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