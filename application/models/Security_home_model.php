<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security_home_model extends CI_Model {

	private $table='security_homes';
	private $id='id';

  public function store($inptus)
	{
    echo "<pre>", print_r($inptus); exit();
    if ($inptus['id'] != '') {
      $inptus['created'] = date('Y-m-d H:i:s');
      $results['query']=$this->db->where($this->id, $inptus['id'])->update($this->table, $inptus);
		  $results['lastID']=$inptus['id'];
    }else {
      $inptus['updated'] = date('Y-m-d H:i:s');
      $results['query']=$this->db->insert($this->table, $inptus);
		  $results['lastID']=$this->db->insert_id();
    }

    return $results;
  }
  

}
