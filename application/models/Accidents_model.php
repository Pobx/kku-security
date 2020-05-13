<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Accidents_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_participate_model');
        $this->load->library('FilterVehicles');
        $this->load->library('FilterPeoples');

    }

    private $table = 'accidents';
    private $id    = 'id';
    private $items = '
    accidents.id,
    accidents.period_time,
    accident_date AS accident_date_en,
    DATE_FORMAT(DATE_ADD(accident_date, INTERVAL 543 YEAR),"%d/%m/%Y") as accident_date,
    accident_time,
    assets_name,
    assets_amount,
    assets_remark,
    (
      CASE
        WHEN period_time = "morning" THEN "เช้า"
        WHEN period_time = "afternoon" THEN "บ่าย"
        WHEN period_time = "night" THEN "ดึก"
        ELSE ""
      END
    ) AS period_time_name,
    place,
    accident_place.name as accident_place_name,
    accident_cause,
    accident_cause.name as accident_cause_name,
    accidents.status,
    ';

    private $items2 = '
    accidents.id,
    period_time,
    DATE_FORMAT(DATE_ADD(accident_date, INTERVAL 543 YEAR),"%d/%m/%Y") as accident_date,
    accident_time,
    assets_name,
    assets_amount,
    assets_remark,
    (
      CASE
        WHEN period_time = "morning" THEN "เช้า"
        WHEN period_time = "afternoon" THEN "บ่าย"
        WHEN period_time = "night" THEN "ดึก"
        ELSE ""
      END
    ) AS period_time_name,
    place,
    accident_cause,
    accidents.status
    ';

    public function all($qstr = '')
    {
        if (isset($qstr) && !empty($qstr))
        {
            $this->db->where($qstr);
        }

        $query = $this->db->select($this->items)
            ->from($this->table)
            ->join('accident_place', 'accident_place.id = accidents.place', 'left')
            ->join('accident_cause', 'accident_cause.id = accidents.accident_cause', 'left')
            ->get();

        $results['results'] = $query->result_array();
        $results['rows'] = $query->num_rows();
        $results['fields'] = $query->list_fields();

        foreach ($results['results'] as $key => $value)
        {
            $conditions = array(
                'status !='   => 'disabled',
                'accident_id' => $value['id'],
            );

            $results_participate = $this->Accidents_participate_model->all($conditions);

            $results['results'][$key]['results_participate'] = $results_participate['results'];
            $results['results'][$key]['count_car'] = $this->filtervehicles->filter($results['results'][$key]['results_participate'], 'car');
            $results['results'][$key]['count_motocycles'] = $this->filtervehicles->filter($results['results'][$key]['results_participate'], 'motorcycle');

            $results['results'][$key]['count_injury'] = $this->filterpeoples->filter($results['results'][$key]['results_participate'], 'injury');
            $results['results'][$key]['count_dead'] = $this->filterpeoples->filter($results['results'][$key]['results_participate'], 'dead');
            $results['results'][$key]['count_officer'] = $this->filterpeoples->filter($results['results'][$key]['results_participate'], 'officer', 'people_type');
            $results['results'][$key]['count_student'] = $this->filterpeoples->filter($results['results'][$key]['results_participate'], 'student', 'people_type');
            $results['results'][$key]['count_people_inside'] = $this->filterpeoples->filter($results['results'][$key]['results_participate'], 'people_inside', 'people_type');
            $results['results'][$key]['count_people_outside'] = $this->filterpeoples->filter($results['results'][$key]['results_participate'], 'people_outside', 'people_type');

        }

        return $results;
    }

    public function distinct_place($qstr)
    {
        if (isset($qstr) && !empty($qstr))
        {
            $this->db->where($qstr);
        }

        $query = $this->db->distinct()->select('place')->from($this->table)->get();

        $results['results'] = $query->result_array();
        $results['rows'] = $query->num_rows();
        $results['fields'] = $query->list_fields();

        return $results;
    }

    public function count_accidents($qstr)
    {
        if (isset($qstr) && !empty($qstr))
        {
            $this->db->where($qstr);
        }

        $query = $this->db->select('id')->from($this->table)->get();

        $results['results'] = $query->result_array();
        $results['rows'] = $query->num_rows();

        return $results;
    }

    public function find($id)
    {
        $query = $this->db->select($this->items2)->from($this->table)->where('id', $id)->get();

        $results['rows'] = $query->num_rows();
        $results['results'] = $query->first_row();
        $results['fields'] = $query->list_fields();

        return $results;
    }

    public function store($inputs)
    {       

        if ($inputs['id'] != '')
        {
            $inputs['updated'] = date('Y-m-d H:i:s');
            $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $inputs);
            $results['lastID'] = $inputs['id'];
        }
        else
        {
            $inputs['created'] = date('Y-m-d H:i:s');
          
            // $results['query'] = $this->db->insert($this->table, $inputs);
            $myinputs = array(
                'accident_date' => $inputs['accident_date'],
                'accident_time' => $inputs['accident_time'],
                'period_time' => $inputs['period_time'], 
                'place' => $inputs['place'],
                'accident_cause' => $inputs['accident_cause'],
                'assets_name' => '0',
                'assets_amount' => 0,
                'assets_remark' => $inputs['assets_remark'],
                'status' => $inputs['status'],
                'recorder' => $inputs['recorder'],
                'created' => date('Y-m-d H:i:s'),

            );
            $results['query'] = $this->db->insert($this->table, $myinputs);
            $results['lastID'] = $this->db->insert_id();
            // echo "<pre>", print_r($inputs); exit();

            if(count($inputs['assets_name']) > 0){
                foreach($inputs['assets_name'] as $key => $data){
                    $arr= array(
                        'accidents_id' =>$results['lastID'],
                        'asset_name' => $data,
                        'asset_amount' => $inputs['assets_amount'][$key],
                    );
                    $this->db->insert('accident_asset_affair_detroyed', $arr);
                }
            }
        }

        return $results;
    }

    public function remove($id)
    {
        $inputs = array(
            'id'      => $id,
            'updated' => date('Y-m-d H:i:s'),
            'status'  => 'disabled',
        );

        $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $inputs);

        return $results;
    }

    // public function accident_peroid()
    // {
    //     $a['m'] = $this->filter2('01', 'morning');
    //     $a['af'] = $this->filter2('01', 'afternoon');
    //     $a['n'] = $this->filter2('01', 'night');
    //     $a['rows'] = [
    //         $a['m']['rows'],
    //         $a['af']['rows'],
    //         $a['n']['rows'],
    //     ];

    //     return $a;
    // }

    // public function filter2($month, $peroid)
    // {
    //     $query = $this->db->select('accident_date')
    //         ->from('accidents')
    //         ->where('period_time', $peroid)
    //         ->like('accident_date', '-' . $month . '-', 'both')
    //         ->get();

    //     $arr['res'] = $query->result_array();
    //     $arr['rows'] = $query->num_rows();

    //     return $arr;
    // }

}
