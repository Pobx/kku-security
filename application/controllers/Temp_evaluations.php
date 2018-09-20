<?php
// defined('BASEPATH') || exit('No direct script access allowed');

class Temp_evaluations extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Evaluation_model');
        $this->load->model('Evaluation_services_model');

    }

    public function store()
    {
        $genders = array('male', 'female');
        $ages = array('less_than_20', 'between_21_and_25', 'between_26_and_30', 'between_31_and_35', 'between_36_and_40', 'between_41_and_45', 'between_46_and_50', 'more_than_50');

        for ($months = 1; $months <= 12; $months++)    
        {
            $days_numbers = rand(10, 25);
            for ($days = 1; $days <= $days_numbers; $days++)
            {
                $inputs = array(
                  
                    'id'              => '',
                    'eval_date'=>date('Y') . '-' . $months . '-' . $days . ' ' . date('H:i:s'),
                    'gender' => $genders[array_rand($genders, 1)],
                    'age'         => $ages[array_rand($ages, 1)],
                    'personal_id'    => rand(1, 8),
                    'department_id'=> rand(1, 27), // this is faculty
                    'performance'=>rand(1, 5),
                    'success'=>rand(1, 5),
                    'timeline'=>rand(1, 5),
                    'service_clear'=>rand(1, 5),
                    'materials'=>rand(1, 5),
                    'servicemind'=>rand(1, 5),
                    'communication'=>rand(1, 5),
                    'knowlage'=>rand(1, 5),
                    'questions'=>rand(1, 5),
                    'followup'=>rand(1, 5),
                    'comment'=>'ไม่มีทรัพย์สินเสียหาย',
                    'created'         => date('Y-m-d H:i:s'),
                    'status'          => 'active',
                );

                // $results = $this->Evaluation_model->store($inputs);
                // $this->store_services($results['lastID']);
                echo '<pre>', print_r($inputs);
            }
        }
    }

    private function store_services($evaluation_id ='') 
        {
          $rand_numbers = rand(1,5);
      for ($init_numbers=0; $init_numbers <=$rand_numbers ; $init_numbers++) {
        $inputs = array(
                  
          'id'              => '',
          'evaluation_id'=>$evaluation_id,
          'service_id'    => rand(1, 14),
          'created'         => date('Y-m-d H:i:s'),
          'status'          => 'active',
      );

      $this->Evaluation_services_model->store($inputs);
      // echo '<pre>', print_r($inputs);
      }
          
        }

}
