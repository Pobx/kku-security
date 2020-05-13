<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body">

			<div class="box-header"></div>

			<div class="box-body">
				<style>
					.process-step .btn:focus{outline:none}
					.process{display:table;width:100%;position:relative}
					.process-row{display:table-row}
					.process-step button[disabled]{opacity:1 !important;filter: alpha(opacity=100) !important}
					.process-row:before{top:40px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}
					.process-step{display:table-cell;text-align:center;position:relative}
					.process-step p{margin-top:4px}
					.btn-circle{width:80px;height:80px;text-align:center;font-size:12px;border-radius:50%}

				</style>
				<div class="row">
					<div class="process">
						<div class="process-row nav nav-tabs">
							<div class="process-step">
								<button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="fa fa-info fa-3x"></i></button>
								<p><small>Fill<br />information</small></p>
							</div>
							<div class="process-step">
								<button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="fa fa-file-text-o fa-3x"></i></button>
								<p><small>Fill<br />description</small></p>
							</div>
							<div class="process-step">
								<button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-image fa-3x"></i></button>
								<p><small>Upload<br />images</small></p>
							</div>
							<div class="process-step">
								<button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="fa fa-cogs fa-3x"></i></button>
								<p><small>บันทึก<br />ข้อมูลเรียบร้อย</small></p>
							</div>
						</div>
					</div>
				</div>


				<div class="tab-content">
					<div id="menu1" class="tab-pane fade active in">

						<?php
							$this->load->view('header_form_submit_data');
							// $this->load->view('button_save_and_back_page_in_form');
							$this->load->view('accidents_information');
						?>

						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="status" value="active">
						<?php $this->load->view('button_save_and_back_page_in_form');?>
						</form>

				</div>
				<div id="menu2" class="tab-pane fade">
					
					<?php
						if ($id != '')
						{
							$this->load->view('accidents_participate_table_information');
							$this->load->view('accidents_form_store_modal');
						}
					?>
					<ul class="list-unstyled list-inline pull-right">
						<li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
						<li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
					</ul>
				</div>
				<div id="menu3" class="tab-pane fade">
					<div class="row">
					
						<div class="form-group" id="upload_image_0">
							<label for="" class="col-sm-2 control-label">อัพโหลดรูปภาพ</label>
							<!-- <label for="assets_name" class="col-sm-1 control-label">ชื่อทรัพย์สิน</label> -->
							<div class="col-sm-4">
								<input type="file"  id="upload_image" name="upload_image[]" >
							</div>

							<div class="col-sm-1"><a href="javascript:append_upload_image(0)" class="btn btn-info sm"><b>+</b></a></div>

						</div>
					</div>
					<div class="row">
						<div id="append_upload_image"></div>
					</div>
					<ul class="list-unstyled list-inline pull-right">
						<li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
						<li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
					</ul>
				</div>
				<div id="menu4" class="tab-pane fade">
					<h3>Menu 4</h3>
					<p>Some content in menu 4.</p>
					<ul class="list-unstyled list-inline pull-right">
						<li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
					</ul>
				</div>
			</div>
			</div><!--box-body -->



		</div>

	</div>
	


	<script>
		$(document).ready(function () {

			$('#place_text').val('').hide();
			$('#accident_cause_text').val('').hide();

			$('input[name="chk_place"]').on('ifClicked', function () {
				$('#place').next(".select2").hide();
				$('#place_text').val('').show();
			});

			$('input[name="chk_place"]').on('ifUnchecked', function () {
				$('#place').next(".select2").show();
				$('#place_text').val('').hide();
			});

			$('input[name="chk_accident_cause"]').on('ifClicked', function () {
				$('#accident_cause').next(".select2").hide();
				$('#accident_cause_text').val('').show();
			});

			$('input[name="chk_accident_cause"]').on('ifUnchecked', function () {
				$('#accident_cause').next(".select2").show();
				$('#accident_cause_text').val('').hide();
			});


			$('.btn-circle').on('click',function(){
			$('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
			$(this).addClass('btn-info').removeClass('btn-default').blur();
			});

			$('.next-step, .prev-step').on('click', function (e){
			var $activeTab = $('.tab-pane.active');

			$('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');

			if ( $(e.target).hasClass('next-step') )
				{
					var nextTab = $activeTab.next('.tab-pane').attr('id');
					$('[href="#'+ nextTab +'"]').addClass('btn-info').removeClass('btn-default');
					$('[href="#'+ nextTab +'"]').tab('show');
				}
				else
				{
					var prevTab = $activeTab.prev('.tab-pane').attr('id');
					$('[href="#'+ prevTab +'"]').addClass('btn-info').removeClass('btn-default');
					$('[href="#'+ prevTab +'"]').tab('show');
				}
			});

		});



		function append_assets_amount(_id){
			id = _id+1;
			var str= `<div class="form-group" id="assets_name_`+id+`">
				<label for="" class="col-sm-2 control-label"></label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="assets_name" name="assets_name[]" placeholder="ชื่อทรัพย์สิน" value="">
				</div>

				<label for="assets_amount" class="col-sm-1 control-label">จำนวน</label>

				<div class="col-sm-1">
					<input type="number" class="form-control" id="assets_amount" name="assets_amount[]"  value="">
				</div>
				<div class="col-sm-1"><a href="javascript:append_assets_amount(`+id+`)" class="btn btn-info sm"><b>+</b></a></div>
				<div class="col-sm-1"><a href="javascript:delete_assets_amount(`+id+`)" class="btn btn-danger sm"><b>-</b></a></div>

			</div>
			`;
			$('#append_assets_name').append(str);
		}

		function delete_assets_amount(id){
			$('#assets_name_'+id).remove();
		}

		function append_upload_image(_id){
			id = _id+1;
			var str= `<div class="row" style="margin-top:5px">
			<div class="form-group" id="upload_image_`+id+`">
				<label for="" class="col-sm-2 control-label"></label>
				<div class="col-sm-4">
					<input type="file" class="form-control"  id="upload_image" name="upload_image[]" placeholder="ชื่อทรัพย์สิน" value="">
				</div>
				<div class="col-sm-1"><a href="javascript:append_upload_image(`+id+`)" class="btn btn-info sm"><b>+</b></a></div>
				<div class="col-sm-1"><a href="javascript:delete_upload_image(`+id+`)" class="btn btn-danger sm"><b>-</b></a></div>

			</div></div>
			`;
			$('#append_upload_image').append(str);
		}

		function delete_upload_image(id){
			$('#upload_image_'+id).remove();
		}

		function _delete(id){
			console.log(id)
			$.post( "<?php echo site_url('accidents/inactive');?>", { 'id': id})
			.done(function( data ) {
				console.log(data );
			});

		}
		
		

	</script>
