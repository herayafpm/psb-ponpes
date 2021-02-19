<?= $this->extend('template') ?>
<?= $this->section('customcss') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('') ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<!-- /.card-header -->
<h3 class="headerw3">Pendaftar</h3>
<hr>
<table id="datatable-custom" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>NIK</th>
      <th>Nama Lengkap</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <tfoot>
    <tr>
      <th>No</th>
      <th>NIK</th>
      <th>Nama Lengkap</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
    </tr>
  </tfoot>
</table>
<?= $this->endSection('content') ?>
<?= $this->section('modal') ?>
<?= view('modals/login_modal'); ?>
<?= $this->endSection('modal') ?>
<?= $this->section('customjs') ?>
<!-- DataTables -->
<script src="<?= base_url('') ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('') ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('') ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  var tabel = null;
  var datas = [];
  var id = null;
  var data = {};
  $(document).ready(function() {
    tabel = $('#datatable-custom').DataTable({
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
      "processing": true,
      "serverSide": true,
      "ordering": true, // Set true agar bisa di sorting
      "order": [
        [0, 'desc'],
      ],
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
        [10, 25, 50],
        ['10 baris', '25 baris', '50 baris']
      ],
      "columns": [{
        "data": "pendaftar_santri_id",
      }, {
        "data": "pengguna_nik",
      }, {
        "data": "pengguna_nama",
      }, {
        "data": "pendaftar_santri_jk",
      }, {
        "data": "pendaftar_santri_alamat",
      }, ],
    })
    tabel.on('order.dt page.dt', function() {
      tabel.column(0, {
        order: 'applied',
        page: 'applied',
      }).nodes().each(function(cell, i) {
        cell.innerHTML = i + 1;
      });
    }).draw();
  })
</script>
<?= $this->endSection('customjs') ?>