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
    accident_place.name as accident_place_name,
    accident_cause,
    accident_cause.name as accident_cause_name,
    accidents.status
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
        ->join('accident_place', 'accident_place.id = accidents.place')
        ->join('accident_cause', 'accident_cause.id = accidents.accident_cause')
        ->get();

        $results['results'] = $query->result_array();
        $results['rows'] = $query->num_rows();
        $results['fields'] = $query->list_fields();

        foreach ($results['results'] as $key => $value) {
          $conditions = array(
            'status !=' => 'disabled',
            'accident_id'=>$value['id']
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
        }

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
        // echo "<pre>", print_r($inputs); exit();
        if ($inputs['id'] != '')
        {
            $inputs['updated'] = date('Y-m-d H:i:s');
            $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $inputs);
            $results['lastID'] = $inputs['id'];
        }
        else
        {
            $inputs['created'] = date('Y-m-d H:i:s');
            $results['query'] = $this->db->insert($this->table, $inputs);
            $results['lastID'] = $this->db->insert_id();
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

}
