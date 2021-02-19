<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $_title ?? "PSB Online - Pondok Pesantren Darussalam Dukuhwaluh Purwokerto" ?></title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('') ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="icon" href="<?= base_url('') ?>/assets/img/logo_ds.png">
  <?= $this->renderSection('customcss') ?>
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
      <div class="container">
        <a href="<?= base_url('') ?>" class="navbar-brand">
          <img src="<?= base_url() ?>/assets/img/logo_ds.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">PSB Online</span>
        </a>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <form class="form-inline ml-0 ml-md-3" action="<?= base_url('pengumuman') ?>" method="GET">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name="cari" type="search" placeholder="Masukan NIK mencari data pendaftar" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
          <?php if ($_session->isLogin != null && $_session->role_id == 3) : ?>
            <li class="nav-item">
              <a href="#" onclick="logout()" class="nav-link">Logout</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a href="#" class="nav-link loginButton" data-toggle="modal" data-target="#loginModal">Login</a>
            </li>
          <?php endif ?>

        </ul>


      </div>
    </nav>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-12">
              <ul class="nav nav-pills text-bold">

                <?php if ($_session->isLogin != null && $_session->role_id == 3) : ?>
                  <li class="nav-item">
                    <a class="nav-link <?= strpos($view, "dashboard_santri") !== false ? "active" : "" ?>" aria-current="Dashboard" href="<?= base_url('dashboard_santri') ?>">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?= strpos($view, "ubah_password") !== false ? "active" : "" ?>" aria-current="Ubah Password" href="<?= base_url('ubah_password') ?>">Ubah Password</a>
                  </li>
                <?php endif ?>
                <li class="nav-item">
                  <a class="nav-link <?= strpos($view, "syarat") !== false ? "active" : "" ?>" href="<?= base_url('syarat') ?>">Persyaratan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= strpos($view, "terdaftar") !== false ? "active" : "" ?>" href="<?= base_url('terdaftar') ?>">Pendaftar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= strpos($view, "pengumuman") !== false ? "active" : "" ?>" href="<?= base_url('pengumuman') ?>">Pengumuman</a>
                </li>

              </ul>

            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div class="content">
        <div class="container">
          <div class="col-lg-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <?= $this->renderSection('content') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">

      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2021 PPDS | All rights reserved.
    </footer>
  </div>
  <?= $this->renderSection('modal') ?>
  <!-- jQuery -->
  <script src="<?= base_url('') ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('') ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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

    <?php if (isset($_session->isLogin)) : ?>

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
    <?php endif ?>
    $(document).ready(function() {
      $('#registerForm').submit(function(e) {
        e.preventDefault()
        var nik = $('#nik').val()
        var nama = $('#nama').val()
        var email = $('#email').val()
        var password = $('#passworddaftar').val()
        $.ajax({
            type: "POST",
            url: "<?= base_url('api/auth/daftar') ?>",
            data: {
              nik,
              nama,
              email,
              password,
            },
          })
          .done(function(res) {
            if (res.status == 1) {
              window.alert(res.message)
              $('#daftarModal .close').click()
              $('.loginButton').click()
            } else {
              window.alert(res.message)
            }
          });
        return;
      })
      $('#loginForm').submit(function(e) {
        var username = $('#username').val()
        var password = $('#password').val()
        e.preventDefault()
        $.ajax({
            type: "POST",
            url: "<?= base_url('api/auth/login') ?>",
            data: {
              username,
              password
            },
          })
          .done(function(res) {
            if (res.status == 1) {
              window.location.href = res.data.url
            } else {
              window.alert(res.message)
            }
          });
        return;
      })

    })
  </script>
  <?= $this->renderSection('customjs') ?>
</body>

</html>