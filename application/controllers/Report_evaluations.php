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

        $results = $this->Evaluation_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'inspect_date_en');
        $data['count_male'] = $this->filterpeoples->filter($data['results'], 'male', 'gender');
        $data['count_female'] = $this->filterpeoples->filter($data['results'], 'female', 'gender');

        $data['count_less_than_20'] = $this->filterpeoples->filter($data['results'], 'less_than_20', 'age');
        $data['count_between_21_and_25'] = $this->filterpeoples->filter($data['results'], 'between_21_and_25', 'age');
        $data['count_between_26_and_30'] = $this->filterpeoples->filter($data['results'], 'between_26_and_30', 'age');
        $data['count_between_31_and_35'] = $this->filterpeoples->filter($data['results'], 'between_31_and_35', 'age');
        $data['count_between_36_and_40'] = $this->filterpeoples->filter($data['results'], 'between_36_and_40', 'age');
        $data['count_between_41_and_45'] = $this->filterpeoples->filter($data['results'], 'between_41_and_45', 'age');
        $data['count_between_46_and_50'] = $this->filterpeoples->filter($data['results'], 'between_46_and_50', 'age');
        $data['count_more_than_50'] = $this->filterpeoples->filter($data['results'], 'more_than_50', 'age');
        $data['count_all_age'] = $results['rows'];
        
        // นักเรียน        
        $data['count_student'] = $this->filterpeoples->filter($data['results'], 1, 'personal_id');
        // นักศึกษา
        $data['count_student'] = $this->filterpeoples->filter($data['results'], 2, 'personal_id');
        // ข้าราชการ/พนักงาน/ลูกจ้าง
        $data['count_student2'] = $this->filterpeoples->filter($data['results'], 3, 'personal_id');
        // อาจารย์
        $data['count_teacher'] = $this->filterpeoples->filter($data['results'], 4, 'personal_id');
        // คณะผู้บริหาร
        $data['count_management'] = $this->filterpeoples->filter($data['results'], 5, 'personal_id');
        // บุคคลทั่วไป
        $data['count_general_people'] = $this->filterpeoples->filter($data['results'], 6, 'personal_id');
        // บุคลากรภายใน
        $data['count_inside_people'] = $this->filterpeoples->filter($data['results'], 7, 'personal_id');
        // บุคลากรภายนอก
        $data['count_outside_people'] = $this->filterpeoples->filter($data['results'], 8, 'personal_id');


        $data['content'] = 'report_evaluations_table';
        
        echo "<pre>", print_r($data); exit();
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

        $results = $this->Evaluation_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_redboxs_table', $data);

    }

}