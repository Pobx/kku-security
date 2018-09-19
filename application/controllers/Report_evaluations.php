<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Report_evaluations extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Evaluation_model');
        $this->load->library('Date_libs');
        $this->load->library('FilterBarChartData');
        $this->load->library('FilterPeoples');
    }

    private $head_topic_label           = 'สถิติกล่องแดง';
    private $head_sub_topic_label_table = 'รายงาน สถิติกล่องแดง';
    private $header_columns             = array('ชื่อ - สกุล', 'โซน', 'ชื่อตู้แดง', 'วันที่บันทึก', 'เวลา', 'สถานะ', 'หมายเหตุ');

    public function index()
    {
        $inputs = $this->input->post();
        $data['start_date'] = '01/01/2561';
        $data['end_date'] = '01/01/2562';
        
        // $data['start_date'] = (isset($inputs['start_date']) ? $inputs['start_date'] : $this->date_libs->get_date_th(date('Y-m-d')));
        // $data['end_date'] = (isset($inputs['end_date']) ? $inputs['end_date'] : $this->date_libs->get_date_th(date('Y-m-d')));

        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['header_columns'] = $this->header_columns;
        $data['form_search_data_url'] = site_url('report_evaluations');
        $data['link_excel'] = site_url('report_evaluations/export_excel');

        $qstr = array(
            'DATE(evaluations.eval_date) >=' => $this->date_libs->set_date_th($data['start_date']),
            'DATE(evaluations.eval_date) <=' => $this->date_libs->set_date_th($data['end_date']),
            'evaluations.status'                => 'active',
        );

        $sess_inputs = array(
            'start_date' => $this->date_libs->set_date_th($data['start_date']),
            'end_date'   => $this->date_libs->set_date_th($data['end_date']),
        );

        $this->session->set_userdata($sess_inputs);

        $results = $this->Redbox_inspect_transaction_model->all($qstr);
        $data['results'] = $results['results'];

        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'inspect_date_en');
        $data['fields'] = $results['fields'];
        $data['content'] = 'report_evaluations_table';

        echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function export_excel()
    {
        $data['header_columns'] = $this->header_columns;
        $inputs = $this->session->userdata();
        $qstr = array(
            'DATE(redbox_inspect_transaction.inspect_date) >=' => $inputs['start_date'],
            'DATE(redbox_inspect_transaction.inspect_date) <=' => $inputs['end_date'],
            'redbox_inspect_transaction.status'                => 'active',
        );

        $results = $this->Redbox_inspect_transaction_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_redboxs_table', $data);

    }

}
