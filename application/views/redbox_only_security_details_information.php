<div class="form-group">
	<label for="redbox_place_id" class="col-sm-3 control-label">ตำแหน่งตู้แดง</label>
<!-- <=print_r($results_redbox_place);?> -->
	<div class="col-sm-8">
	<?php $curr_zone=0;$i=0;$one=1?>
	<?php foreach ($results_redbox_place as $key => $value){ $checked=false; ?>
		
			<?php foreach($checked_redbox_place as $key => $checked_place){
					 if($checked_place['id'] == $value['id']){
						 $checked = true;
					 }
				}
				?>

				<?php 
				$bg = $checked ==true ? 'display:none' : '';
				$all_checked = $checked =='aa' ? '<button class="btn btn-success btn-block">บันทึกครบทุกจดแล้ว</button>' : '';
			if($curr_zone ==0){
				echo "<h4 style='".$bg."'>Zone :".$value['zonename'].$all_checked."</h4>";
				$curr_zone = $value['zone_id'];
			}
			if($curr_zone != $value['zone_id']){
				echo "<h4 style='".$bg."'>Zone :".$value['zonename'].$all_checked."</h4>";
				$curr_zone = $value['zone_id'];
				$one=1;
			
			}
			?>
		<?php if($checked == false){ ?>
			<button type="button" class="btn btn-primary  btn-block" data-toggle="modal" 
				value="<?php echo $value['id']; ?>" onclick="add(<?=$value['id'];?>)"
				data-target="#exampleModal" data-whatever="@mdo"><?=$value['name'];?></button>

		<?php  $i++;}else{
			//  echo "<button class='btn btn-success btn-block'>บันทึกครบทุกจดแล้ว</button>";
		} ?>
	<?php }//foreach?>
		<!-- <select class="form-control select2" name="redbox_place_id" id="redbox_place_id">
			<option>เลือก</option>
			<php foreach ($results_redbox_place as $key => $value){ $checked=false;?>	
				<php foreach($checked_redbox_place as $key => $checked_place){
					 if($checked_place['name'] == $value['name']){
						 $checked = true;
					 }
				}
				if($checked == false){
				?>
				<option value="<php echo $value['id']; ?>">
					<php echo $value['name']; ?>
				</option>
				<php }//if ?>
			<php }?>
		</select> -->
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">สถานะ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="form-group">
	<label for="status_inspect" class="col-sm-3 control-label">สถานะ</label>

	<div class="col-sm-8">
		<div class="form-group">
			<div class="radio">
				<label>
					<input type="radio" name="status_inspect" id="status_inspect" class="flat-red" value="normal">
					ปกติ
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="status_inspect" id="status_inspect2" class="flat-red" value="abnormal">
					ไม่ปกติ
				</label>
			</div>

		</div>
	</div>
</div>

<div class="form-group">
	<label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>

	<div class="col-sm-8">
		<textarea class="form-control" id="comment" name="comment"></textarea>
	</div>
</div>

<div class="form-group">
	<!-- <label for="username" class="col-sm-2 control-label">รหัส</label>-->

	<div class="col-sm-4">
	<input type="hidden" name="redbox_place_id" id="redbox_place_id" value="">
		<input type="hidden" id="username" name="username" 
			value="<?php echo $username; ?>">
		<input type="hidden" id="id" name="id" value="">
	</div>

</div>


<button type="submit" class="btn btn-lg  btn-block btn-success"><i class="fa fa-save"></i> บันทึกข้อมูล</button>


 </div>
  </div>
</div>

  <script>
	function add(id){
		$('#redbox_place_id').val(id)
	}
  </script>     