<?php
	$form_submit_data_url_modal=(isset($form_submit_data_url_modal))? $form_submit_data_url_modal : site_url('page_not_found');
	$attr = array(
				'id'=>'my_form_submit'
    			, 'class'=>'form-horizontal'
    			, 'role'=>'form'
                , 'autocomplete'=>'off'
			);

    echo form_open($form_submit_data_url_modal, $attr);
?>
