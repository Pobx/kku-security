<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Accidents_participate_model extends CI_Model
{
    private $table = 'accident_participate';
    private $id    = 'id';
    private $items = '
    id,
    accident_id,
    people_name,
    people_department_name,
    car_type,
    (
      CASE 
        WHEN car_type = "car" THEN "รถยนต์"
        WHEN car_type = "motorcycle" THEN "รถจักรยานยนต์"
        ELSE ""
      END
    ) AS car_type_name,
    car_model,
    car_brand,
    car_color,
    car_license_plate,
    CONCAT(car_license_plate, " ", car_color, " ", car_brand, " ", car_model) as car_body,

    injury_type,
    (
      CASE 
        WHEN injury_type = "injury" THEN "บาดเจ็บ"
        WHEN injury_type = "dead" THEN "เสียชีวิต"
        ELSE ""
      END
    ) AS injury_type_name,
    victim_type,
    (
      CASE 
        WHEN victim_type = "victim" THEN "ผู้ประสบเหตุ"
        WHEN victim_type = "parties" THEN "คู่กรณี"
        ELSE ""
      END
    ) AS victim_type_name,
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
