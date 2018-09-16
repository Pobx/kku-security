<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Temp_break_homes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Break_homes_model');
    }

    public function store()
    {
       
        $period_times = array('morning', 'afternoon', 'night');
        $type_address = array('home', 'flat', 'office', 'other');
        $victim_process = array('bill', 'camera', 'other');
        $staff_process = array('yes', 'no', 'nothing');
        
        $people_name = array('สมชาย พลเยี่ยม', 'สมใจ ใจงาม', 'สมหวัง กล้าหาญ', 'ชำนาญ เก่งทุกทาง', 'วินัย จำเนียน');
        $people_department_name = array('คณะทันตแพทยศาสตร์', 'คณะบริหารธุรกิจและการบัญชี', 'คณะเกษตรศาสตร์', 'บัณฑิตวิทยาลัย', 'คณะวิทยาศาสตร์ประยุกต์และวิศวกรรมศาสตร์');
        $numbers = array(1,2,3,4,5,6,7,8,9);

        for ($months=1; $months <=12 ; $months++) { 
         $days_numbers = rand(10,25);
          for ($days=1; $days <=$days_numbers ; $days++) { 
             $inputs = array(
               'id'=>'',
               'date_break'=>date('Y').'-'.$months.'-'.$days,
               'time_break'=>date('H:i:s'),
               'victim_name'=>$people_name[array_rand($people_name, 1)],
               'victim_phone'=>'08'.$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)],
               'department'=>$people_department_name[array_rand($people_department_name, 1)],
              'type_address'=>$type_address[array_rand($type_address, 1)],
               'address'=>'มหาวิทยาลัยขอนแก่น',
               'assets_loses'=>'เงินหาย 100 บาท',
               'victim_process'=>$victim_process[array_rand($victim_process, 1)],
               'victim_process_note'=>'ไม่มีทรัพย์สินเสียหาย',
               'staff_process'=>$staff_process[array_rand($staff_process, 1)],
               'remark'=>'ไม่ได้ระบุ',
               'created'=>date('Y-m-d H:i:s'),
               'status'=>'active'
             );
 
            //  $results = $this->Break_homes_model->store($inputs);
             echo "<pre>", print_r($inputs);
          }
        }
    }

}
