<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>150</h3>

				<p>New Orders</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>53<sup style="font-size: 20px">%</sup></h3>

				<p>Bounce Rate</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>44</h3>

				<p>User Registrations</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>65</h3>

				<p>Unique Visitors</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
</div>

<div class="row">
	<div class="col-md-6">
		<?php $this->load->view('dashboard_admin_boxes');?>
	</div>
	<div class="col-md-6">
		<?php $this->load->view('dashboard_admin_donut_chart');?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<?php $this->load->view('dashboard_admin_table_accidents_panel');?>
	</div>
	<div class="col-md-6">
		<?php $this->load->view('dashboard_admin_top_faculty_panel');?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<?php $this->load->view('dashboard_admin_table_dead_of_year_panel');?>
	</div>
	<div class="col-md-6">
		<?php $this->load->view('dashboard_admin_bar_chart_monthly');?>
	</div>
</div>
