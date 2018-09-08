<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_model extends CI_Model {

	private $table='services';
	private $id='id';
  private $items = '
    id , 
    name ,
    ';

    
  public function all($qstr = '') {
    if (isset($qstr) && !empty($qstr)) {
			$this->db->where($qstr);
    }
    
    $query = $this->db->select($this->items)->from($this->table)->get();

    $results['results'] = $query->result_array();
    $results['rows'] = $query->num_rows();
    $results['fields'] = $query->list_fields();

    return $results;
  }

  public function find($id) {
    $query = $this->db->select($this->items)->from($this->table)->where('id', $id)->get();

    $results['rows'] = $query->num_rows();
    $results['results'] = $query->first_row();
    $results['fields'] = $query->list_fields();

    return $results;
  }

  public function store($inputs)
	{
    // echo "<pre>", print_r($inputs); exit();
    if ($inputs['id'] != '') {
      $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $inputs);
		  $results['lastID'] = $inputs['id'];
    }else {
      $results['query'] = $this->db->insert($this->table, $inputs);
		  $results['lastID'] = $this->db->insert_id();
    }

    return $results;
  }

  public function remove($id) {
    $inputs = array(
      'id'=>$id
    );

    $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $inputs);

    return $results;
  }

}
