<div class="form-group">
	<label for="roles" class="col-sm-2 control-label">สิทธิ์การใช้งาน</label>

	<div class="col-sm-4">
		<select class="form-control select2" name="roles" id="roles">
			<option>เลือก</option>
			<?php foreach ($roles_lists as $key => $value)
{
    ?>
			<option value="<?php echo $value;?>">
				<?php echo $value;?>
			</option>
			<?php }?>
		</select>
	</div>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">ชื่อ - สกุล</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ - สกุล" value="<?php echo $name; ?>">
	</div>
</div>

<div class="form-group">
	<label for="username" class="col-sm-2 control-label">Username</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>">
	</div>
</div>

<div class="form-group">
	<label for="passwords" class="col-sm-2 control-label">Passwords</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="passwords" name="passwords" placeholder="Passwords" value="">
	</div>
</div>
