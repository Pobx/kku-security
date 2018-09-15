<div class="form-group">
	<label for="redbox_place_id" class="col-sm-2 control-label">ตำแหน่งตู้แดง</label>

	<div class="col-sm-4">
		<select class="form-control select2" name="redbox_place_id" id="redbox_place_id">
			<option>เลือก</option>
			<?php foreach ($results_redbox_place as $key => $value) {?>
			<option value="<?php echo $value['id'];?>">
				<?php echo $value['name'];?>
			</option>
			<?php }?>
		</select>
	</div>
</div>

<div class="form-group">
	<label for="status_inspect" class="col-sm-2 control-label">สถานะ</label>

	<div class="col-sm-4">
		<div class="form-group">
			<div class="radio">
				<label>
					<input type="radio" name="status_inspect" id="status_inspect" class="flat-red" value="1" <?php if($status_inspect=='normal'
					 ) {echo "checked" ; }?>>
					ปกติ
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="status_inspect" id="status_inspect2" class="flat-red" value="2" <?php if($status_inspect=='abnormal'
					 ) {echo "checked" ; }?>>
					ไม่ปกติ
				</label>
			</div>

		</div>
	</div>
</div>



<div class="form-group">
	<label for="remark" class="col-sm-2 control-label">หมายเหตุ</label>

	<div class="col-sm-4">
		<textarea class="form-control" id="comment" name="comment"><?php echo $comment;?></textarea>
	</div>
</div>
