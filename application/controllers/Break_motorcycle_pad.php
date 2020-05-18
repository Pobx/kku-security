<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Break_motorcycle_pad extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Break_motorcycle_pad_model');
        $this->load->library('Date_libs');
        $this->load->library('FilterBarChartData');
    }

    private $head_topic_label           = 'สาเหตุงัดเบาะรถจักยานยนต์ ';
    private $head_sub_topic_label_table = 'รายการ สาเหตุงัดเบาะรถจักยานยนต์ ';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล สาเหตุงัดเบาะรถจักยานยนต์ ';
    private $header_columns             = array('ช่วงเวลา', 'วันที่', 'ชื่อ - สกุล', 'สังกัดหน่วยงาน/คณะ', 'สถานที่เกิดเหตุ', 'รายการของที่สูญหาย', 'หมายเหตุ', 'สถานะ', 'ดูเพิ่มเติม', 'แก้ไข', 'ลบ');
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('break_motorcycle_pad/form_store');
        $data['link_go_to_remove'] = site_url('break_motorcycle_pad/remove');
        $data['header_columns'] = $this->header_columns;

        $qstr = array(
          'YEAR(date_break)'=>date('Y'),
          'status !=' => 'disabled'
        );

        $results = $this->Break_motorcycle_pad_model->all($qstr);
        $data['results'] = $results['results'];

        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'date_break_en');
        $data['fields'] = $results['fields'];
        $data['content'] = 'break_motorcycle_pad/break_motocycle_pad_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        $id = $this->uri->segment(3);

        $data = $this->find($id);
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        $data['link_back_to_table'] = site_url('break_motorcycle_pad');
        $data['form_submit_data_url'] = site_url('break_motorcycle_pad/store');

        $data['content'] = 'break_motorcycle_pad/break_motocycle_pad_form_store';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        $inputs = $this->input->post();
        $inputs['date_break'] = $this->date_libs->set_date_th($inputs['date_break']);
        $inputs['date_break'].=' '.$inputs['time_break'];
        unset($inputs['time_break']);
        // echo "<pre>", print_r($inputs); exit();
        $results = $this->Break_motorcycle_pad_model->store($inputs);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('break_motorcycle_pad');
    }

    private function find($id = 0)
    {
        $results = $this->Break_motorcycle_pad_model->find($id);
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
        $results = $this->Break_motorcycle_pad_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('break_motorcycle_pad');
    }
    public function get_break_pad_detail(){
      $break_pad_id = $this->uri->segment(3);

      $qstr = array(
        'break_motorcycle_pad.id'  => $break_pad_id
      );
      $results = $this->Break_motorcycle_pad_model->all($qstr);
    //   print_r($results);

      $value = $results['results'];
      if($value[0]['people_type'] == "officer"){
        $value[0]['people_type'] = "บุคลากร";
      }elseif($value[0]['people_type'] == "student"){
        $value[0]['people_type'] ="นักศึกษา";
      }elseif($value[0]['people_type'] == "people_inside"){
        $value[0]['people_type'] = "บุคคลภายใน";
      }elseif($value[0]['people_type'] == "people_outside"){
        $value[0]['people_type'] = "บุคคลภายนอก";
      }elseif($value[0]['people_type'] == "staff"){
        $value[0]['people_type'] = "พนักงาน";
      }
      echo json_encode($value); 
    //   $text = '
    // <div class="col-md">
        
    //     <div class="box box-widget widget-user-2">
            
    //         <div class="widget-user-header bg-aqua-active">
    //             <div class="widget-user-image">
    //                 <img class="img-circle" src="../dist/img/woman.png" alt="User Avatar">
    //             </div>
                
    //             <h3 class="widget-user-username">'.$value[0]['victim_name'].'</h3>
    //             <h5 class="widget-user-desc">'.$value[0]['people_type'].'</h5>
    //         </div>
    //         <div class="box-footer no-padding">
    //             <ul class="nav nav-stacked">
    //                 <li>
    //                     <h3><img class="img-circle" src="../dist/img/interface.png" width="25" alt="Lost-items Icon"> รายการของที่สูญหาย</h3>
    //                     <div class="">'.$value[0]['assets_loses'].'</div>
    //                 </li>
    //                 <li>
    //                     <h3><img class="img-circle" src="../dist/img/letter.png" width="25" alt="Lost-items Icon"> สถานที่เกิดเหตุ</h3>
    //                     <div class="">'.$value[0]['place'].'</div>
    //                 </li>
    //                 <li>
    //                     <h3><img class="img-circle" src="../dist/img/hour.png" width="25" alt="Lost-items Icon"> วันที่</h3>
    //                     <div class="">'.$value[0]['date_break'].'</div>
    //                 </li>
    //             </ul>

    //         </div>
    //     </div>
        
    // </div>';
    // echo $text;
    }
}
