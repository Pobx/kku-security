<?php
	$form_url=(isset($form_url))? $form_url : site_url('page_not_found');
	$attr = array(
				'id'=>'my_form_submit'
    			, 'class'=>'form-horizontal form_submit_data'
    			, 'role'=>'form'
                , 'autocomplete'=>'off'
			);

    echo form_open($form_url, $attr);
?>
