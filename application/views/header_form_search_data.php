<?php
$form_search_data_url = (isset($form_search_data_url)) ? $form_search_data_url : site_url('page_not_found');
$attr = array(
    'id' => 'my_form_submit'
    , 'class' => 'form-horizontal'
    , 'role' => 'form'
    , 'autocomplete' => 'off',
);

echo form_open($form_search_data_url, $attr);
