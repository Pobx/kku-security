<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Temp_security_homes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Security_home_model');
    }

    public function store()
    {
      $people_name = array('สมชาย พลเยี่ยม', 'สมใจ ใจงาม', 'สมหวัง กล้าหาญ', 'ชำนาญ เก่งทุกทาง', 'วินัย จำเนียน');
      $people_department_name = array('คณะทันตแพทยศาสตร์', 'คณะบริหารธุรกิจและการบัญชี', 'คณะเกษตรศาสตร์', 'บัณฑิตวิทยาลัย', 'คณะวิทยาศาสตร์ประยุกต์และวิศวกรรมศาสตร์');
      $people_office_name = array('สำนักเทคโนโลยีสารสนเทศ', 'สำนักหอสมุด', 'สำนักบริหารและพัฒนาวิชาการ', 'สำนักบริการวิชาการ', 'สำนักงานอธิการบดี');
      $address = array('address 1', 'address 2', 'address 3', 'address 3', 'address 4', 'address 5');
      $owner_home_position_name = array('position 1', 'position 2', 'position 3', 'position 4', 'position 5');
      $status = array('stable', 'not-stable');

        for ($months=1; $months <=12 ; $months++) { 
          $days_numbers = rand(10,25);
           for ($days=1; $days <=$days_numbers ; $days++) {
              $inputs = array(
                'id'=>'',
                'start_date'=>date('Y').'-'.$months.'-'.$days,
                'end_date'=>date('Y').'-'.$months.'-'.$days,
                'owner_home_name'=>$people_name[array_rand($people_name, 1)],
                'owner_home_position_name'=>$owner_home_position_name[array_rand($owner_home_position_name, 1)],
                'owner_home_department_name'=>$people_department_name[array_rand($people_department_name, 1)],
                'owner_home_office_name'=>$people_office_name[array_rand($people_office_name, 1)],
                'address'=>$address[array_rand($address, 1)],
                'created'=>date('Y-m-d H:i:s'),
                'status'=>$status[array_rand($status, 1)],
              );
  
              $this->Security_home_model->store($inputs);
              echo "<pre>", print_r($inputs);
           }
         }
    }

}
