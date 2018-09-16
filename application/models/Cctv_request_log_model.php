<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Cctv_request_log_model extends CI_Model
{
    private $table        = 'cctv_request_log';
    private $id           = 'id';
    private $items        = '
    cctv_request_log.id,
    victim_name,
    gender,
    (
      CASE
        WHEN cctv_request_log.gender = "male" THEN "ชาย"
        WHEN cctv_request_log.gender = "female" THEN "หญิง"
        ELSE ""
      END
    ) AS gender_name,
    area,
    operation_status,
    (
      CASE
        WHEN cctv_request_log.operation_status = "meet_event" THEN "พบเหตุการณ์"
        WHEN cctv_request_log.operation_status = "have_not_event" THEN "ไม่พบเหตุการณ์"
        WHEN cctv_request_log.operation_status = "other" THEN "อื่นๆ"

        ELSE ""
      END
    ) AS operation_status_name,
    request_date AS request_date_en,
    DATE_FORMAT(DATE_ADD(request_date, INTERVAL 543 YEAR),"%d/%m/%Y") as request_date,
    
    people_type,
    (
      CASE 
        WHEN people_type = "officer" THEN "บุคลากร"
        WHEN people_type = "staff" THEN "บุคลากร"
        WHEN people_type = "student" THEN "นักศึกษา"
        WHEN people_type = "people_inside" THEN "บุคคลภายใน"
        WHEN people_type = "people_outside" THEN "บุคคลภายนอก"
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
    victim_name,
    area,
    cctv_event_id,
    gender,
    operation_status,
    operation_status_note,
    picture,
    vedio,
    printpicture,
    cd_vcd,
    flash_drive,
    computer_name,
    drive,
    folder,
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
