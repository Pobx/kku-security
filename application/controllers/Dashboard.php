<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_model');
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
				

				// echo "<pre>", print_r($results_participate); exit();
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
