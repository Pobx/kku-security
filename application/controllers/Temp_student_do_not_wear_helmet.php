<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Temp_student_do_not_wear_helmet extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Student_do_not_wear_helmet_model');
    }

    public function store()
    {
      $period_times = array('morning', 'afternoon', 'night');
      $place = array('หน้าวงเวียน', 'ป้อมยามหน้าหอชาย', 'หน้าหอหญิง 3', 'หลังมอ', 'หน้ามอ');
      $people_name = array('สมชาย พลเยี่ยม', 'สมใจ ใจงาม', 'สมหวัง กล้าหาญ', 'ชำนาญ เก่งทุกทาง', 'วินัย จำเนียน');
      $people_department_name = array('คณะทันตแพทยศาสตร์', 'คณะบริหารธุรกิจและการบัญชี', 'คณะเกษตรศาสตร์', 'บัณฑิตวิทยาลัย', 'คณะวิทยาศาสตร์ประยุกต์และวิศวกรรมศาสตร์');
      $people_type = array('officer', 'student', 'people_outside');
      $car_model = array('CITY', 'DMAX', 'CRV');
      $car_brand = array('IZUZU', 'TOYOTA', 'HONDA');
      $car_color = array('แดง', 'ขาว', 'ดำ');
      $numbers = array(1,2,3,4,5,6,7,8,9);

        for ($months=1; $months <=12 ; $months++) { 
          $days_numbers = rand(10,25);
           for ($days=1; $days <=$days_numbers ; $days++) { 
              $inputs = array(
                'id'=>'',
                'inspect_date'=>date('Y').'-'.$months.'-'.$days,
                'place'=>$place[array_rand($place, 1)],
                'people_name'=>$people_name[array_rand($people_name, 1)],
                'people_code'=>'CODE-'.$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)],
                'department_name'=>$people_department_name[array_rand($people_department_name, 1)],
                'model'=>$car_model[array_rand($car_model, 1)],
                'brand'=>$car_brand[array_rand($car_brand, 1)],
                'color'=>$car_color[array_rand($car_color, 1)],
                'license_plate'=>'XX'.$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)],
                'people_type'=>$people_type[array_rand($people_type, 1)],
                'period_time'=>$period_times[array_rand($period_times, 1)],
                'created'=>date('Y-m-d H:i:s'),
                'status'=>'active'
              );
  
              // $results = $this->Student_do_not_wear_helmet_model->store($inputs);
              echo "<pre>", print_r($inputs);
           }
         }
    }

}
