<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_model extends CI_Model {

	private $table='office';
	private $id='id';
    private $items = '
    id , 
    name ,
    status,
    (
      CASE 
        WHEN status = "active" THEN "ACTIVE"
        WHEN status = "disabled" THEN "ลบรายการ"
        ELSE ""
      END
    ) AS status_name,
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
}
