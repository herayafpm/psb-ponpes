<?= $this->extend('template') ?>
<?= $this->section('customcss') ?>
<style type="text/css">
	.count_down {
		padding: 5px;
		font-size: 50px;
		font-weight: bold;
		color: #222;
	}

	.count_down div {
		width: 75px;
		height: 50px;
		display: inline-block;
	}

	.count_down span {
		color: rgba(0, 0, 0, .8);
	}

	.count_down sup {
		color: rgba(0, 0, 0, .8);
		font-size: 20px;
	}
</style>
<?= $this->endSection('customcss') ?>
<?= $this->section('content') ?>
<center>
	<h3>PONDOK PESANTREN DARUSSALAM DUKUHWALUH PURWOKERTO </h3>
	<p style="font-size: 20px">Selamat Datang di Website Penerimaan Santri Baru Online</p>
	<?php if ($_pendaftaran != null && $todays_date >= $start_date && $todays_date <= $end_date && $kuota > 0) : ?>
		<button type="submit" class="btn btn-primary mb-4" a href="#" data-toggle="modal" data-target="#daftarModal"> <i class="fa fa-edit" aria-hidden="true"></i> Daftar Sekarang</button>
	<?php elseif ($_pendaftaran != null && $kuota > 0) : ?>
		<h2><span class="badge badge-info">Kuota Sudah Terpenuhi</span></h2>
	<?php endif ?>
	<h3>Jadwal Pendaftaran PSB Online Pondok Pesantren Darussalam Dukuhwaluh Purwokerto</h3>
	<hr>
	<div class="about-sub-gd">
		<?php
		if ($_pendaftaran != null && $todays_date >= $start_date && $todays_date <= $end_date && $kuota > 0) : ?>
			<h1>Sisa waktu pendaftaran</h1><br>
			<h4 style="color: #000">Pendaftaran dibuka mulai <?= indonesian_date($start_date); ?> s/d <?= indonesian_date($end_date); ?></h4>
			<div align="center" class="col-md-12">
				<div id="count-down-container"></div>
			</div>
		<?php elseif ($_pendaftaran != null && $todays_date < $start_date) : ?>
			<h2><span class="label label-primary">Pendaftaran Belum dibuka</span></h2>
		<?php else : ?>
			<h2><span class="badge badge-info">Pendaftaran Sudah Ditutup</span></h2>
		<?php endif; ?>
	</div>
	<?php
	if ($_pendaftaran != null && $todays_date >= $start_date && $todays_date <= $end_date) : ?>
		<div class="banner_bottom_in">
			<h1>Jumlah Pendaftar saat ini : </h1>
			<hr>
			<div class="col-md-8">
				<h3>Jumlah Pendaftar</h3>
				<h1 style="color: red"><?= $jml; ?></h1>
			</div>
			<div class="col-md-4" style="text-align: left;">
				<h2><?= $jmlcowo; ?> <small>Laki - laki</small></h2>
				<h2><?= $jmlcewe; ?> <small>Perempuan</small></h2>
			</div><br><br>

		</div>
	<?php endif ?>
</center>
<?= $this->endSection('content') ?>
<?= $this->section('modal') ?>
<?= view('modals/login_modal'); ?>
<?= view('modals/daftar_modal'); ?>
<?= $this->endSection('modal') ?>
<?= $this->section('customjs') ?>
<script type="text/javascript" src="<?= base_url('') ?>/assets/js/count/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?= base_url('') ?>/assets/js/count/js/countdown.js"></script>
<script type="text/javascript" src="<?= base_url('') ?>/assets/js/count/js/script.js"></script>
<script>
	$(document).ready(function() {
		<?php
		if ($_pendaftaran != null && $todays_date >= $start_date && $todays_date <= $end_date) :
		?>
			var currentyear = new Date().getFullYear()
			var target_date = new cdtime("count-down-container", "<?= $end_date; ?>", function(time) {
				console.log(time)
			})
			target_date.displaycountdown("days", displayCountDown)
		<?php endif ?>
	})
</script>
<?= $this->endSection('customjs') ?>