<?php
// defined('BASEPATH') || exit('No direct script access allowed');

class Cctv_request_log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Cctv_request_log_model');
       
    }

    public function store()
    {
       
        for ($months=1; $months <=12 ; $months++) { 
          $days_numbers = rand(10,25);
           for ($days=1; $days <=$days_numbers ; $days++) { 
              $inputs = array(
                'id'=>'',
                'accident_date'=>date('Y').'-'.$months.'-'.$days,
                'accident_time'=>date('H:i:s'),
                'period_time'=>$period_times[array_rand($period_times, 1)],
                'place'=>rand(1, 19),
                'accident_cause'=>rand(1, 3),
                'assets_name'=>'ไม่มีทรัพย์สินเสียหาย',
                'assets_amount'=>0,
                'assets_remark'=>'ไม่มีทรัพย์สินเสียหาย',
                'created'=>date('Y-m-d H:i:s'),
                'status'=>'active'
              );
  
              // $results = $this->Cctv_request_log_model->store($inputs);
              echo "<pre>", print_r($inputs);
           }
         }
    }

}
