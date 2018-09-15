<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Evaluation_services_model extends CI_Model
{

    private $table = 'evaluation_services';

    public function store($inputs)
    {
        //echo "<pre>", print_r($inputs); exit();

        if ($inputs['id'] != '')
        {
            $inputs['updated'] = date('Y-m-d H:i:s');
            $results['query'] = $this->db->where($this->id, $inputs['id'])->update($this->table, $inputs);
            $results['lastID'] = $inputs['id'];
        }else{
            $inputs['created'] = date('Y-m-d H:i:s');
            $results['query'] = $this->db->insert($this->table, $inputs);
            $results['lastID'] = $this->db->insert_id();
        }

        return $results;
    }

}
