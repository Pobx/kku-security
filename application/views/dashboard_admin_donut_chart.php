<div class="box box-primary">
	<div class="row">
		<div class="col-md-6">
			<div class="box-header with-border">
				<h3 class="box-title">สรุปสถานะเหตุการณ์ประจำปี
					<?php echo (date('Y') + 543);?>
				</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
				</div>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-8">
						<div class="chart-responsive">
							<canvas id="pieChart" height="250"></canvas>
						</div>
					</div>
					<div class="col-md-4">
						<ul class="chart-legend clearfix">
							<li><i class="fa fa-circle-o text-red"></i> สถิติอุบัติเหตุ</li>
							<li><i class="fa fa-circle-o text-green"></i> โครงการฝากบ้าน</li>
							<li><i class="fa fa-circle-o text-aqua"></i> สถิติการลืมกุญแจ</li>
							<li><i class="fa fa-circle-o text-yellow"></i> สถิติเหตุทรัพย์งัดที่พักอาศัย</li>
							<li><i class="fa fa-circle-o text-orange"></i> สถิติงัดเบาะรถจักยานยนต์</li>
							<li><i class="fa fa-circle-o text-blue"></i> สถิติไม่สวมหมวกนิรภัย</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php $this->load->view('dashboard_admin_table_accidents_panel');?>
		</div>
	</div>
</div>
