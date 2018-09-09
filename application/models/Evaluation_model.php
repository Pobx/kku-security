<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Services_model');
        $this->load->model('Faculty_model');
        $this->load->model('Personals_model'); 
        $this->load->model('Eval_service_model');
    }

  private $table='evaluations';
  private $table2='eval_service';
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
    posonal_id,
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
                      ->join($this->table4, $this->table.'.	posonal_id = '.$this->table4.'.id')
                      ->get();

                      
    $results['results'] = $query->result_array();
    $results['rows'] = $query->num_rows();
    $results['fields'] = $query->list_fields();

    return $results;
  }

  public function find($id) {
    $query = $this->db->select($this->items)
                      ->from($this->table)
                      ->where($this->table.'.id', $id)->get();
    $query2 = $this->db->select("eval_service.service_id")
                      ->from($this->table5)
                      ->where($this->table5.'.eval_id', $id)->get();
                 
    $results['rows'] = $query->num_rows();
    $results['results'] = $query->first_row();
    $results['fields'] = $query->list_fields();
    $results['service'] = $query2->result_array();


    return $results;
  }

  public function store($inputs)
	{
    //echo "<pre>", print_r($inputs); exit();
    if(isset($inputs)){
      $arr = array(
        'gender'=>$inputs['gender'],
        'age'=>$inputs['age'],
        'posonal_id'=>$inputs['posonal_id'],
        'department_id'=>$inputs['department_id'],
        'performance'=>$inputs['performance'],
        'success'=>$inputs['success'],
        'timeline'=>$inputs['timeline'],
        'service_clear'=>$inputs['service_clear'],
        'materials'=>$inputs['materials'],
        'servicemind'=>$inputs['servicemind'],
        'communication'=>$inputs['communication'],
        'knowlage'=>$inputs['knowlage'],
        'questions'=>$inputs['questions'],
        'followup'=>$inputs['followup'],
        'comment'=>$inputs['comment']
      );
    }

    if ($inputs['id'] != '') {
      $inputs['updated'] = date('Y-m-d H:i:s');
      $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $arr);
      $results['lastID'] = $inputs['id'];

      //delete old data
      $results['query'][$service]  =$this->db->where('eval_id', $inputs['id'])->delete($this->table2);

      foreach($inputs['service'] as $service){
        $arr2 = array(
  
          'eval_id'=>$results['lastID'],
          'service_id'=>$service
  
        );
        //insert new 
        $results['query'][$service] = $this->db->insert($this->table2, $arr2);

      }

    }else {
      $arr = array(
        'eval_date'=>$this->date_libs->set_date_th($inptus['eval_date']),
        'gender'=>$inputs['gender'],
        'age'=>$inputs['age'],
        'posonal_id'=>$inputs['posonal_id'],
        'department_id'=>$inputs['department_id'],
        'performance'=>$inputs['performance'],
        'success'=>$inputs['success'],
        'timeline'=>$inputs['timeline'],
        'service_clear'=>$inputs['service_clear'],
        'materials'=>$inputs['materials'],
        'servicemind'=>$inputs['servicemind'],
        'communication'=>$inputs['communication'],
        'knowlage'=>$inputs['knowlage'],
        'questions'=>$inputs['questions'],
        'followup'=>$inputs['followup'],
        'comment'=>$inputs['comment']
      );
      
      $inputs['created'] = date('Y-m-d H:i:s');
      $results['query'] = $this->db->insert($this->table, $arr);
      $results['lastID'] = $this->db->insert_id();

      $this->table2 ="eval_service";
      foreach($inputs['service'] as $service){
        $arr2 = array(
  
          'eval_id'=>$results['lastID'],
          'service_id'=>$service
  
        );
        $results['query'][$service] = $this->db->insert($this->table2, $arr2);
      }
      

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
