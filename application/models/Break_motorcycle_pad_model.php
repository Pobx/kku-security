<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Break_motorcycle_pad_model extends CI_Model
{

    private $table = 'break_motorcycle_pad';
    private $id    = 'id';
    private $items = '
    id,	
    period_time,
    (
      CASE 
        WHEN period_time = "morning" THEN "เช้า"
        WHEN period_time = "afternoon" THEN "บ่าย"
        WHEN period_time = "night" THEN "ดึก"
        ELSE ""
      END
    ) AS period_time_name,
    DATE(date_break) AS date_break_en,
    DATE_FORMAT(DATE_ADD(DATE(date_break), INTERVAL 543 YEAR),"%d/%m/%Y") as date_break,
    TIME(date_break) as date_break_time_only,
    people_type,
    (
      CASE 
        WHEN people_type = "officer" THEN "บุคลากร"
        WHEN people_type = "student" THEN "นักศึกษา"
        WHEN people_type = "staff" THEN "บุคลากร"
        WHEN people_type = "people_inside" THEN "บุคคลภายใน"
        ELSE ""
      END
    ) AS people_type_name,
    victim_name,
    victim_address,
    victim_department_name,
    place,
    assets_loses,
    remark,
    operation_status,
    (
      CASE
        WHEN operation_status = "caught" THEN "จับได้"
        WHEN operation_status = "not_caught" THEN "จับไม่ได้"
        WHEN operation_status = "other" THEN "อื่นๆ"
        ELSE ""
      END
    ) AS operation_status_name,
    created,
    updated,
    status,
    (
      CASE 
        WHEN status = "active" THEN "ACTIVE"
        WHEN status = "disabled" THEN "ลบรายการ"
        ELSE ""
      END
    ) AS status_name,
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

    public function find($id)
    {
        $query = $this->db->select($this->items)->from($this->table)->where('id', $id)->get();

        $results['rows'] = $query->num_rows();
        $results['results'] = $query->first_row();
        $results['fields'] = $query->list_fields();

        return $results;
    }

    public function store($inputs)
    {
        // echo "<pre>", print_r($inputs); die();
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
