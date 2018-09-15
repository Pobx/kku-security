<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation_model extends CI_Model {

  private $table='evaluations';
  private $table2='services';
  private $table3='faculty';
  private $table4='personals';
  private $table5='eval_service';
	private $id='id';
  private $items = '
  evaluations.id as ev_id, 
    DATE_FORMAT(DATE_ADD(eval_date, INTERVAL 543 YEAR),"%d/%m/%Y") as eval_date, 
    gender,
    (
      CASE 
        WHEN gender = "male" THEN "ชาย"
        WHEN gender = "female" THEN "หญิง"
        ELSE ""
      END
    ) AS gender,
    age,
    personal_id,
    department_id,
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
    comment
    ';

    
    
  public function all($qstr = '') {
    if (isset($qstr) && !empty($qstr)) {
			$this->db->where($qstr);
    }
    
    $query = $this->db->select("faculty.name as facultyname,personals.name as personalname,evaluations.*")
                      ->from($this->table)
                      ->join($this->table3, $this->table.'.department_id = '.$this->table3.'.id')
                      ->join($this->table4, $this->table.'.personal_id = '.$this->table4.'.id')
                      ->get();

                      
    $results['results'] = $query->result_array();
    $results['rows'] = $query->num_rows();
    $results['fields'] = $query->list_fields();

    return $results;
  }

  public function find($id) {
    $query = $this->db->select("evaluations.*,eval_service.service_id,services.name as service_name,faculty.name as faculty_name,personals.name as personal_name")
                      ->from($this->table)
                      ->join($this->table5,$this->table.'.id='.$this->table5.'.eval_id')
                      ->join($this->table2,$this->table2.'.id='.$this->table5.'.service_id')
                      ->join($this->table3, $this->table.'.department_id = '.$this->table3.'.id')
                      ->join($this->table4, $this->table.'.personal_id = '.$this->table4.'.id')
                      ->where($this->table.'.id', $id)->get();
         
    $results['rows'] = $query->num_rows();
    $results['results'] = $query->first_row();
    $results['fields'] = $query->list_fields();
    $results['service'] = $query->result_array();

    //  echo "<pre>", print_r($results['service']); exit();
    return $results;
  }

  public function store($inputs)
	{
    //echo "<pre>", print_r($inputs); exit();

    if ($inputs['id'] != '') {
      $inputs['updated'] = date('Y-m-d H:i:s');
      $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $arr);
      $results['lastID'] = $inputs['id'];
    }else {
      $inputs['created'] = date('Y-m-d H:i:s');
      $results['query'] = $this->db->insert($this->table, $arr);
      $results['lastID'] = $this->db->insert_id();
    }

    return $results;
  }

  public function remove($id) {
    $inputs = array(
      'id'=>$id,
      'status'=>'disabled'
    );
    $inputs2 = array(
      'eval_id'=>$id,
      'status'=>'disabled'
    );

    $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $inputs);
    $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table2,$inputs);
  }

}
