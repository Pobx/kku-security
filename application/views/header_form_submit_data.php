<?php
	$form_submit_data_url=(isset($form_submit_data_url))? $form_submit_data_url : site_url('page_not_found');
	$attr = array(
				'id'=>'my_form_submit'
    			, 'class'=>'form-horizontal form_submit_data'
    			, 'role'=>'form'
				, 'autocomplete'=>'off',
				'enctype'=>"multipart/form-data"
			);

    echo form_open($form_submit_data_url, $attr);
?>
