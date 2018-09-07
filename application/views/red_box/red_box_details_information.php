<style>
  optgroup { color: #33A; font-weight:normal; font-style:normal; }
option { color: #000; }
</style>

<div class="form-group">
	<label for="victim_name" class="col-sm-2 control-label">ตำแหน่งตู้แดง</label>

	<div class="col-sm-4">
                <select class="form-control select2 select2-hidden-accessible"  name="redbox_id"
                  style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option>เลือก...</option>
                  <?php 
                    $zone ="";
                    foreach($redbox_lists['result'] as $row){
                      if($zone != $row->zone && $zone !=""){
                        echo "</optgroup>";
                        $zone ="";
                      }
                      if($zone ==""){
                        echo '<optgroup label="'.$row->zone.'">';
                        $zone = $row->zone;
                      }
                      echo '<option value="'.$row->redbox_id.'">'.$row->redbox_id .". ".$row->redboxname.'</option>';
                     
                    }
                  ?>
                </select>
			</div>
</div>

<div class="form-group">
	<label for="victim_address" class="col-sm-2 control-label">สถานะ</label>

	<div class="col-sm-4">
	<div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="status1" value="1" checked="checked">
						ปกติ
					</label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="status2" value="2">
						ไม่ปกติ
                    </label>
                  </div>
                 
                </div>
	</div>
</div>



<div class="form-group">
	<label for="remark" class="col-sm-2 control-label">หมายเหตุ</label>

	<div class="col-sm-4">
		<textarea class="form-control" id="comment" name="comment"></textarea>
	</div>
</div>


<script>
        $(document).ready(function() { $("#e1").select2(); });
    </script>