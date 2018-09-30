<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Steal_motorcycle_model extends CI_Model
{

    private $table = 'steal_motocycle';
    private $id    = 'id';
    private $items = '
    id,
    steal_date AS steal_date_en,
    DATE_FORMAT(DATE_ADD(steal_date, INTERVAL 543 YEAR),"%d/%m/%Y") as steal_date_th,
    period_time,
    (
      CASE
        WHEN period_time = "morning" THEN "เช้า"
        WHEN period_time = "afternoon" THEN "บ่าย"
        WHEN period_time = "night" THEN "ดึก"
        ELSE ""
      END
    ) AS period_time_name,
    people_type,
    (
      CASE
        WHEN people_type = "student" THEN "นักศึกษา"
        WHEN people_type = "staff" THEN "บุคลากร"
        WHEN people_type = "people_outside" THEN "บุคคลภายนอก"
        ELSE ""
      END
    ) AS people_type_name,
    victim_name,
    victim_phone,
    department,
    address,
    car_model,
    car_brand,
    car_color,
    car_license_plate,
    arrested_status,
    (
      CASE
        WHEN arrested_status = "arrested" THEN "จับได้"
        WHEN arrested_status = "not_arrested" THEN "ยังจับกุมไม่ได้"
        WHEN arrested_status = "arrested_other" THEN "อื่นๆ"
      END
    ) AS arrested_status_name,
    arrested_other,
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
