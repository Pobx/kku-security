
<!-- <div class="row">
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>356</h3>

				<p>เหตุการณ์</p>
			</div>
			<div class="icon">
				<i class="fa fa-exclamation-triangle"></i>
			</div>
			<a href="#" class="small-box-footer">&nbsp;</a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-red">
			<div class="inner">
				<h3>25</h3>

				<p>สถิติอุบัติเหตุ</p>
			</div>
			<div class="icon">
				<i class="fa fa-motorcycle"></i>
			</div>
			<a href="#" class="small-box-footer">&nbsp;</a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>34</h3>

				<p>บาดเจ็บ</p>
			</div>
			<div class="icon">
				<i class="fa fa-wheelchair"></i>
			</div>
			<a href="#" class="small-box-footer">&nbsp;</a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-red">
			<div class="inner">
				<h3>2</h3>

				<p>เสียชีวิต</p>
			</div>
			<div class="icon">
				<i class="fa fa-user-times"></i>
			</div>
			<a href="#" class="small-box-footer">&nbsp;</a>
		</div>
	</div>
</div> -->

<div class="row">
	<div class="col-md-12">
		<?php $this->load->view('dashboard_admin_donut_chart');?>
	</div>
	<div class="col-md-12">
		<?php $this->load->view('dashboard_admin_boxes');?>
	</div>
	
</div>

<div class="row">
	<div class="col-md-6">
		<!-- <php $this->load->view('dashboard_admin_table_accidents_panel');?> -->
	</div>
	<!-- <div class="col-md-6">
		<php $this->load->view('dashboard_admin_top_faculty_panel');?>
	</div> -->
</div>

<div class="row">
	<div class="col-md-6">
		<?php //$this->load->view('dashboard_admin_table_dead_of_year_panel');?>
	</div>
	<div class="col-md-6">
		<?php //$this->load->view('dashboard_admin_bar_chart_monthly');?>
	</div>
</div>
