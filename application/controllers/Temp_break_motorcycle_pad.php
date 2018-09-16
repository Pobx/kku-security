<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Temp_break_motorcycle_pad extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Break_motorcycle_pad_model');
    }


    public function store()
    {
      
        $period_times = array('morning', 'afternoon', 'night');
        $people_type = array('officer', 'student', 'people_inside', 'people_outside', 'staff');
        $people_name = array('สมชาย พลเยี่ยม', 'สมใจ ใจงาม', 'สมหวัง กล้าหาญ', 'ชำนาญ เก่งทุกทาง', 'วินัย จำเนียน');
        $people_department_name = array('คณะทันตแพทยศาสตร์', 'คณะบริหารธุรกิจและการบัญชี', 'คณะเกษตรศาสตร์', 'บัณฑิตวิทยาลัย', 'คณะวิทยาศาสตร์ประยุกต์และวิศวกรรมศาสตร์');
        $operation_status = array('caught', 'not_caught', 'other');
        
        for ($months=1; $months <=12 ; $months++) { 
         $days_numbers = rand(10,25);
          for ($days=1; $days <=$days_numbers ; $days++) { 
             $inputs = array(
               'id'=>'',
               'period_time'=>$period_times[array_rand($period_times, 1)],
               'people_type'=>$people_type[array_rand($people_type, 1)],
               'date_break'=>date('Y').'-'.$months.'-'.$days.' '.date('H:i:s'),
               'victim_name'=>$people_name[array_rand($people_name, 1)],
          'victim_department_name'=>$people_department_name[array_rand($people_department_name, 1)],
              'victim_address'=>'มหาวิทยาลัยขอนแก่น',
               'place'=>'มหาวิทยาลัยขอนแก่น',
               'assets_loses'=>'เงินสด 99 บาท',
               'remark'=>'ทรัพย์สินเสียหาย',
               'operation_status'=>$operation_status[array_rand($operation_status, 1)],
               'created'=>date('Y-m-d H:i:s'),
               'status'=>'active'
             );
 
            //  $results = $this->Break_motorcycle_pad_model->store($inputs);
             echo "<pre>", print_r($inputs);
          }
        }
    }

}
