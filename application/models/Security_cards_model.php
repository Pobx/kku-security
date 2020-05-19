<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Security_cards_model extends CI_Model
{
    private $table = 'security_cards';
    private $id    = 'id';
    private $items = '
    id,
    numbers,
    people_name,
    people_position,
    people_department_name,
    people_phone,
    car_province,
    car_brand,
    car_color,
    car_license_plate,
    issue_date AS issue_date_en,
    DATE_FORMAT(DATE_ADD(issue_date, INTERVAL 543 YEAR),"%d/%m/%Y") as issue_date,
    DATE_FORMAT(DATE_ADD(expire_date, INTERVAL 543 YEAR),"%d/%m/%Y") as expire_date,
    status,
    (
      CASE
        WHEN status = "active" THEN "ACTIVE"
        WHEN status = "disabled" THEN "ลบรายการ"
        ELSE ""
      END
    ) AS status_name,
    ';

    public function all($qstr = '', $limit = 0)
    {
        if (isset($qstr) && !empty($qstr))
        {
            $this->db->where($qstr);
        }
        if(isset($limit) && $limit > 0){
            $this->db->limit($limit);
        }

        $query = $this->db->select($this->items)->from($this->table)->get();

        $results['results'] = $query->result_array();
        // echo "<pre>", print_r($results['results']); exit();

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


    public function findByColumn($qstr='', $limit = 0){
        if (isset($qstr) && !empty($qstr)){
            $this->db->like($qstr[0], $qstr[1], 'after');   //column,value
        }
        if(isset($limit) && $limit > 0){
            $this->db->limit($limit);
        }

        $query = $this->db->select($this->items)->from($this->table)->get();

        $results['results'] = $query->result_array();     
        $results['rows'] = $query->num_rows();         //นับrow 
        $results['fields'] = $query->list_fields();    //เอาชื่อ column มา
        return $results;
    }

}
