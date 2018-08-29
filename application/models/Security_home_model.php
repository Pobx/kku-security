<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security_home_model extends CI_Model {

	private $table='security_homes';
	private $id='id';
  private $items = '
    id, 
    DATE_FORMAT(DATE_ADD(start_date, INTERVAL 543 YEAR),"%d/%m/%Y") as start_date, 
    DATE_FORMAT(DATE_ADD(end_date, INTERVAL 543 YEAR),"%d/%m/%Y") as end_date,
    owner_home_name, 
    owner_home_position_name, 
    owner_home_department_name, 
    owner_home_office_name, 
    address, 
    status
    ';

  public function all($qstr = '') {
    if (isset($qstr) && !empty($qstr)) {
			$this->db->where($qstr);
    }
    
    $query = $this->db->select($this->items)->from($this->table)->get();

    $results['results'] = $query->result_array();
    $results['rows'] = $query->num_rows();
    // $results['fields'] = $query->list_fields();

    return $results;
  }

  public function store($inptus)
	{
    // echo "<pre>", print_r($inptus); exit();
    if ($inptus['id'] != '') {
      $inptus['updated'] = date('Y-m-d H:i:s');
      $results['query']=$this->db->where($this->id, $inptus['id'])->update($this->table, $inptus);
		  $results['lastID']=$inptus['id'];
    }else {
      $inptus['created'] = date('Y-m-d H:i:s');
      $results['query']=$this->db->insert($this->table, $inptus);
		  $results['lastID']=$this->db->insert_id();
    }

    return $results;
  }
  

}
