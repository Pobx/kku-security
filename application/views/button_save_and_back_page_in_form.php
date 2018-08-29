<?php
$link_back_to_table = (isset($link_back_to_table)? $link_back_to_table : site_url('page_not_found'));
?>
<div class="row">
	<div class="col-md-6">
		<a href="<?php echo $link_back_to_table;?>" class="btn btn-warning">
			<i class="fa fa-arrow-circle-o-left"></i> ย้อนกลับ
		</a>
	</div>
	<div class="col-md-6 text-right">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
	</div>
</div>
