<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_model');
				$this->load->model('Break_homes_model');
				$this->load->model('Security_home_model');
				$this->load->model('Vehicles_forget_key_model');
        $this->load->model('Student_do_not_wear_helmet_model');
        $this->load->model('Break_motorcycle_pad_model');

				$this->load->library('Date_libs');
				$this->load->library('FilterPeriodTimes');
				$this->load->library('FilterPeoples');

    }

    private $head_topic_label           = 'Dashboard';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
				$data['year_th'] = 'ปี พ.ศ '.(date('Y') + 543);
				$qstr_accidents = array(
					'YEAR(accidents.accident_date)'=>date('Y'),
          'accidents.status !=' => 'disabled'
				);

				$results_accidents = $this->Accidents_model->all($qstr_accidents);
				$data['count_accidents'] = $results_accidents['rows'];
				$data['count_accidents_morning'] = $this->filterperiodtimes->filter($results_accidents['results'], 'morning', 'period_time');
				$data['count_accidents_afternoon'] = $this->filterperiodtimes->filter($results_accidents['results'], 'afternoon', 'period_time');
				$data['count_accidents_night'] = $this->filterperiodtimes->filter($results_accidents['results'], 'night', 'period_time');

				$results_participate = $this->mapPartitipate($results_accidents['results']);
				$data['count_accidents_students'] = $this->filterpeoples->filter($results_participate, 'student', 'people_type');
				$data['count_accidents_officer'] = $this->filterpeoples->filter($results_participate, 'officer', 'people_type');
				$data['count_accidents_people_inside'] = $this->filterpeoples->filter($results_participate, 'people_inside', 'people_type');
				
				$qstr_break_homes = array(
					'YEAR(date_break)'=>date('Y'),
          'status !=' => 'disabled'
				);

				$results_break_homes = $this->Break_homes_model->all($qstr_break_homes);
				$data['count_break_homes'] = $results_break_homes['rows'];

				$qstr_security_home = array(
					'YEAR(start_date)'=>date('Y'),
          'status !=' => 'disabled'
				);

				$results_security_home = $this->Security_home_model->all($qstr_security_home);
				$data['count_security_home'] = $results_security_home['rows'];

				$qstr_vehicles_forget_key = array(
					'YEAR(date_forget_key)'=>date('Y'),
          'status !=' => 'disabled'
				);

				$results_vehicles_forget_key = $this->Vehicles_forget_key_model->all($qstr_vehicles_forget_key);
				$data['count_vehicles_forget_key'] = $results_vehicles_forget_key['rows'];
				$data['count_vehicles_forget_key_morning'] = $this->filterperiodtimes->filter($results_vehicles_forget_key['results'], 'morning', 'period_time');
				$data['count_vehicles_forget_key_afternoon'] = $this->filterperiodtimes->filter($results_vehicles_forget_key['results'], 'afternoon', 'period_time');
				$data['count_vehicles_forget_key_night'] = $this->filterperiodtimes->filter($results_vehicles_forget_key['results'], 'night', 'period_time');
				$data['count_vehicles_forget_key_students'] = $this->filterpeoples->filter($results_vehicles_forget_key['results'], 'student', 'people_type');
				$data['count_vehicles_forget_key_officer'] = $this->filterpeoples->filter($results_vehicles_forget_key['results'], 'officer', 'people_type');
				$data['count_vehicles_forget_key_staff'] = $this->filterpeoples->filter($results_vehicles_forget_key['results'], 'staff', 'people_type');
        $data['count_vehicles_forget_key_officer'] += $data['count_vehicles_forget_key_staff'];
        $data['count_vehicles_forget_key_people_outside'] = $this->filterpeoples->filter($results_vehicles_forget_key['results'], 'people_outside', 'people_type');

        $qstr_break_motorcycle_pad = array(
					'YEAR(date_break)'=>date('Y'),
          'status !=' => 'disabled'
        );
        
        $results_break_motorcycle_pad = $this->Break_motorcycle_pad_model->all($qstr_break_motorcycle_pad);
        $data['count_break_motorcycle_pad'] = $results_break_motorcycle_pad['rows'];
        $data['count_break_motorcycle_pad_morning'] = $this->filterperiodtimes->filter($results_break_motorcycle_pad['results'], 'morning', 'period_time');
				$data['count_break_motorcycle_pad_afternoon'] = $this->filterperiodtimes->filter($results_break_motorcycle_pad['results'], 'afternoon', 'period_time');
        $data['count_break_motorcycle_pad_night'] = $this->filterperiodtimes->filter($results_break_motorcycle_pad['results'], 'night', 'period_time');
        
				$data['count_break_motorcycle_pad_students'] = $this->filterpeoples->filter($results_break_motorcycle_pad['results'], 'student', 'people_type');
				$data['count_break_motorcycle_pad_officer'] = $this->filterpeoples->filter($results_break_motorcycle_pad['results'], 'officer', 'people_type');
				$data['count_break_motorcycle_pad_people_inside'] = $this->filterpeoples->filter($results_break_motorcycle_pad['results'], 'people_inside', 'people_type');
        $data['count_break_motorcycle_pad_staff'] = $this->filterpeoples->filter($results_break_motorcycle_pad['results'], 'staff', 'people_type');
        
        $data['count_break_motorcycle_pad_officer'] += ($data['count_break_motorcycle_pad_staff'] + $data['count_break_motorcycle_pad_people_inside']);
        $data['count_break_motorcycle_pad_people_outside'] = $this->filterpeoples->filter($results_break_motorcycle_pad['results'], 'people_outside', 'people_type');


				$qstr_student_do_not_wear_helmet = array(
					'YEAR(inspect_date)'=>date('Y'),
          'status !=' => 'disabled'
				);

				$results_student_do_not_wear_helmet = $this->Student_do_not_wear_helmet_model->all($qstr_student_do_not_wear_helmet);
        $data['count_student_do_not_wear_helmet'] = $results_student_do_not_wear_helmet['rows'];
        
        // echo "<pre>", print_r($data['count_break_motorcycle_pad_afternoon']); exit();
        $data['content'] = 'dashboard_admin';
        $this->load->view('template_layout', $data);
		}
		
		private function mapPartitipate($data) {
			$results = array();
			foreach ($data as $key => $value) {
				foreach ($value['results_participate'] as $key1 => $value1) {
					array_push($results, $value1);
				}
			}

			return $results;
		}
}
