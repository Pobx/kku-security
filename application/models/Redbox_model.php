<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Redbox_model extends CI_Model
{

  public function __construct()
    {
        parent::__construct();

    }

    private $table = 'redbox_positions';
    private $redbox_table = 'redbox';
    private $id    = 'rbp_id';
    private $items = '
    rbp_id,
    rbp_id AS id,
    redbox.redbox_id,
    redbox.zone,
    redbox.redboxname,
    checker_id,
    DATE(checked_datetime) AS checked_datetime_en,
    DATE_FORMAT(DATE_ADD(DATE(checked_datetime), INTERVAL 543 YEAR),"%d/%m/%Y") as checked_datetime_th,
    TIME(checked_datetime) as checked_datetime_time_only,
    redbox_positions.status,
    comment
    ';
    private $redbox_lists = '
        redbox_id,
        redboxname,
        zone
    ';

    public function all($qstr = '')
    {
        if (isset($qstr) && !empty($qstr))
        {
            $this->db->where($qstr);
        }

        $this->db->select($this->items.', redbox_positions.*, users.name as checker_name');
        $this->db->from($this->table);
        $this->db->join($this->redbox_table, 'redbox.redbox_id = redbox_positions.redbox_id');
        $this->db->join('users', 'users.id = redbox_positions.checker_id');
        $query = $this->db->get();

        $results['results'] = $query->result_array();
        $results['rows'] = $query->num_rows();
        $results['fields'] = $query->list_fields();
      
        return $results;
    }

    public function find($id)
    {
        $query = $this->db->select($this->items)->from($this->table)->where('rbp_id', $id)->get();

        $results['rows'] = $query->num_rows();
        $results['results'] = $query->first_row();
        $results['fields'] = $query->list_fields();
        $results['result'] = $query->result();

        return $results;
    }

    public function get_redbox_postion_list(){
        $query = $this->db->select($this->redbox_lists)->from($this->redbox_table)->get();
        $results['rows'] = $query->num_rows();
        $results['results'] = $query->first_row();
        $results['fields'] = $query->list_fields();
        $results['result'] = $query->result();
        return $results;
    }

    public function store($inputs)
    {
        // echo "<pre>", print_r($inputs); exit();
        if ($inputs['rbp_id'] != '')
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
            'rbp_id'      => $id,
            'status'  => 0,
        );

        $results['query'] = $this->db->where($this->id, $inputs['rbp_id'])->update($this->table, $inputs);

        return $results;
    }

}