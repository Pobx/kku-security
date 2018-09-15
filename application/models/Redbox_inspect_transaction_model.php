<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Redbox_inspect_transaction_model extends CI_Model
{

  public function __construct()
    {
        parent::__construct();

    }

    private $table = 'redbox_inspect_transaction';
    private $id    = 'id';
    private $items = '
    redbox_inspect_transaction.id,
    redbox_inspect_transaction.redbox_place_id,
    redbox_place.name AS place_name,
    users.name AS inspector_name,
    DATE(inspect_date) AS inspect_date_en,
    DATE_FORMAT(DATE_ADD(DATE(inspect_date), INTERVAL 543 YEAR),"%d/%m/%Y") as inspect_date_th,
    TIME(inspect_date) as inspect_date_time,
    (
      CASE 
        WHEN redbox_inspect_transaction.status = "active" THEN "ACTIVE"
        WHEN redbox_inspect_transaction.status = "disabled" THEN "ลบรายการ"
        ELSE ""
      END
    ) AS status_name,

    (
      CASE 
        WHEN redbox_inspect_transaction.status_inspect = "normal" THEN "ปกติ"
        WHEN redbox_inspect_transaction.status_inspect = "abnormal" THEN "ไม่ปกติ"
        ELSE ""
      END
    ) AS status_inspect_name,
    redbox_inspect_transaction.comment
    ';

    public function all($qstr = '')
    {
        if (isset($qstr) && !empty($qstr))
        {
            $this->db->where($qstr);
        }

        $this->db->select($this->items);
        $this->db->from($this->table);
        $this->db->join('redbox_place', 'redbox_place.id = redbox_inspect_transaction.redbox_place_id', 'left');
        $this->db->join('users', 'users.id = redbox_inspect_transaction.user_id');
        $query = $this->db->get();

        $results['results'] = $query->result_array();
        $results['rows'] = $query->num_rows();
        $results['fields'] = $query->list_fields();
      
        return $results;
    }

    public function find($id)
    {
        $query = $this->db->select($this->items_for_form)->from($this->table)->where('rbp_id', $id)->get();

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
            $results['query'] = $this->db->where($this->id, $inputs['rbp_id'])->update($this->table, $inputs);
            $results['lastID'] = $inputs['rbp_id'];
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
            'rbp_id'      => $id,
            'status'  => 0,
        );

        $results['query'] = $this->db->where($this->id, $inputs['rbp_id'])->update($this->table, $inputs);

        return $results;
    }

}
