<?php
// defined('BASEPATH') || exit('No direct script access allowed');

class Temp_security_cards extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Security_cards_model');
    }

    public function store()
    {
      $people_name = array('สมชาย พลเยี่ยม', 'สมใจ ใจงาม', 'สมหวัง กล้าหาญ', 'ชำนาญ เก่งทุกทาง', 'วินัย จำเนียน');
      $people_department_name = array('คณะทันตแพทยศาสตร์', 'คณะบริหารธุรกิจและการบัญชี', 'คณะเกษตรศาสตร์', 'บัณฑิตวิทยาลัย', 'คณะวิทยาศาสตร์ประยุกต์และวิศวกรรมศาสตร์');
      $people_office_name = array('สำนักเทคโนโลยีสารสนเทศ', 'สำนักหอสมุด', 'สำนักบริหารและพัฒนาวิชาการ', 'สำนักบริการวิชาการ', 'สำนักงานอธิการบดี');
      $car_province = array('ร้อยเอ็ด', 'ขอนแก่น', 'ชลบุรี', 'กรุงเทพมหานคร', 'มหาสารคาม', 'ตาก');
      $people_positions = array('position 1', 'position 2', 'position 3', 'position 4', 'position 5');
      $car_brand = array('IZUZU', 'TOYOTA', 'HONDA');
      $car_color = array('แดง', 'ขาว', 'ดำ');
      $numbers = array(1,2,3,4,5,6,7,8,9);

      for ($months=1; $months <=12 ; $months++) { 
        $days_numbers = rand(10,25);
         for ($days=1; $days <=$days_numbers ; $days++) {
            $inputs = array(
              'id'=>'',
              'numbers'=>'CARD-'.$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)],
              'people_name'=>$people_name[array_rand($people_name, 1)],
              'people_position'=>$people_positions[array_rand($people_positions, 1)],
              'people_department_name'=>$people_department_name[array_rand($people_department_name, 1)],
              'people_phone'=>'08'.$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)],
              'car_province'=>$car_province[array_rand($car_province, 1)],
              'car_brand'=>$car_brand[array_rand($car_brand, 1)],
              'car_color'=>$car_color[array_rand($car_color, 1)],
              'car_license_plate'=>'XX'.$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)],
              'created'=>date('Y-m-d H:i:s'),
              'status'=>'active',
              'issue_date'=>date('Y').'-'.$months.'-'.$days,
              'expire_date'=>(date('Y') + 1).'-'.$months.'-'.$days,
            );

            $this->Security_cards_model->store($inputs);
            echo "<pre>", print_r($inputs);
         }
       }

    }

}
