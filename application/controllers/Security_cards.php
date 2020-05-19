<?php
// defined('BASEPATH') || exit('No direct script access allowed');

class Security_cards extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Security_cards_model');
        $this->load->library('Date_libs');
    }

    private $head_topic_label           = 'ทะเบียนการจัดทําบัตรผ่านเข้า-ออก ';
    private $head_sub_topic_label_table = 'รายการ ทะเบียนการจัดทําบัตรผ่านเข้า-ออก ';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล ทะเบียนการจัดทําบัตรผ่านเข้า-ออก ';
    private $header_columns             = array(
        ['เลขที่บัตร', 'card_num'], 
        ['ชื่อ - สกุล', 'name_lastname'],
        ['ตําแหน่ง', 'position'],
        ['สังกัด','unit'],
        ['เบอร์ติดต่อ', 'phone'],
        ['ทะเบียน', 'platenumber'], 
        ['จังหวัด', 'province'],
        ['ยี่ห้อ', 'brand'],
        ['สี', 'color'],
        ['วันออกบัตร', 'commit_date'],
        ['วันหมดอายุ', 'expire_date'], 
        ['แก้ไข','edit'],
        ['ลบ', 'delete']);
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('security_cards/form_store');
        $data['link_go_to_remove'] = site_url('security_cards/remove');
        $data['header_columns'] = $this->header_columns;

        $qstr = array('status !=' => 'disabled');
        $limit = 10;
        $results = $this->Security_cards_model->all($qstr, $limit);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];
        $data['content'] = 'security_cards_table';

        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        $id = $this->uri->segment(3);
        $data = $this->find($id);

        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        $data['link_back_to_table'] = site_url('security_cards');
        $data['form_submit_data_url'] = site_url('security_cards/store');

        $data['content'] = 'security_cards_form_store';

        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        $inputs = $this->input->post();
        $inputs['issue_date'] = $this->date_libs->set_date_th($inputs['issue_date']);
        $inputs['expire_date'] = $this->date_libs->set_date_th($inputs['expire_date']);
        
        $results = $this->Security_cards_model->store($inputs);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('security_cards');
    }

    private function find($id = 0)
    {
        $results = $this->Security_cards_model->find($id);
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
        $results = $this->Security_cards_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('security_cards');
    }

    private function upload($prop)
    {
        $config['upload_path'] = $prop['upload_path'];
        $config['allowed_types'] = $prop['allowed_types'];
        $config['file_name'] = date('YmdHis');

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload($prop['txt_upload']))
        {
            $data = $this->upload->data();
            $file_name = $data['file_name'];
        }
        else
        {
            // echo $this->upload->display_errors(); exit();
            $file_name = 'not-file';
        }
        return $file_name;
    }
}
