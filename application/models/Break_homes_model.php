<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Break_homes_model extends CI_Model {

	private $table='break_homes';
	private $id='id';
  private $items = '
    id, 
    date_break AS date_break_en,
    DATE_FORMAT(DATE_ADD(date_break, INTERVAL 543 YEAR),"%d/%m/%Y") as date_break, 
    time_break,
    victim_name,
    victim_phone,
    department,
    type_address,
    (
      CASE 
      WHEN type_address = "home" THEN "บ้าน"
      WHEN type_address = "flat" THEN "แฟลต"
      WHEN type_address = "office" THEN "สำนักงาน"
      WHEN type_address = "other" THEN "อื่นๆ"
    END
    ),
    address,
    assets_loses,
    staff_process,
    (
      CASE 
        WHEN staff_process = "yes" THEN "จับได้"
        WHEN staff_process = "no" THEN "จับไม่ได้"
      END
    ) ,
    staff_process_note,
    remark,
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
