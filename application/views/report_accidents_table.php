<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<?php $this->load->view('header_form_search_data');?>
					<div class="form-group">
						<label for="start_date" class="col-sm-2 control-label">วันที่</label>

						<div class="col-sm-2">
							<input type="text" class="form-control datepicker" id="start_date" name="start_date" data-provide="datepicker"
							data-date-language="th-th" placeholder="วันที่" value="<?php echo $start_date; ?>">
						</div>
						<label for="end_date" class="col-sm-1 control-label">ถึง</label>

						<div class="col-sm-2">
							<input type="text" class="form-control datepicker" id="end_date" name="end_date" data-provide="datepicker"
							data-date-language="th-th" placeholder="ถึง" value="<?php echo $end_date; ?>">
						</div>

						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>
						</div>

					</div>
					</form>
				</div>
			</div>

			<br />

			<div class="table-responsive">
				<table class="table table-bordered table-striped mydataTable">
					<thead>
						<tr>
							<?php foreach ($header_columns as $key => $value)
{
    ?>
							<th class="text-center">
								<?php echo $value; ?>
							</th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($results as $key => $value)
{
    ?>
						<tr>
							<td class="text-center">
								<?php echo $value['accident_date']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['period_time']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['place']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_car']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_motocycles']; ?>
							</td>
							<td class="text-center">
								<?php 
                  foreach ($value['results_vehicles'] as $car) {
                    echo $car['car_body']."<hr />";
                  }
                ?>
							</td>
							<td class="text-center">
								<?php echo $value['accident_cause']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_injury']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_dead']; ?>
							</td>
							<td class="text-center">
								<?php 
                  foreach ($value['results_peoples'] as $people) {
                    echo $people['people_name']."<hr />";
                  }
                ?>
							</td>
							<td class="text-center">
								<?php 
                  foreach ($value['results_peoples'] as $people) {
                    echo $people['people_department_name']."<hr />";
                  }
                ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_officer']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_student']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_people_inside']; ?>
							</td>
						</tr>
						<?php }?>
					</tbody>
					<tfoot>
						<?php foreach ($header_columns as $key => $value)
{
    ?>
						<th class="text-center">
							<?php echo $value; ?>
						</th>
						<?php }?>
					</tfoot>
				</table>

			</div>

		</div>

		<div class="box-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a href="<?php echo $link_excel;?>" target="_blank" class="btn btn-success"><i class="fa  fa-file-excel-o"></i>
						Excel</a>
				</div>
			</div>
		</div>
	</div>
