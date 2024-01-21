<?php
    //Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"])==""){
	header("location: login");
	
}else{
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

    //KONEKSI DB
include "inc/koneksi.php";
    //FUNGSI RUPIAH
include "inc/rupiah.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Masjid At-Taqwa</title>
	<link rel="icon" href="dist/img/mushola.jpg">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-default navbar-dark">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars"></i>
					</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="http://localhost/kas_masjid/" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="?page=rekap_km" class="nav-link">Rekap Kas Masjid</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="?page=rekap_ks" class="nav-link">Rekap Kas Sosial</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="?page=rekap_full" class="nav-link">Rekap Kas Keseluruhan</a>
				</li>
			</ul>


			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt text-danger"> Logout</i>
					</a>
				</li>
			</ul>
		<!-- /.navbar -->
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="http://localhost/kas_masjid/" class="brand-link">
				<img src="dist/img/mushola.jpg" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text font-weight-light">At-Taqwa</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="http://localhost/kas_masjid/" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level=="Administrator"){
							?>
							<li class="nav-item">
								<a href="http://localhost/kas_masjid/" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
										
									</p>
								</a>
							</li>
							
							<li class="nav-item">
										<a href="?page=MyApp/data_donatur" class="nav-link">
											<i class="nav-icon far fa-user"></i>
											<p>Data Donatur</p>
										</a>
									</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-mosque"></i>
									<p>
										Kas Masjid
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=i_data_km" class="nav-link">
										<i class="nav-icon fas fa-arrow-up text-success"></i>
											<p>Pemasukan Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=o_data_km" class="nav-link">
										<i class="nav-icon fas fa-arrow-down text-danger"></i>
											<p>Pengeluaran Kas Masjid</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>
										Kas Sosial
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=i_data_ks" class="nav-link">
										<i class="nav-icon fas fa-arrow-up text-success"></i>
											<p>Pemasukan Kas Sosial</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=o_data_ks" class="nav-link">
										<i class="nav-icon fas fa-arrow-down text-danger"></i>
											<p>Pengeluaran Kas Sosial</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Laporan Kas
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=lap_masjid" class="nav-link">
											<i class="nav-icon fas fa-chart-bar text-warning"></i>
											<p>Laporan Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=lap_sosial" class="nav-link">
											<i class="nav-icon fas fa-chart-bar text-info"></i>
											<p>Laporan Kas Sosial</p>
										</a>
									</li>
								</ul>
							</li>


							<li class="nav-header">Settings</li>
							<li class="nav-item">
								<a href="?page=MyApp/data_pengguna" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Users
										<span class="badge badge-warning right">2 Level</span>
									</p>
								</a>
							</li>

							<?php
						} elseif($data_level=="Pimpinan"){
							?>
							<li class="nav-item">
								<a href="http://localhost/kas_masjid/" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
										
									</p>
								</a>
							</li>
							
							
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-mosque"></i>
									<p>
										Kas Masjid
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=rekap_km" class="nav-link">
										<i class="nav-icon fas fa-clipboard text-primary"></i>
											<p>Rekap Kas Masjid</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>
										Kas Sosial
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=rekap_ks" class="nav-link">
											<i class="nav-icon far fa-clipboard text-primary"></i>
											<p>Rekap Kas Sosial</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Laporan Kas
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=lap_masjid" class="nav-link">
											<i class="nav-icon fas fa-chart-bar text-warning"></i>
											<p>Laporan Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=lap_sosial" class="nav-link">
											<i class="nav-icon fas fa-chart-bar text-info"></i>
											<p>Laporan Kas Sosial</p>
										</a>
									</li>
								</ul>
							</li>
						<?php
					}
					?>

					

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php 
					if(isset($_GET['page'])){
						$hal = $_GET['page'];
						
						switch ($hal) {
              //Klik Halaman Home Pengguna
							case 'MyApp/admin':
							include "home/admin.php";
							break;
							case 'bendahara':
							include "home/bendahara.php";
							break;

              //Pengguna
							case 'MyApp/data_pengguna':
							include "admin/pengguna/data_pengguna.php";
							break;
							case 'MyApp/add_pengguna':
							include "admin/pengguna/add_pengguna.php";
							break;
							case 'MyApp/edit_pengguna':
							include "admin/pengguna/edit_pengguna.php";
							break;
							case 'MyApp/del_pengguna':
							include "admin/pengguna/del_pengguna.php";
							break;

			  //Donatur
							case 'MyApp/data_donatur':
							include "donatur/data_donatur.php";
							break;
							case 'MyApp/add_donatur':
							include "donatur/add_donatur.php";
							break;
							case 'MyApp/edit_donatur':
							include "donatur/edit_donatur.php";
							break;
							case 'MyApp/del_donatur':
							include "donatur/del_donatur.php";
							break;

              //Masjid in
							case 'i_data_km':
							include "bendahara/masjid/in/data_kas.php";
							break;
							case 'i_add_km':
							include "bendahara/masjid/in/add_kas.php";
							break;
							case 'i_edit_km':
							include "bendahara/masjid/in/edit_kas.php";
							break;
							case 'i_del_km':
							include "bendahara/masjid/in/del_kas.php";
							break;
							case 'i_kwitansi_km':
							include "bendahara/masjid/in/kwitansi.php";
							break;
							case 'i_cetak_km':
							include "bendahara/masjid/in/print_kwitansi_km.php";
							break;

              //Masjid out
							case 'o_data_km':
							include "bendahara/masjid/out/data_kas.php";
							break;
							case 'o_add_km':
							include "bendahara/masjid/out/add_kas.php";
							break;
							case 'o_edit_km':
							include "bendahara/masjid/out/edit_kas.php";
							break;
							case 'o_del_km':
							include "bendahara/masjid/out/del_kas.php";
							break;

							case 'rekap_km':
							include "bendahara/masjid/rekap_kas.php";
							break;

              //sos in
							case 'i_data_ks':
							include "bendahara/sosial/in/data_kas.php";
							break;
							case 'i_add_ks':
							include "bendahara/sosial/in/add_kas.php";
							break;
							case 'i_edit_ks':
							include "bendahara/sosial/in/edit_kas.php";
							break;
							case 'i_del_ks':
							include "bendahara/sosial/in/del_kas.php";
							break;
							case 'i_cetak_ks':
								include "bendahara/sosial/in/print_kwitansi_ks.php";
								break;

              //sos out
							case 'o_data_ks':
							include "bendahara/sosial/out/data_kas.php";
							break;
							case 'o_add_ks':
							include "bendahara/sosial/out/add_kas.php";
							break;
							case 'o_edit_ks':
							include "bendahara/sosial/out/edit_kas.php";
							break;
							case 'o_del_ks':
							include "bendahara/sosial/out/del_kas.php";
							break;

							case 'rekap_ks':
							include "bendahara/sosial/rekap_kas.php";
							break;

              //lap kas mas
							case 'lap_masjid':
							include "bendahara/laporan/lap_mas.php";
							break;
							case 'lap_sosial':
							include "bendahara/laporan/lap_sos.php";
							break;

			 //rekap full
							case 'rekap_full':
							include "bendahara/laporan/rekap_full.php";
							break;
								
              //default
							default:
							echo "<center><h1> ERROR !</h1></center>";
							break;    
						}
					}else{
        // Auto Halaman Home Pengguna
						if($data_level=="Administrator"){
							include "home/admin.php";
						}
						elseif($data_level=="Pimpinan"){
							include "home/bendahara.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Masjid At-Taqwa Desa Mojo
			</div>
			Copyright &copy;
			<a>
				<strong>Hendri Setiabudi</strong>
			</a>
			All rights reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>