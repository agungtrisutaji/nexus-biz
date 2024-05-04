<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $title ?? config('app.name') }}</title>

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
		<!-- Tempusdominus Bootstrap 4 -->
		<link rel="stylesheet"
			href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
		<!-- iCheck -->
		<link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
		<!-- JQVMap -->
		<link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
		<!-- summernote -->
		<link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">
	</head>

	<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed text-sm">
		<div class="wrapper">
			<!-- Navbar -->
			<x-navigation-menu />
			<!-- /.navbar -->

			<!-- Sidebar -->
			<x-sidebar />

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>NexusBizMaster</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item"><a href="#">Layout</a></li>
									<li class="breadcrumb-item active">{{ $title ?? config('app.name') }}</li>
								</ol>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<!-- Default box -->
								<div class="error-page">
									<h2 class="headline text-warning"> 404</h2>

									<div class="error-content">
										<h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

										<p>
											We could not find the page you were looking for.
											Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
										</p>

										<form class="search-form">
											<div class="input-group">
												<input type="text" name="search" class="form-control" placeholder="Search">

												<div class="input-group-append">
													<button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
													</button>
												</div>
											</div>
											<!-- /.input-group -->
										</form>
									</div>
									<!-- /.error-content -->
								</div>
								<!-- /.error-page -->
								<!-- /.card -->
							</div>
						</div>
					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark" aria-label="Control sidebar">
				<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->
		</div>
		<!-- /.content-wrapper -->
		</div>

		<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button)
		</script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- ChartJS -->
		<script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
		<!-- Sparkline -->
		<script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
		<!-- JQVMap -->
		<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
		<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
		<!-- jQuery Knob Chart -->
		<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
		<!-- daterangepicker -->
		<script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
		<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
		<!-- Summernote -->
		<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
		<!-- overlayScrollbars -->
		<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
		<!-- NexusBizMaster App -->
		<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
		<!-- NexusBizMaster dashboard demo (This is only for demo purposes) -->
		<script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>
		<!-- NexusBizMaster for demo purposes -->
		<script src="{{ asset('lte/dist/js/demo.js') }}"></script>

</html>
