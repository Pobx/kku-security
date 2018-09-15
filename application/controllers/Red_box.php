<?php
// defined('BASEPATH') || exit('No direct script access allowed');

class Red_box extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Redbox_model');
        $this->load->library('Date_libs');
        $this->load->library('FilterBarChartData');
    }

    private $head_topic_label           = 'จุดตรวจตู้แดง ';
    private $head_sub_topic_label_table = 'รายการ จุดตรวจตู้แดง ';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล จุดตรวจตู้แดง ';
    private $header_columns             = array('ลำดับ', 'ชื่อ - สกุล', 'โซน', 'ชื่อตู้แดง', 'วันที่บันทึก', 'เวลา', 'สถานะ', 'หมายเหตุ', 'แก้ไข', 'ลบ');
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';
    

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('red_box/form_store');
        $data['link_go_to_remove'] = site_url('red_box/remove');
        $data['header_columns'] = $this->header_columns;

        $qstr = array(
          'YEAR(checked_datetime)'=>date('Y'),
          // 'redbox_positions.status !=' => 0
        );

        $results = $this->Redbox_model->all($qstr);
        $data['results'] = $results['results'];

        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'checked_datetime_en');
        $data['fields'] = $results['fields'];
        $data['content'] = 'red_box/red_box_table';
        
        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        $id = $this->uri->segment(3);
        $data = $this->find($id);
        $data['redbox_lists'] = $this->Redbox_model->get_redbox_postion_list();
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        $data['link_back_to_table'] = site_url('red_box');
        $data['form_submit_data_url'] = site_url('red_box/store');

        $data['content'] = 'red_box/red_box_form_store';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        $inputs = $this->input->post();
        $d=strtotime("now");
        $inputs['checked_datetime'] =date("Y-m-d H:i:s", $d);
        $inputs['checker_id'] = '2';

        // echo "<pre>", print_r($inputs); exit();
        $results = $this->Redbox_model->store($inputs);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('red_box');
    }

    private function find($id = 0)
    {
        $results = $this->Redbox_model->find($id);
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
        $results = $this->Redbox_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('red_box');
    }
}
