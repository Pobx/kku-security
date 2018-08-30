<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Vehicles_forget_key_model extends CI_Model
{

    private $table = 'vehicles_forget_key';
    private $id    = 'id';
    private $items = '
    id,
    DATE_FORMAT(DATE_ADD(date_forget_key, INTERVAL 543 YEAR),"%d/%m/%Y") as date_forget_key,
    owner_assets_name,
    owner_assets_department,
    owner_assets_age,
    owner_assets_phone,
    owner_assets_forget_key_place,
    car_type,
    model,
    brand,
    color,
    license_plate,
    car_state,
    detective_name,
    detective_department_name,
    remark,
    status
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
