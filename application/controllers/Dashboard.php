<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_model');
        $this->load->library('Date_libs');
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

				// echo $results_accidents['rows']; exit();
        $data['content'] = 'dashboard_admin';
        $this->load->view('template_layout', $data);
    }
}
