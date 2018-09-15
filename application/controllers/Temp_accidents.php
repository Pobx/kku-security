<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Temp_accidents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_model');
        $this->load->model('Accidents_participate_model');
    }


    public function store()
    {
      $period_times = array('morning', 'afternoon', 'night');

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

            $results = $this->Accidents_model->store($inputs);
            $this->store_participate($results['lastID']);
            echo "<pre>", print_r($inputs);
         }
       }

    }

    public function store_participate($accident_id = NULL)
    {
      $injury_type = array('injury', 'dead', 'injury_hard');
      $victim_type = array('victim', 'parties');
      $people_type = array('officer', 'student', 'people_inside');
      
      $people_name = array('สมชาย พลเยี่ยม', 'สมใจ ใจงาม', 'สมหวัง กล้าหาญ', 'ชำนาญ เก่งทุกทาง', 'วินัย จำเนียน');
      $people_department_name = array('คณะทันตแพทยศาสตร์', 'คณะบริหารธุรกิจและการบัญชี', 'คณะเกษตรศาสตร์', 'บัณฑิตวิทยาลัย', 'คณะวิทยาศาสตร์ประยุกต์และวิศวกรรมศาสตร์');
      $car_type = array('car', 'motorcycle');
      $car_model = array('CITY', 'DMAX', 'CRV');
      $car_brand = array('IZUZU', 'TOYOTA', 'HONDA');
      $car_color = array('แดง', 'ขาว', 'ดำ');
      $numbers = array(1,2,3,4,5,6,7,8,9);

      $rand_numbers = rand(1,5);
      for ($init_numbers=0; $init_numbers <=$rand_numbers ; $init_numbers++) { 
        $inputs = array(
          'id'=>'',
          'accident_id'=>$accident_id,
          'injury_type'=>$injury_type[array_rand($injury_type, 1)],
          'victim_type'=>$victim_type[array_rand($victim_type, 1)],
          'people_type'=>$people_type[array_rand($people_type, 1)],
          'people_name'=>$people_name[array_rand($people_name, 1)],
          'people_department_name'=>$people_department_name[array_rand($people_department_name, 1)],
          'car_type'=>$car_type[array_rand($car_type, 1)],
          'car_model'=>$car_model[array_rand($car_model, 1)],
          'car_brand'=>$car_brand[array_rand($car_brand, 1)],
          'car_color'=>$car_color[array_rand($car_color, 1)],
          'car_license_plate'=>'XX'.$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)],
          'created'=>date('Y-m-d H:i:s'),
          'status'=>'active'
        );
        $results = $this->Accidents_participate_model->store($inputs);
        // echo "<pre>", print_r($inputs);
      }
    }

}
