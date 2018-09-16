<?php
// defined('BASEPATH') || exit('No direct script access allowed');

class Temp_redbox extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Redbox_inspect_transaction_model');
    }

    public function store()
    {
        $status_inspect = array('normal', 'abnormal');

        for ($months=1; $months <=12 ; $months++) { 
          $days_numbers = rand(10,25);
           for ($days=1; $days <=$days_numbers ; $days++) { 
              $inputs = array(
                'id'=>'',
                'redbox_place_id'=>rand(1, 25),
                'user_id'=>2,
                'inspect_date'=>date('Y').'-'.$months.'-'.$days.' '.date('H:i:s'),
                'created'=>date('Y-m-d H:i:s'),
                'status'=>'active',
                'status_inspect'=>$status_inspect[array_rand($status_inspect, 1)],
                'comment'=>'ไม่มีทรัพย์สินเสียหาย'
              );
  
              // $results = $this->Redbox_inspect_transaction_model->store($inputs);
              echo "<pre>", print_r($inputs);
           }
         }
    }

}
