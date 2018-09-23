<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Report_accidents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_model');
        $this->load->model('Accidents_place_model');
        $this->load->library('Date_libs');
        $this->load->library('FilterBarChartData');
        $this->load->library('FilterPeriodTimes');
        $this->load->library('FilterPeoples');
        $this->load->library('FilterVehicles');
    }

    private $head_topic_label                     = 'สถิติอุบัติเหตุ';
    private $head_sub_topic_label_table           = 'รายงาน สถิติอุบัติเหตุ';
    private $header_columns                       = array('วันที่', 'ช่วงเวลา', 'สถานที่เกิดเหตุ', 'รถยนต์', 'รถจักรยานยนต์', 'รถที่เกิดเหตุ', 'สาเหตุ', 'บาดเจ็บ', 'เสียชีวิต', 'ผู้ประสบเหตุ / คู่กรณี', 'หน่วยงาน', 'บุคลากร', 'นักศึกษา', 'บุคคลภายใน');
    private $header_excel_monthly_summary_columns = array('ลำดับ', 'สถานที่เกิดเหตุ', 'จำนวน(ครั้ง)');

    public function index()
    {
        $inputs = $this->input->post();
        $data['start_date'] = (isset($inputs['start_date']) ? $inputs['start_date'] : $this->date_libs->get_date_th(date('Y-m-d')));
        $data['end_date'] = (isset($inputs['end_date']) ? $inputs['end_date'] : $this->date_libs->get_date_th(date('Y-m-d')));

        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['header_columns'] = $this->header_columns;
        $data['form_search_data_url'] = site_url('report_accidents');
        $data['link_excel_monthly_summary_place_of_months'] = site_url('report_accidents/export_excel_summary_place_of_months');
        $data['link_excel_monthly_summary_accidents_type_of_months'] = site_url('report_accidents/excel_summary_accidents_type_of_monthss');
        
        $data['link_excel_monthly'] = site_url('report_accidents/export_excel');

        $qstr = array(
            'accidents.accident_date >=' => $this->date_libs->set_date_th($data['start_date']),
            'accidents.accident_date <=' => $this->date_libs->set_date_th($data['end_date']),
            'accidents.status !='        => 'disabled',
        );

        $sess_inputs = array(
            'start_date' => $this->date_libs->set_date_th($data['start_date']),
            'end_date'   => $this->date_libs->set_date_th($data['end_date']),
        );

        $this->session->set_userdata($sess_inputs);

        $results = $this->Accidents_model->all($qstr);
        $data['results'] = $results['results'];

        $data['count_accidents_morning'] = $this->filterperiodtimes->filter($results['results'], 'morning', 'period_time');
        $data['count_accidents_afternoon'] = $this->filterperiodtimes->filter($results['results'], 'afternoon', 'period_time');
        $data['count_accidents_night'] = $this->filterperiodtimes->filter($results['results'], 'night', 'period_time');

        $results_participate = $this->mapPartitipate($results['results']);
        $data['count_accidents_students'] = $this->filterpeoples->filter($results_participate, 'student', 'people_type');
        $data['count_accidents_officer'] = $this->filterpeoples->filter($results_participate, 'officer', 'people_type');
        $data['count_accidents_people_inside'] = $this->filterpeoples->filter($results_participate, 'people_inside', 'people_type');
        $data['count_accidents_people_inside'] += $data['count_accidents_officer'];
        $data['count_accidents_people_outside'] = $this->filterpeoples->filter($results_participate, 'people_outside', 'people_type');
        $data['count_accidents_injury'] = $this->filterpeoples->filter($results_participate, 'injury', 'injury_type');
        $data['count_accidents_injury_hard'] = $this->filterpeoples->filter($results_participate, 'injury_hard', 'injury_type');
        $data['count_accidents_injury'] += $data['count_accidents_injury_hard'];
        $data['count_accidents_dead'] = $this->filterpeoples->filter($results_participate, 'dead', 'injury_type');
        
        $data['count_accidents_car'] = $this->filtervehicles->filter($results_participate, 'car', 'car_type');
        $data['count_accidents_motorcycle'] = $this->filtervehicles->filter($results_participate, 'motorcycle', 'car_type');

        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'accident_date_en');
        $data['barchart_values_accidents_summary_of_months'] = $this->set_barchart_values_points($data);
        $data['content'] = 'report_accidents_table';
        
        // $data['fields'] = $results['fields'];
        // echo "<pre>", print_r($data['barchart_values_accidents_summary_of_months']); exit();
        $this->load->view('template_layout', $data);
    }

    private function set_barchart_values_points($data)
    {
        $results = array(
            'data'            => array(
              $data['count_accidents_morning'], $data['count_accidents_afternoon'], $data['count_accidents_night'],
              $data['count_accidents_students'], $data['count_accidents_people_inside'], $data['count_accidents_people_outside'],
              $data['count_accidents_car'], $data['count_accidents_motorcycle'], 
              $data['count_accidents_injury'], $data['count_accidents_dead'], 
            ),
            'labels'          => array(
              'ผลัดเช้า', 'ผลัดบ่าย', 'ผลัดดึก', 
              'นักศึกษา', 'บุคลากร', 'บุคคลภายนอก', 
              'รถจักรยานยนต์', 'รถยนต์', 
              'บาดเจ็บ', 'เสียชีวิต'
            ),
            'type'            => 'bar',
            'dataset_label'   => 'ข้อมูล',
            'backgroundColor' => '#0073b7',
        );

        return json_encode($results);
    }

    public function export_excel()
    {
        $data['header_columns'] = $this->header_columns;
        $inputs = $this->session->userdata();
        $qstr = array(
            'accidents.accident_date >=' => $inputs['start_date'],
            'accidents.accident_date <=' => $inputs['end_date'],
            'accidents.status !='        => 'disabled',
        );

        $results = $this->Accidents_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_accidents_table', $data);
    }

    public function export_excel_summary_place_of_months()
    {
        $data['header_columns'] = $this->header_excel_monthly_summary_columns;
        $inputs = $this->session->userdata();

        $qstr = array(
            'accidents.accident_date >=' => $inputs['start_date'],
            'accidents.accident_date <=' => $inputs['end_date'],
            'accidents.status !='        => 'disabled',
        );

        $distinct_place = $this->Accidents_model->distinct_place($qstr);
        $data['place'] = $distinct_place['results'];

        $results = array();
        foreach ($data['place'] as $key => $value)
        {
            $qstr['place'] = $value['place'];
            $results_count_accidents = $this->Accidents_model->count_accidents($qstr);

            $qstr_place = array('id' => $value['place']);
            $results_place = $this->Accidents_place_model->all($qstr_place);
            $place_name = (isset($results_place['results'][0]['name']) ? $results_place['results'][0]['name'] : '');

            $results[] = array(
                'results_count_accidents' => $results_count_accidents['rows'],
                'place_name'              => $place_name,
            );
        }

        $data['results'] = $results;
        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_accidents_monthly_summary_table', $data);
    }

    public function excel_summary_accidents_type_of_monthss() 
    {

    }

    private function mapPartitipate($data)
    {
        $results = array();
        foreach ($data as $key => $value)
        {
            foreach ($value['results_participate'] as $key1 => $value1)
            {
                array_push($results, $value1);
            }
        }

        return $results;
    }

}
