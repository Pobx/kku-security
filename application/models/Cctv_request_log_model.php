<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Cctv_request_log_model extends CI_Model
{
    private $table        = 'cctv_request_log';
    private $id           = 'id';
    private $items        = '
    cctv_request_log.id,
    gender,
    (
      CASE
        WHEN cctv_request_log.gender = "male" THEN "ชาย"
        WHEN cctv_request_log.gender = "female" THEN "หญิง"
        ELSE ""
      END
    ) AS gender_name,
    operation_status,
    (
      CASE
        WHEN cctv_request_log.operation_status = "meet_event" THEN "พบเหตุการณ์"
        WHEN cctv_request_log.operation_status = "have_not_event" THEN "ไม่พบเหตุการณ์"
        ELSE ""
      END
    ) AS operation_status_name,
    DATE_FORMAT(DATE_ADD(request_date, INTERVAL 543 YEAR),"%d/%m/%Y") as request_date,
    link_copy_polic_doc,
    link_copy_gov_doc,
    link_copy_other_gov_doc,
    people_type,
    (
      CASE 
        WHEN people_type = "officer" THEN "บุคลากร"
        WHEN people_type = "staff" THEN "บุคลากร"
        WHEN people_type = "student" THEN "นักศึกษา"
        WHEN people_type = "people_inside" THEN "บุคคลภายใน"
        ELSE ""
      END
    ) AS people_type_name,
    
    cctv_request_log.status,
    (
      CASE
        WHEN cctv_request_log.status = "active" THEN "ACTIVE"
        WHEN cctv_request_log.status = "disabled" THEN "ลบรายการ"
        ELSE ""
      END
    ) AS status_name,
    cctv_events.name AS cctv_event_name
    ';

    private $items2        = '
    id,
    DATE_FORMAT(DATE_ADD(request_date, INTERVAL 543 YEAR),"%d/%m/%Y") as request_date,
    people_type,
    cctv_event_id,
    link_copy_polic_doc,
    link_copy_gov_doc,
    link_copy_other_gov_doc,
    gender,
    operation_status,
    ';

    public function all($qstr = '')
    {
        if (isset($qstr) && !empty($qstr))
        {
            $this->db->where($qstr);
        }

        $query = $this->db->select($this->items)
        ->from($this->table)
        ->join('cctv_events', 'cctv_events.id = cctv_request_log.cctv_event_id')
        ->get();


        $results['results'] = $query->result_array();
        $results['rows'] = $query->num_rows();
        $results['fields'] = $query->list_fields();

        return $results;
    }

    public function find($id)
    {
        $query = $this->db->select($this->items2)->from($this->table)->where('id', $id)->get();

        $results['rows'] = $query->num_rows();
        $results['results'] = $query->first_row();
        $results['fields'] = $query->list_fields();
        $results['result'] = $query->result();

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
            // $inputs['created'] = date('Y-m-d H:i:s');
            $results['query'] = $this->db->insert($this->table, $inputs);
            $results['lastID'] = $this->db->insert_id();
        }

        return $results;
    }

    public function remove($id)
    {
        $inputs = array(
            'rbp_id' => $id,
            'status' => 0,
        );

        $results['query'] = $this->db->where($this->id, $inputs['rbp_id'])->update($this->table, $inputs);

        return $results;
    }

}
