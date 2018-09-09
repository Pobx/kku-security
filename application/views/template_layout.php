<?php
$sess_userprofile = $this->session->userdata();
if (!isset($sess_userprofile['logged']) || $sess_userprofile['logged'] == false)
{
    redirect('authen');
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ระบบ ร.ป.ภ มหาวิทยาลัยขอนแก่น</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('bower_components/font-awesome/css/font-awesome.min.css'); ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('bower_components/Ionicons/css/ionicons.min.css'); ?>">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="<?php echo base_url('plugins/iCheck/all.css'); ?>">
	<!-- bootstrap datepicker-thai -->
	<link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap-datepicker-thai/css/datepicker.css'); ?>">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url('bower_components/select2/dist/css/select2.min.css'); ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('dist/css/AdminLTE.min.css'); ?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url('dist/css/skins/_all-skins.min.css'); ?>">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?php echo base_url('bower_components/morris.js/morris.css'); ?>">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url('bower_components/jvectormap/jquery-jvectormap.css'); ?>">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

	<!-- jQuery 3 -->
	<script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js'); ?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>

	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="#" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>ร.ป.ภ</b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>ระบบ ร.ป.ภ มข</b></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">

						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url('dist/img/avatar04.png'); ?>" class="user-image" alt="User Image">
								<span class="hidden-xs">
									<?php echo $sess_userprofile['name']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url('dist/img/avatar04.png'); ?>" class="img-circle" alt="User Image">

									<p>
										<?php echo $sess_userprofile['name']; ?>
										<!-- <small>Member since Nov. 2012</small> -->
									</p>
								</li>
								<!-- Menu Body -->
								<li class="user-body">

								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-right">
										<a href="<?php echo site_url('authen/logout'); ?>" class="btn btn-default btn-flat">ออกจากระบบ</a>
									</div>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url('dist/img/avatar04.png'); ?>" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>Steve Jobs</p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>

				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<?php
if ($sess_userprofile['permission'] != 'security')
{
    $this->load->view('sidebar_admin');
}
?>

					<li>
						<a href="<?php echo site_url('authen/logout'); ?>"><i class="fa fa-sign-out"></i> <span class="text-red">ออกจากระบบ</span></a>
					</li>
				</ul>
			</section>


		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?php
$head_topic_label = (isset($head_topic_label) ? $head_topic_label : '');
echo $head_topic_label;
?>
					<small>
						<?php
$head_sub_topic_label = (isset($head_sub_topic_label) ? $head_sub_topic_label : '');
echo $head_sub_topic_label;
?>
					</small>
				</h1>

				<!-- <ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol> -->
			</section>

			<!-- Main content -->
			<section class="content">
				<?php if ($this->session->flashdata('alert_type') != '')
{
    ?>
				<div class="alert alert-<?php echo $this->session->flashdata('alert_type'); ?> alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-<?php echo $this->session->flashdata('alert_icon'); ?>"></i> ระบบแจ้งเตือน</h4>
					<?php echo $this->session->flashdata('alert_message'); ?>
				</div>
				<?php }?>

				<?php
        $bar_chart_data = (isset($bar_chart_data)? $bar_chart_data : json_encode(array()));
if (isset($content))
{
    $this->load->view($content);
}
else
{
    $this->load->view('blank_page');
}
?>
			</section>

		</div>

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1
			</div>
			<!-- <strong>Copyright &copy; 2018 <a href="#">Itechs Development Team</a>.</strong> All rights -->
			<!-- <strong>ระบบ ร.ป.ภ มหาวิทยาลัยขอนแก่น.</strong> -->
			<strong>
				<?php
$now_date = date('d/m') . '/' . (date('Y') + 543) . ' ' . date('H:i:s');
echo 'ขณะนี้เวลา  ' . $now_date;
?>
			</strong>
		</footer>

		<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);

	</script>

	<!-- Morris.js charts -->
	<script src="<?php //echo base_url('bower_components/raphael/raphael.min.js'); ?>"></script>
	<script src="<?php //echo base_url('bower_components/morris.js/morris.min.js'); ?>"></script>
	<!-- Sparkline -->
	<script src="<?php //echo base_url('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
	<!-- jvectormap -->
	<script src="<?php //echo base_url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
	<script src="<?php //echo base_url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php //echo base_url('bower_components/jquery-knob/dist/jquery.knob.min.js'); ?>"></script>
	<!-- daterangepicker -->
	<script src="<?php //echo base_url('bower_components/moment/min/moment.min.js'); ?>"></script>
	<script src="<?php //echo base_url('bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
	<!-- datepicker -->
	<script src="<?php echo base_url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php //echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
	<!-- Slimscroll -->
	<script src="<?php //echo base_url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
	<!-- FastClick -->
	<script src="<?php //echo base_url('bower_components/fastclick/lib/fastclick.js'); ?>"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url('bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

	<!-- iCheck 1.0.1 -->
	<script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>

	<!-- InputMask -->
	<script src="<?php echo base_url('plugins/input-mask/jquery.inputmask.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>

	<!-- bootstrap datepicker -->
	<script src="<?php //echo base_url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
	<!-- ChartJS -->
	<script src="<?php echo base_url('bower_components/chart.js/Chart.js'); ?>"></script>

	<!-- bootstrap datepicker-thai -->
	<script src="<?php echo base_url('plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js'); ?>"></script>

	<!-- Select2 -->
	<script src="<?php echo base_url('bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>

	<!-- my demo -->
	<!-- <script src="<?php //echo base_url('assets/demo/dashboard_admin_donut_chart.js'); ?>"></script> -->
	<script src="<?php echo base_url('assets/demo/dashboard_admin_bar_chart_monthly.js'); ?>"></script>

	<!-- AdminLTE App -->
	<script src="<?php echo base_url('dist/js/adminlte.min.js'); ?>"></script>
	<script>
		$(function () {
			var bar_chart_data = '<?php echo $bar_chart_data;?>';

			bar_chart_data = JSON.parse(bar_chart_data);
			// console.log(bar_chart_data)
			if (bar_chart_data.length > 0) {
				bar_chart_monthly(bar_chart_data);
			}

			// $('.mydataTable tfoot th').each(function () {
			// 	var title = $(this).text();
			// 	$(this).append('<br /><input type="text" class="form-control" placeholder="ค้นหา... ' + title + '" />');
			// });

			$('.mydataTable').DataTable({
				"language": {
					"emptyTable": "ไม่พบรายการ",
					"lengthMenu": "แสดง _MENU_ จำนวน",
					"info": "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ จำนวน",
					"infoEmpty": "รายการ 0 ถึง 0 จาก 0 รายการ",
					"thousands": ",",
					"loadingRecords": "กำลังโหลดข้อมูล...",
					"processing": "กำลังดำเนินการ...",
					"search": "ค้นหา:",
					"zeroRecords": "ไม่พบรายการ",
					"paginate": {
						"first": "หน้าแรก",
						"last": "สุดท้าย",
						"next": "ต่อไป",
						"previous": "ย้อนกลับ"
					}
				}
			})
			// .columns().every(function () {
			// 	var that = this;

			// 	$('input', this.footer()).on('keyup change', function () {
			// 		if (that.search() !== this.value) {
			// 			that
			// 				.search(this.value)
			// 				.draw();
			// 		}
			// 	});
			// });

			$(".form_submit_data").submit(function () {
				if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่ ?') == true) {
					return true;
				}
				return false;
			});

			//Flat red color scheme for iCheck
			$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-blue',
				radioClass: 'iradio_flat-blue'
			});

			//Date picker
			$('.datepicker').datepicker({
				autoclose: true
			});

			// Input mask
			$('[data-mask]').inputmask();

			//Initialize Select2 Elements
			$('.select2').select2()
		});

		function removeItem(id, url, flag = '') {
			console.log(id);
			console.log(url);
			console.log('remove url => ' + url + '/' + id);
			if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?') == true) {
				window.location.href = url + '/' + id + '/' + flag;
			}
		}

	</script>
</body>

</html>
