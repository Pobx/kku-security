<?php
// defined('BASEPATH') || exit('No direct script access allowed');

class Cctv_request_log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Cctv_request_log_model');
        $this->load->model('Cctv_events_model');
        
        $this->load->library('Date_libs');
    }

    private $head_topic_label           = 'สถิติขอความอนุเคราะห์ดูภาพเหตุการณ์ ';
    private $head_sub_topic_label_table = 'รายการ สถิติขอความอนุเคราะห์ดูภาพเหตุการณ์ ';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล สถิติขอความอนุเคราะห์ดูภาพเหตุการณ์ ';
    private $header_columns             = array('วันที่', 'ประเภทบุคลากร', 'เหตุการณ์', 'สำเนาบันทึกแจ้งความประจำวัน', 'สำเนาบัตรประจำตัวนักศึกษา/สำเนาบัตรประชาชน/สำเนาบัตรข้าราชการ	', 'สำเนาบัตรอื่นๆ ที่หน่วยงานราชการออกให้', 'แก้ไข', 'ลบ');
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('cctv_request_log/form_store');
        $data['link_go_to_remove'] = site_url('cctv_request_log/remove');
        $data['header_columns'] = $this->header_columns;

        $qstr = array('cctv_request_log.status !=' => 'disabled');
        $results = $this->Cctv_request_log_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];
        $data['content'] = 'cctv_request_log_table';

        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        $id = $this->uri->segment(3);
        $data = $this->find($id);
        
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        $data['link_back_to_table'] = site_url('cctv_request_log');
        $data['form_submit_data_url'] = site_url('cctv_request_log/store');

        $qstr = array('status'=>'active');
        $results_cctv_event = $this->Cctv_events_model->all($qstr);
        $data['results_cctv_event'] = $results_cctv_event['results'];
        
        $data['content'] = 'cctv_request_log_form_store';

        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        $inputs = $this->input->post();
        $inputs['request_date'] = $this->date_libs->set_date_th($inputs['request_date']);
        $prop=array(
          'upload_path'=>'./assets/files/'
          , 'allowed_types'=>'*'
          , 'txt_upload'=>'link_copy_polic_doc'
        );

        $inputs['link_copy_polic_doc']=$this->upload($prop);
        
        $prop['txt_upload'] = 'link_copy_gov_doc';
        $inputs['link_copy_gov_doc']=$this->upload($prop);

        $prop['txt_upload'] = 'link_copy_other_gov_doc';
        $inputs['link_copy_other_gov_doc']=$this->upload($prop);

        if ($inputs['link_copy_polic_doc'] =='not-file') {
          unset($inputs['link_copy_polic_doc']);
        }

        if ($inputs['link_copy_gov_doc'] =='not-file') {
          unset($inputs['link_copy_gov_doc']);
        }

        if ($inputs['link_copy_other_gov_doc'] =='not-file') {
          unset($inputs['link_copy_other_gov_doc']);
        }

        $results = $this->Cctv_request_log_model->store($inputs);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('cctv_request_log');
    }

    private function find($id = 0)
    {
        $results = $this->Cctv_request_log_model->find($id);
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
        $results = $this->Cctv_request_log_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('cctv_request_log');
    }

    private function upload($prop)
    {
      $config['upload_path']=$prop['upload_path'];
          $config['allowed_types']=$prop['allowed_types'];
          $config['file_name']=date("YmdHis");
  
          $this->load->library('upload');
          $this->upload->initialize($config);
  
          if ($this->upload->do_upload($prop['txt_upload'])) {
              $data=$this->upload->data();
              $file_name=$data['file_name'];
          }else {
              // echo $this->upload->display_errors(); exit();
              $file_name = 'not-file';
          }
          return $file_name;
    }
}
