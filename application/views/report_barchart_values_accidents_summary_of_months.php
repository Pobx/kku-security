<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">สรุปการเกิดเหตุประจำปี</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
	<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Donut Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="donut-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="546" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 546px; height: 300px;"></canvas><canvas class="flot-overlay" width="546" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 546px; height: 300px;"></canvas><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 71px; left: 331.6015625px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series2<br>30%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 211px; left: 309.6015625px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series3<br>20%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 130px; left: 150.6015625px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series4<br>50%</div></span></div>
            </div>
            <!-- /.box-body-->
          </div>
	<?php $a[] = json_decode($barchart_values_accidents_summary_of_months);
	print_r($a);?>
		<div class="chart">
			<canvas id="bar_chart_accidents_summary_of_months" style="height:250px"></canvas>
		</div>
	</div>
</div>
