<?php
// defined('BASEPATH') || exit('No direct script access allowed');

class Temp_cctv_request_log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Cctv_request_log_model');
       
    }

    public function store()
    {
      $people_name = array('สมชาย พลเยี่ยม', 'สมใจ ใจงาม', 'สมหวัง กล้าหาญ', 'ชำนาญ เก่งทุกทาง', 'วินัย จำเนียน');
      $gender = array('male', 'female');
      $people_type = array('staff', 'student', 'people_outside');
      $operation_status = array('meet_event', 'have_not_event', 'other');
      $random_value = array(NULL, 1, 3, 2, 4, 5);
      $computers = array('COM-001', 'COM-002', 'COM-003');
      $drives = array('C', 'D', 'E');
      $folders = array('FOLDER-001', 'FOLDER-002', 'FOLDER-003');

        for ($months=1; $months <=12 ; $months++) { 
          $days_numbers = rand(10,25);
           for ($days=1; $days <=$days_numbers ; $days++) { 
              $inputs = array(
                'id'=>'',
                'request_date'=>date('Y').'-'.$months.'-'.$days,
                'victim_name'=>$people_name[array_rand($people_name, 1)],
                'gender'=>$gender[array_rand($gender, 1)],
                'people_type'=>$people_type[array_rand($people_type, 1)],
                'cctv_event_id'=>rand(1, 4),
                'area'=>'มหาวิทยาลัยขอนแก่น',
                'operation_status'=>$operation_status[array_rand($operation_status, 1)],
                'operation_status_note'=>'ไม่มีทรัพย์สินเสียหาย',
                'picture'=>$random_value[array_rand($random_value, 1)],
                'picture'=>$random_value[array_rand($random_value, 1)],
                'vedio'=>$random_value[array_rand($random_value, 1)],
                'printpicture'=>$random_value[array_rand($random_value, 1)],
                'flash_drive'=>$random_value[array_rand($random_value, 1)],

                'computer_name'=>$computers[array_rand($computers, 1)],
                'drive'=>$drives[array_rand($drives, 1)],
                'folder'=>$folders[array_rand($folders, 1)],

                'created'=>date('Y-m-d H:i:s'),
                'status'=>'active'
              );
  
              // $results = $this->Cctv_request_log_model->store($inputs);
              echo "<pre>", print_r($inputs);
           }
         }
    }

}
