<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
		</div>

		<div class="box-body">

			<form class="form-horizontal form_submit_data">
				<div class="box-header">
					<?php $this->load->view('button_save_and_back_page_in_form');?>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Email</label>

						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Password</label>

						<div class="col-sm-10">
							<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Remember me
								</label>
							</div>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<?php $this->load->view('button_save_and_back_page_in_form');?>
				</div>
			</form>

		</div>

		<div class="box-footer">
		</div>
	</div>
