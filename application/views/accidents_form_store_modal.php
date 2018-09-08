<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<?php echo $head_topic_participate_label; ?>
				</h4>
			</div>
			<div class="modal-body">
				<?php 
          $this->load->view('header_form_submit_data');
          $this->load->view('accidents_peoples_information_form_store');
          $this->load->view('accidents_vehicles_information_form_store');
        ?>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>

	</div>
</div>
