<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-12 text-right">
					<a href="<?php echo $link_go_to_form; ?>" class="btn btn-primary">
						<i class="fa fa-plus-circle"></i>
						เพิ่มข้อมูลใหม่
					</a>
				</div>
			</div>

			<br />

			<div class="table-responsive">
				<table class="table table-bordered table-striped mydataTable">
					<thead>
						<?php foreach ($header_columns as $key => $value)
{
    ?>
						<th>
							<?php echo $value; ?>
						</th>
						<?php }?>
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
								<?php echo $value['period_time_name']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['accident_place_name']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_car']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_motocycles']; ?>
							</td>
					
							<td class="text-center">
								<?php echo $value['count_injury']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_dead']; ?>
							</td>

							
							<td class="text-center">
								<?php echo $value['count_officer']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_student']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_people_outside']; ?>
							</td>

							<td class="text-center">
							<a data-toggle="collapse" href="#<?php echo "acc_info".$value['id']; ?>" role="button" aria-expanded="false" 
								class="btn btn-info" aria-controls="<?php echo "acc_info".$value['id']; ?>"><i class="fa fa-eye"></i></a>
				
							</td>

							<td class="text-center">
								<a href="<?php echo $link_go_to_form . '/' . $value['id']; ?>" class="btn btn-warning">
									<i class="fa fa-pencil"></i>
								</a>
							</td>
							<td class="text-center">
								<a href="javascript:removeItem('<?php echo $value['id']; ?>', '<?php echo $link_go_to_remove; ?>')" class="btn btn-danger">
									<i class="fa fa-trash-o"></i>
								</a>
							</td>

						</tr>
						<tr id="<?php echo "acc_info".$value['id']; ?>" class="collapse">
							<td colspan="13">
							<div class="row">
							<div class="col-md-4">
								<div class="col-md-12 col-sm-12 col-xs-12 ">
								<div class="info-box bg-aqua">
									<span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

									<div class="info-box-content">
									<span class="info-box-text">สาเหตู</span>
									<span class="info-box-number"><?php echo $value['accident_cause_name']; ?></span>

									<div class="progress">
										<div class="progress-bar" style="width: 70%"></div>
									</div>

									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
								</div>


							<div class="box box-primary col-md-12">
            <div class="box-header with-border">
              <h3 class="box-title">รถที่เกิดเหตุ</h3>

              <div class="box-tools pull-right">
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <!-- <div class="direct-chat-messages"> -->
			  <div>
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <!-- <span class="direct-chat-name pull-left">Alexander Pierce</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span> -->
                  </div>
                  <!-- /.direct-chat-info -->
				  <?php foreach ($value['results_participate'] as $car) { ?>
					<img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
					<div class="direct-chat-text">
						<?php echo $car['car_body'];?>
					</div>
					</div>
				  <?php } ?>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->


              
            </div>
            <!-- /.box-body -->
            
          </div>
								
							</div>
								<!-- --------------------- -->
									<div class="col-md-8">
										<!-- USERS LIST -->
											<div class="box box-danger">
												<div class="box-header with-border">
													<h3 class="box-title">ผู้ประสบเหตุ / คู่กรณี</h3>

													<div class="box-tools pull-right">
														<span class="label label-danger"></span>
														<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
														</button>
														
													</div>
												</div>
											<!-- /.box-header -->
											<div class="box-body no-padding">
												<div class="row">
													<?php 
											foreach ($value['results_participate'] as $people) {
										?>
												<div class="col-md-6">
													<div class="box-body box-profile">
													<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('dist/img/user4-128x128.jpg')?>" alt="User profile picture">

													<h3 class="profile-username text-center"><?php echo $people['people_name'];?></h3>

													<p class="text-muted text-center"><?php echo $people['people_type_name'];?></p>

													<ul class="list-group list-group-unbordered">
														<li class="list-group-item">
														<b> หน่วยงานสังกัด</b> <a class="pull-right"><?=$people['people_department_name'];?></a>
														</li>
														<li class="list-group-item">
														<b>ประเภทบุคคล</b> <a class="pull-right"><?php echo $people['victim_type_name'];?></a>
														</li>
														
													</ul>

													</div>
													<!-- /.box-body -->
												</div>
													
														<?php
										}
									?>
												</div>
												<!-- /.users-list -->
											</div>
											<!-- /.box-body -->
										</div>
										<!--/.box -->
									</div>
									
								</div><!--row -->
							
							</td>
						</tr>
						<?php }?>
					</tbody>
					
				</table>
			</div>

		</div>

		<div class="box-footer">
		</div>
	</div>
	<?php $this->load->view('dashboard_admin_bar_chart_monthly');?>
