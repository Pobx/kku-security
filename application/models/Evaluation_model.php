<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation_model extends CI_Model {

  private $table='evaluations';
  private $id    = 'id';
  private $items = '
    id, 
    gender,
    age,
    personal_id,
    department_id,
    performance,
    performance,
    success,
    timeline,
    service_clear,
    materials,
    servicemind,
    communication,
    knowlage,
    questions,
    followup,
    comment,
    gender,
    
  ';

  public function all($qstr = '')
    {
        if (isset($qstr) && !empty($qstr))
        {
            $this->db->where($qstr);
        }

        $query = $this->db->select($this->items)->from($this->table)->get();

        $results['results'] = $query->result_array();
        $results['rows'] = $query->num_rows();
        $results['fields'] = $query->list_fields();

        return $results;
    }

  public function store($inputs)
	{
    //echo "<pre>", print_r($inputs); exit();

    if ($inputs['id'] != '') {
      $inputs['updated'] = date('Y-m-d H:i:s');
      $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $inputs);
      $results['lastID'] = $inputs['id'];
    }else {
      $inputs['created'] = date('Y-m-d H:i:s');
      $results['query'] = $this->db->insert($this->table, $inputs);
      $results['lastID'] = $this->db->insert_id();
    }

    return $results;
  }

}
