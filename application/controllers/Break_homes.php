<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Break_homes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Break_homes_model');
        $this->load->library('Date_libs');
    }

    private $head_topic_label           = 'สถิติการงัดที่พักอาศัย';
    private $head_sub_topic_label_table = 'รายการสถิติการงัดที่พักอาศัย';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล สถิติการงัดที่พักอาศัย';
    private $header_columns             = array(['วันที่','date_break'], ['ชื่อ - สกุล','victim_name'] , ['สถานที่เกิดเหตุ','address'], ['ทรัพย์สินที่เสียหาย','assets_loses'], ['หมายเหตุ','remark'], ['แก้ไข','edit'], ['ลบ','delete']);
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('break_homes/form_store');
        $data['link_go_to_remove'] = site_url('break_homes/remove');
        $data['header_columns'] = $this->header_columns;

        $qstr = array('status !=' => 'disabled');
        $limit = 10;
        $results = $this->Break_homes_model->all($qstr, $limit);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];
        $data['content'] = 'break_homes_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        $id = $this->uri->segment(3);

        $data = $this->find($id);
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        $data['link_back_to_table'] = site_url('break_homes');
        $data['form_submit_data_url'] = site_url('break_homes/store');

        $data['content'] = 'break_homes_form_store';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        $inptus = $this->input->post();
        $inptus['date_break'] = $this->date_libs->set_date_th($inptus['date_break']);
        $results = $this->Break_homes_model->store($inptus);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('break_homes');
    }

    private function find($id = 0)
    {
        $results = $this->Break_homes_model->find($id);
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
        $results = $this->Break_homes_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('break_homes');
    }

    public function get_data_by_column(){
        $value = $this->input->get("value");
        $column =  $this->input->get("column");
        $like_query_string = array($column, $value);
        $results = $this->Break_homes_model->findByColumn($like_query_string);
        
        $text = '';
        $i=1;
        // foreach($results['results'] as $result){
            $text .= "<tr>
                <td>".$i++."</td>
                <td>".$results['results']->date_break."</td>
                <td>".$results['results']->victim_name."</td>
                <td>".$results['results']->address."</td>
                <td>".$results['results']->assets_loses."</td>
                <td>".$results['results']->remark."</td>
                
            </tr>";
        // }
        echo $text;
        // print_r($results['rows']);
    }
}
