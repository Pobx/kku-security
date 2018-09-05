

<div class="form-group">
	<label for="victim_name" class="col-sm-2 control-label">ตำแหน่งตู้แดง</label>

	<div class="col-sm-4">
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
			</div>
</div>

<div class="form-group">
	<label for="victim_address" class="col-sm-2 control-label">สถานะ</label>

	<div class="col-sm-4">
	<div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
						ปกติ
					</label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
						ไม่ปกติ
                    </label>
                  </div>
                 
                </div>
	</div>
</div>



<div class="form-group">
	<label for="remark" class="col-sm-2 control-label">หมายเหตุ</label>

	<div class="col-sm-4">
		<textarea class="form-control" id="remark" name="remark"><?php echo $remark; ?></textarea>
	</div>
</div>


<script>
        $(document).ready(function() { $("#e1").select2(); });
    </script>