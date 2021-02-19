<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!---icon--->
  <link rel="icon" href="<?= base_url('') ?>/assets/img/logo_ds.png">

  <title>PSB Online - Pondok Pesantren Darussalam Purwokerto</title>

  <!-- Bootstrap -->
  <link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?= base_url('assets/vendor/gentelella') ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <?= $this->renderSection('customcss') ?>
  <link href="<?= base_url('assets/vendor/gentelella') ?>/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?= base_url('') ?>" class="site_title"><i class="fa fa-paw"></i> <span>PSB Online</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?= base_url('assets/') ?>/img/logo_ds.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?= $_admin->pengguna_nama ?></h2>
              <p><?= $_admin->role_nama ?></p>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">

                <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Beranda </a></li>
                <?php if ($_admin->role_id == 1) : ?>
                  <li><a href="<?= base_url('admin/pendaftaran') ?>"><i class="fa fa-edit"></i> Pendaftaran </a></li>
                <?php endif ?>
                <li><a><i class="fa fa-users"></i> Pendaftar Santri <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?= base_url('admin/pendaftar/proses') ?>">Proses Santri</a></li>
                    <li><a href="<?= base_url('admin/pendaftar/terima') ?>">Santri Diterima</a></li>
                    <li><a href="<?= base_url('admin/pendaftar/tolak') ?>">Santri Tidak Diterima</a></li>
                  </ul>
                </li>
                <li><a href="<?= base_url('admin/pendaftar/laporan') ?>"><i class="fa fa-print"></i> Laporan </a></li>
                <?php if ($_admin->role_id == 1) : ?>
                  <li><a href="<?= base_url('admin/program') ?>"><i class="fa fa-mortar-board"></i> Program </a></li>
                  <li><a href="<?= base_url('admin/soal') ?>"><i class="fa fa-edit"></i> Soal </a></li>
                  <li><a href="<?= base_url('admin/kelas') ?>"><i class="fa fa-edit"></i> Kelas </a></li>
                  <li><a><i class="fa fa-users"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('admin/pengguna/admin') ?>">Admin (Petugas)</a></li>
                      <li><a href="<?= base_url('admin/pengguna/santri') ?>">User (Santri)</a></li>
                    </ul>
                  </li>
                <?php endif ?>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?= base_url('assets/') ?>/img/logo_ds.png" alt=""><?= $_admin->pengguna_nama ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url('admin/ubah_password') ?>"> Ubah Password</a>
                  <a class="dropdown-item" href="#" onclick="logout()"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <?= $this->renderSection('content') ?>
        <!-- /top tiles -->
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          &copy;<?= date("Y") ?> Pon.Pes Darussalam Dukuhwaluh Purwokerto
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/Flot/jquery.flot.js"></script>
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/Flot/jquery.flot.time.js"></script>
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/moment/min/moment-with-locales.min.js"></script>
  <script src="<?= base_url('assets/vendor/gentelella') ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url('') ?>/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>


  <script>
    var Toast;
    $(function() {
      Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 8000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      <?php if ($_session->getFlashdata('success')) : ?>
        Toast.fire({
          icon: 'success',
          title: "<?= $_session->getFlashdata('success') ?>"
        })
      <?php endif; ?>
      <?php if ($_session->getFlashdata('error')) : ?>
        Toast.fire({
          icon: 'error',
          title: "<?= $_session->getFlashdata('error') ?>"
        })
      <?php endif; ?>
    });

    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function toLocaleDate(date, format = 'LL') {
      moment.locale('id')
      return moment(date).format(format)
    }

    function logout() {
      var conf = confirm('Yakin ingin keluar?')
      if (conf) {
        $.ajax({
            type: "GET",
            url: "<?= base_url('api/auth/logout') ?>",
          })
          .done(function(res) {
            if (res.status == 1) {
              window.location.href = res.data.url
            } else {
              window.alert(res.message)
            }
          });
      }
    }
  </script>
  <!-- Custom Theme Scripts -->
  <script src="<?= base_url('assets/vendor/gentelella') ?>/build/js/custom.min.js"></script>
  <?= $this->renderSection('customjs') ?>
</body>

</html>