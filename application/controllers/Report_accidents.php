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
        $data['link_excel_monthly_summary'] = site_url('report_accidents/export_excel_monthly_summary');
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

        $data['count_morning'] = $this->filterperiodtimes->filter($results['results'], 'morning', 'period_time');
        $data['count_afternoon'] = $this->filterperiodtimes->filter($results['results'], 'afternoon', 'period_time');
        $data['count_night'] = $this->filterperiodtimes->filter($results['results'], 'night', 'period_time');

        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'accident_date_en');
        $data['fields'] = $results['fields'];
        $data['content'] = 'report_accidents_table';

        // echo "<pre>", print_r($results['results']); exit();
        $this->load->view('template_layout', $data);
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

    public function export_excel_monthly_summary()
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

    // private function set_values_summary_months($results) {
    //   $data['count_morning'] = $this->filterperiodtimes->filter($results, 'morning', 'period_time');
    //   $data['count_afternoon'] = $this->filterperiodtimes->filter($results, 'afternoon', 'period_time');
    //   $data['count_night'] = $this->filterperiodtimes->filter($results, 'night', 'period_time');

    //   return $data;
    // }

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
