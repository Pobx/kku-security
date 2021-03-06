<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security_home_model extends CI_Model {

	private $table='security_homes';
	private $id='id';
  private $items = '
    id, 
    start_date AS start_date_en,
    DATE_FORMAT(DATE_ADD(start_date, INTERVAL 543 YEAR),"%d/%m/%Y") as start_date, 
    DATE_FORMAT(DATE_ADD(end_date, INTERVAL 543 YEAR),"%d/%m/%Y") as end_date,
    CONCAT(DATE_FORMAT(DATE_ADD(start_date, INTERVAL 543 YEAR),"%d/%m/%Y"), " - ", DATE_FORMAT(DATE_ADD(end_date, INTERVAL 543 YEAR),"%d/%m/%Y")) as home_date,
    owner_home_name, 
    owner_home_position_name, 
    owner_home_department_name, 
    owner_home_office_name, 
    address, 
    (
      CASE 
        WHEN status = "normal" THEN "ปกติ"
        WHEN status = "disabled" THEN "ลบรายการ"
        WHEN status = "festival" THEN "เทศกาล"
        ELSE ""
      END
    ) AS status_name,
    status,
    (
      CASE 
        WHEN status = "stable" THEN "ปกติ"
        WHEN status = "disabled" THEN "ลบรายการ"
        WHEN status = "not-stable" THEN "ไม่ปกติ"
        ELSE ""
      END
    ) AS status_name,
    recorder,
    period
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
      $inputs['updated'] = date('Y-m-d H:i:s');
      $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $inputs);
		  $results['lastID'] = $inputs['id'];
    }else {
      $inputs['created'] = date('Y-m-d H:i:s');
      $results['query'] = $this->db->insert($this->table, $inputs);
		  $results['lastID'] = $this->db->insert_id();
    }
    // echo "<pre>", print_r($inputs); exit();

    return $results;
  }

  public function remove($id) {
    $inputs = array(
      'id'=>$id,
      'updated'=>date('Y-m-d H:i:s'),
      'status'=>'disabled'
    );

    $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $inputs);

    return $results;
  }

}
