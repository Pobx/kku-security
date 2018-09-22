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

    private $head_topic_label           = 'ข้อมูลสถานทั่วไปของผู้ตอบแบบสอบถาม';
    private $head_sub_topic_label_table = 'รายงาน ข้อมูลสถานทั่วไปของผู้ตอบแบบสอบถาม';
    private $header_columns             = array('วันที่', 'เพศ', 'ช่วงอายุ', 'สังกัด', 'หมายเหตุ');

    public function index()
    {
        $inputs = $this->input->post();
        $data['my_pie_chart'] = 'on';
        $data['reports_evaluations_dispaly'] = 'on';
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
            'evaluations.status'             => 'active',
        );

        $sess_inputs = array(
            'start_date' => $this->date_libs->set_date_th($data['start_date']),
            'end_date'   => $this->date_libs->set_date_th($data['end_date']),
        );

        $this->session->set_userdata($sess_inputs);

        $results = $this->Evaluation_model->all($qstr);
        $data['results'] = $results['results'];
        $data['rows'] = $results['rows'];
        // $data['fields'] = $results['fields'];
        // $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'inspect_date_en');
        $data = $this->summary_counts_for_evaluations_report($data);
        $data['content'] = 'report_evaluations_table';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout', $data);
    }

    public function export_excel()
    {
        $data['header_columns'] = $this->header_columns;
        $inputs = $this->session->userdata();
        $qstr = array(
            'DATE(evaluations.eval_date) >=' => $inputs['start_date'],
            'DATE(evaluations.eval_date) <=' => $inputs['end_date'],
            'evaluations.status'             => 'active',
        );

        $results = $this->Evaluation_model->all($qstr);
        $data['results'] = $results['results'];
        // $data['fields'] = $results['fields'];
        $data['rows'] = $results['rows'];
        $data = $this->summary_counts_for_evaluations_report($data);
        // echo "<pre>", print_r($data); exit();
        $this->load->view('excel_evaluations_table', $data);
    }

    private function set_piechart_values($data)
    {
        $results = array(
            'data'            => array($data['count_between_21_and_25'], $data['count_between_26_and_30'], $data['count_between_31_and_35'], $data['count_between_36_and_40'], $data['count_more_than_50'], $data['count_less_than_20']),
            'backgroundColor' => array('#0073b7', '#ff851b', '#d2d6de', '#f39c12', '#001f3f', '#00a65a'),
            'labels'          => array('21 - 25 ปี', '26 - 30 ปี', '31 - 35 ปี', '36 - 40 ปี', '51 ปี ขึ้นไป', 'ต่ำกว่า 20 ปี'),
        );

        return json_encode($results);
    }

    private function set_barchart_values_status($data)
    {
        $results = array(
            'data'            => array($data['count_gov_officer'], $data['count_student'], $data['count_student2'], $data['count_general_people'], $data['count_teacher']),
            'labels'          => array('ข้าราชการ/พนักงาน/ลูกจ้าง', 'นักเรียน', 'นักศึกษา', 'บุคคลทั่วไป', 'อาจารย์'),
            'type'            => 'horizontalBar',
            'dataset_label'   => 'สถานะ',
            'backgroundColor' => '#0073b7',
        );

        return json_encode($results);
    }

    private function set_barchart_values_points($data)
    {
        $results = array(
            'data'            => array($data['very_good'], $data['good'], $data['normal']),
            'labels'          => array('มากที่สุด', 'มาก', 'ปานกลาง'),
            'type'            => 'bar',
            'dataset_label'   => $data['dataset_label'],
            'backgroundColor' => '#0073b7',
        );

        return json_encode($results);
    }

    private function summary_counts_for_evaluations_report($data)
    {
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
        $data['count_all_age'] = $data['rows'];
        $data['piechart_values_between_ages'] = $this->set_piechart_values($data);

        // นักเรียน
        $data['count_student'] = $this->filterpeoples->filter($data['results'], 1, 'personal_id');
        // นักศึกษา
        $data['count_student2'] = $this->filterpeoples->filter($data['results'], 2, 'personal_id');
        // ข้าราชการ/พนักงาน/ลูกจ้าง
        $data['count_gov_officer'] = $this->filterpeoples->filter($data['results'], 3, 'personal_id');
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
        $data['barchart_values_status'] = $this->set_barchart_values_status($data);

        // ประสิทธิภาพและสมรรถนะการปฏิบัติหน้าที่
        $data['count_performance_very_good'] = $this->filterpeoples->filter($data['results'], 5, 'performance');
        $data['count_performance_good'] = $this->filterpeoples->filter($data['results'], 4, 'performance');
        $data['count_performance_normal'] = $this->filterpeoples->filter($data['results'], 3, 'performance');
        $obj_performance = array(
            'very_good'     => $data['count_performance_very_good'],
            'good'          => $data['count_performance_good'],
            'normal'        => $data['count_performance_very_good'],
            'dataset_label' => 'ประสิทธิภาพและสมรรถนะการปฏิบัติหน้าที่',
        );

        $data['barchart_values_performance'] = $this->set_barchart_values_points($obj_performance);

        // สำเร็จลุล่วง บรรลุตามวัตถุประสงค์
        $data['count_success_very_good'] = $this->filterpeoples->filter($data['results'], 5, 'success');
        $data['count_success_good'] = $this->filterpeoples->filter($data['results'], 4, 'success');
        $data['count_success_normal'] = $this->filterpeoples->filter($data['results'], 3, 'success');
        $obj_success = array(
            'very_good'     => $data['count_success_very_good'],
            'good'          => $data['count_success_good'],
            'normal'        => $data['count_success_normal'],
            'dataset_label' => 'สำเร็จลุล่วง บรรลุตามวัตถุประสงค์',
        );

        $data['barchart_values_success'] = $this->set_barchart_values_points($obj_success);

        // รวดเร็ว ตรงตามเวลาที่กำหนด
        $data['count_timeline_very_good'] = $this->filterpeoples->filter($data['results'], 5, 'timeline');
        $data['count_timeline_good'] = $this->filterpeoples->filter($data['results'], 4, 'timeline');
        $data['count_timeline_normal'] = $this->filterpeoples->filter($data['results'], 3, 'timeline');
        $obj_timeline = array(
            'very_good'     => $data['count_timeline_very_good'],
            'good'          => $data['count_timeline_good'],
            'normal'        => $data['count_timeline_normal'],
            'dataset_label' => 'รวดเร็ว ตรงตามเวลาที่กำหนด',
        );

        $data['barchart_values_timeline'] = $this->set_barchart_values_points($obj_timeline);

        // มีขั้นตอนการให้บริการและการจัดการที่ชัดเจน
        $data['count_service_clear_very_good'] = $this->filterpeoples->filter($data['results'], 5, 'service_clear');
        $data['count_service_clear_good'] = $this->filterpeoples->filter($data['results'], 4, 'service_clear');
        $data['count_service_clear_normal'] = $this->filterpeoples->filter($data['results'], 3, 'service_clear');
        $obj_service_clear = array(
          'very_good'     => $data['count_service_clear_very_good'],
          'good'          => $data['count_service_clear_good'],
          'normal'        => $data['count_service_clear_normal'],
          'dataset_label' => 'มีขั้นตอนการให้บริการและการจัดการที่ชัดเจน',
        );

        $data['barchart_values_service_clear'] = $this->set_barchart_values_points($obj_service_clear);

        // วัสดุ อุปกรณ์ เครื่องมือ ในการให้บริการครบครัน
        $data['count_materials_very_good'] = $this->filterpeoples->filter($data['results'], 5, 'materials');
        $data['count_materials_good'] = $this->filterpeoples->filter($data['results'], 4, 'materials');
        $data['count_materials_normal'] = $this->filterpeoples->filter($data['results'], 3, 'materials');
        $obj_materials = array(
          'very_good'     => $data['count_materials_very_good'],
          'good'          => $data['count_materials_good'],
          'normal'        => $data['count_materials_normal'],
          'dataset_label' => 'มีขั้นตอนการให้บริการและการจัดการที่ชัดเจน',
        );

        $data['barchart_values_materials'] = $this->set_barchart_values_points($obj_materials);

        // การให้บริการกริยา วาจา ที่เป็นมิตร
        $data['count_servicemind_very_good'] = $this->filterpeoples->filter($data['results'], 5, 'servicemind');
        $data['count_servicemind_good'] = $this->filterpeoples->filter($data['results'], 4, 'servicemind');
        $data['count_servicemind_normal'] = $this->filterpeoples->filter($data['results'], 3, 'servicemind');
        $obj_servicemind = array(
          'very_good'     => $data['count_servicemind_very_good'],
          'good'          => $data['count_servicemind_good'],
          'normal'        => $data['count_servicemind_normal'],
          'dataset_label' => 'การให้บริการกริยา วาจา ที่เป็นมิตร',
        );

        $data['barchart_values_servicemind'] = $this->set_barchart_values_points($obj_servicemind);

        // ความสามารถในการถ่ายทอดและการแนะนำให้ทราบถึงการใช้บริการด้านการรักษาความปลอดภัยและการจราจร
        $data['count_communication_very_good'] = $this->filterpeoples->filter($data['results'], 5, 'communication');
        $data['count_communication_good'] = $this->filterpeoples->filter($data['results'], 4, 'communication');
        $data['count_communication_normal'] = $this->filterpeoples->filter($data['results'], 3, 'communication');
        $obj_communication = array(
          'very_good'     => $data['count_communication_very_good'],
          'good'          => $data['count_communication_good'],
          'normal'        => $data['count_communication_normal'],
          'dataset_label' => 'ความสามารถในการถ่ายทอดและการแนะนำให้ทราบถึงการใช้บริการด้านการรักษาความปลอดภัยและการจราจร',
        );

        $data['barchart_values_communication'] = $this->set_barchart_values_points($obj_communication);
        
        // ความรอบรู้ทักษะ องค์ความรู้และการแนะนำให้ทราบถึงการใช้บริการด้านการรักษาความปลอดภัยและการจราจร
        $data['count_knowlage_very_good'] = $this->filterpeoples->filter($data['results'], 5, 'knowlage');
        $data['count_knowlage_good'] = $this->filterpeoples->filter($data['results'], 4, 'knowlage');
        $data['count_knowlage_normal'] = $this->filterpeoples->filter($data['results'], 3, 'knowlage');
        $obj_knowlage = array(
          'very_good'     => $data['count_knowlage_very_good'],
          'good'          => $data['count_knowlage_good'],
          'normal'        => $data['count_knowlage_normal'],
          'dataset_label' => 'ความรอบรู้ทักษะ องค์ความรู้และการแนะนำให้ทราบถึงการใช้บริการด้านการรักษาความปลอดภัยและการจราจร',
        );

        $data['barchart_values_knowlage'] = $this->set_barchart_values_points($obj_knowlage);

        // การรับฟัง ปัญหา ข้อซักถาม และการแสดงความคิดเห็นต่าง ๆ ต่อการใช้บริการด้านการรักษาความปลอดภัย มข. โดยภาพรวม
        $data['count_questions_very_good'] = $this->filterpeoples->filter($data['results'], 5, 'questions');
        $data['count_questions_good'] = $this->filterpeoples->filter($data['results'], 4, 'questions');
        $data['count_questions_normal'] = $this->filterpeoples->filter($data['results'], 3, 'questions');
        $obj_questions = array(
          'very_good'     => $data['count_questions_very_good'],
          'good'          => $data['count_questions_good'],
          'normal'        => $data['count_questions_normal'],
          'dataset_label' => 'การรับฟัง ปัญหา ข้อซักถาม และการแสดงความคิดเห็นต่าง ๆ ต่อการใช้บริการด้านการรักษาความปลอดภัย มข. โดยภาพรวม',
        );

        $data['barchart_values_questions'] = $this->set_barchart_values_points($obj_questions);

        // การให้คำแนะนำ เสนอแนวทาง การแก้ไขปัญหาและติดตามความคืบหน้าจากการขอใช้บริกา
        $data['count_followup_very_good'] = $this->filterpeoples->filter($data['results'], 5, 'followup');
        $data['count_followup_good'] = $this->filterpeoples->filter($data['results'], 4, 'followup');
        $data['count_followup_normal'] = $this->filterpeoples->filter($data['results'], 3, 'followup');
        $obj_followup = array(
          'very_good'     => $data['count_followup_very_good'],
          'good'          => $data['count_followup_good'],
          'normal'        => $data['count_followup_normal'],
          'dataset_label' => 'การให้คำแนะนำ เสนอแนวทาง การแก้ไขปัญหาและติดตามความคืบหน้าจากการขอใช้บริกา',
        );

        $data['barchart_values_followup'] = $this->set_barchart_values_points($obj_followup);

        return $data;
    }

}
