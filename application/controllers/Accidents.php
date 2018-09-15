<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Accidents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_model');
        $this->load->model('Accidents_participate_model');
        $this->load->model('Accidents_place_model');
        $this->load->model('Accidents_cause_model');

        $this->load->library('Date_libs');
        $this->load->library('FilterBarChartData');
    }

    private $head_topic_label           = 'สถิติอุบัติเหตุ';
    private $head_sub_topic_label_table = 'รายการ สถิติอุบัติเหตุ';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล สถิติอุบัติเหตุ';
    private $head_topic_participate_label  = 'รายการ ผู้ประสบเหตุ / คู่กรณี';
    
    private $header_columns             = array('วันที่', 'ช่วงเวลา', 'สถานที่เกิดเหตุ', 'รถยนต์', 'รถจักรยานยนต์', 'รถที่เกิดเหตุ', 'สาเหตุ', 'บาดเจ็บ', 'เสียชีวิต', 'ผู้ประสบเหตุ / คู่กรณี', 'หน่วยงาน', 'บุคลากร', 'นักศึกษา', 'บุคคลภายใน', 'แก้ไข', 'ลบ');
    private $header_columns_participate = array('ผู้ประสบเหตุ / คู่กรณี', 'ประเภทบุคลากร', 'บาดเจ็บ / เสียชีวิต', 'ชื่อ - สกุล', 'หน่วยงาน', 'ประเภท', 'ทะเบียนรถ', 'สี', 'ยี่ห้อ', 'รุ่น', 'ลบ');
    
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('accidents/form_store');
        $data['link_go_to_remove'] = site_url('accidents/remove');
        $data['header_columns'] = $this->header_columns;

        $qstr = array(
          'YEAR(accidents.accident_date)'=>date('Y'),
          'accidents.status !=' => 'disabled'
        );

        $results = $this->Accidents_model->all($qstr);

        $data['results'] = $results['results'];
        
        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'accident_date');
        $data['fields'] = $results['fields'];
        $data['content'] = 'accidents_table';

        // echo "<pre>", print_r($data_monthly); exit();
        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        $id = $this->uri->segment(3);
        $data = $this->find($id); 
        $data['accident_id'] = $id;
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        $data['head_topic_participate_label'] = $this->head_topic_participate_label;
        $data['header_columns_participate'] = $this->header_columns_participate;
        $data['link_back_to_table'] = site_url('accidents');
        $data['form_submit_data_url'] = site_url('accidents/store');
        $data['form_submit_data_url_modal'] = site_url('accidents/store_participate');
        $data['link_go_to_participate_remove'] = site_url('accidents/remove_participate/'.$id);
        $qstr = array(
          'status ='=>'active'
        );

        $accident_place = $this->Accidents_place_model->all($qstr);
        $data['accident_place'] = $accident_place['results'];

        $accident_causes = $this->Accidents_cause_model->all($qstr);
        $data['accident_causes'] = $accident_causes['results'];

        $qstr['accident_id'] = $id;
        $accident_participate = $this->Accidents_participate_model->all($qstr);
        $data['accident_participate'] = $accident_participate['results'];
        
        $data['content'] = 'accidents_form_store';

        // new data temp 
        $data['accident_time'] ='';
        $data['assets_name'] = '';
        $data['assets_amount'] = '';
        $data['assets_remark'] = '';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        $inputs = $this->input->post();

        $inputs['accident_date'] = $this->date_libs->set_date_th($inputs['accident_date']);
        if (isset($inputs['chk_place']) && $inputs['chk_place'] == 'checked_new_place') {
          $inputs['place'] = $this->create_new_place($inputs);
        }

        if (isset($inputs['chk_accident_cause']) && $inputs['chk_accident_cause'] == 'checked_new_accident_cause') {
          $inputs['accident_cause'] = $this->create_accident_cause($inputs);
        }

        unset($inputs['chk_place'], $inputs['place_text'], $inputs['chk_accident_cause'], $inputs['accident_cause_text']);
        $results = $this->Accidents_model->store($inputs);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        // redirect('accidents');
        redirect('accidents/form_store/'.$results['lastID']);
    }

    public function store_participate() {
        $inputs = $this->input->post();
        $results = $this->Accidents_participate_model->store($inputs);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('accidents/form_store/'.$inputs['accident_id']);
    }

    private function create_new_place($inputs) {
      $data = array(
        'id'=>'',
        'name'=>$inputs['place_text'],
        'status'=>'active'
      );

      $results = $this->Accidents_place_model->store($data);
      return $results['lastID'];
    }

    private function create_accident_cause($inputs) {
      $data = array(
        'id'=>'',
        'name'=>$inputs['accident_cause_text'],
        'status'=>'active'
      );

      $results = $this->Accidents_cause_model->store($data);
      return $results['lastID'];
    }

    private function find($id = 0)
    {
        $results = $this->Accidents_model->find($id);
        $values = $results['results'];
        $fields = $results['fields'];
        $rows = $results['rows'];
        $data = array();

        foreach ($fields as $key => $value)
        {
            if ($rows <= 0)
            {
                $data[$value] = '';
            }
            else
            {
                $data[$value] = $values->$value;
            }
        }

        return $data;
    }

    public function remove()
    {
        $id = $this->uri->segment(3);
        $results = $this->Accidents_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('accidents');
    }

    public function remove_participate() {
        $accident_id = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        
        $results = $this->Accidents_participate_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);
        $redirect_page = 'accidents/form_store/';
        redirect($redirect_page.$accident_id);
    }
}
