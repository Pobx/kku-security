<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Temp_vehicles_forget_key extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Vehicles_forget_key_model');
        $this->load->model('Vehicles_forget_key_detective_model');
    }

    public function store()
    {
       
        
        $period_times = array('morning', 'afternoon', 'night');
        $people_type = array('officer', 'student', 'people_inside', 'people_outside', 'staff');
        $people_name = array('สมชาย พลเยี่ยม', 'สมใจ ใจงาม', 'สมหวัง กล้าหาญ', 'ชำนาญ เก่งทุกทาง', 'วินัย จำเนียน');
        $people_department_name = array('คณะทันตแพทยศาสตร์', 'คณะบริหารธุรกิจและการบัญชี', 'คณะเกษตรศาสตร์', 'บัณฑิตวิทยาลัย', 'คณะวิทยาศาสตร์ประยุกต์และวิศวกรรมศาสตร์');
        $car_type = array('car', 'motorcycle');
        $car_model = array('CITY', 'DMAX', 'CRV');
        $car_brand = array('IZUZU', 'TOYOTA', 'HONDA');
        $car_color = array('แดง', 'ขาว', 'ดำ');
        $car_state = array('new', 'old', 'other');
        $numbers = array(1,2,3,4,5,6,7,8,9);

        for ($months=1; $months <=12 ; $months++) { 
         $days_numbers = rand(10,25);
          for ($days=1; $days <=$days_numbers ; $days++) { 
             $inputs = array(
               'id'=>'',
               'period_time'=>$period_times[array_rand($period_times, 1)],
               'people_type'=>$people_type[array_rand($people_type, 1)],
               'date_forget_key'=>date('Y').'-'.$months.'-'.$days,
               'owner_assets_name'=>$people_name[array_rand($people_name, 1)],
               'owner_assets_department'=>$people_department_name[array_rand($people_department_name, 1)],
               'owner_assets_age'=>rand(20, 35),
               'owner_assets_phone'=>'08'.$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)],
               'vehicles_forget_key_place_id'=>rand(1, 5),
               'car_type'=>$car_type[array_rand($car_type, 1)],
               'model'=>$car_model[array_rand($car_model, 1)],
              'brand'=>$car_brand[array_rand($car_brand, 1)],
              'color'=>$car_color[array_rand($car_color, 1)],
              'license_plate'=>'XX'.$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)],
              'car_state'=>$car_state[array_rand($car_state, 1)],
              'state_comment'=>'รถสวยจ้า',
               'created'=>date('Y-m-d H:i:s'),
               'status'=>'active'
             );
 
            //  $results = $this->Vehicles_forget_key_model->store($inputs);
            //  $this->store_detectives($results['lastID']);
            //  $this->store_detectives();
             echo "<pre>", print_r($inputs);
          }
        }
    }

    public function store_detectives($vehicles_forget_key_id = NULL)
    {
     
      $people_name = array('สมชาย พลเยี่ยม', 'สมใจ ใจงาม', 'สมหวัง กล้าหาญ', 'ชำนาญ เก่งทุกทาง', 'วินัย จำเนียน');
      $people_department_name = array('คณะทันตแพทยศาสตร์', 'คณะบริหารธุรกิจและการบัญชี', 'คณะเกษตรศาสตร์', 'บัณฑิตวิทยาลัย', 'คณะวิทยาศาสตร์ประยุกต์และวิศวกรรมศาสตร์');
      $numbers = array(1,2,3,4,5,6,7,8,9);

      $rand_numbers = rand(1,5);
      for ($init_numbers=0; $init_numbers <=$rand_numbers ; $init_numbers++) { 
        $inputs = array(
          'id'=>'',
          'vehicles_forget_key_id'=>$vehicles_forget_key_id,
          'name'=>$people_name[array_rand($people_name, 1)],
          'department_name'=>$people_department_name[array_rand($people_department_name, 1)],
          'remark'=>'08'.$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)].$numbers[array_rand($numbers, 1)],
          'created'=>date('Y-m-d H:i:s'),
          'status'=>'active'
        );
        
        $this->Vehicles_forget_key_detective_model->store($inputs);
        // echo "<pre>", print_r($inputs);
      }
    }
}
