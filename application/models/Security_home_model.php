<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security_home_model extends CI_Model {

	private $table='security_homes';
	private $id='id';

  public function store($inptus)
	{
    echo "<pre>", print_r($inptus);exit();
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
  
	// public function order_cate_list($qstr='')
	// {
	// 	if (isset($qstr) && !empty($qstr)) {
	// 		$this->db->where($qstr);
	// 	}

	// 	$qr=$this->db->select('*')
	// 				->from($this->tb_order_cate)
	// 				->get();

	// 	$rs['rs']=$qr->result_array();
	// 	$rs['rows']=$qr->num_rows();
	// 	$rs['field']=$qr->list_fields();

	// 	return $rs;
	// }

	// public function update_order_cate_status($qstr)
	// {
	// 	$rs['query']=$this->db->where($this->cate_id, $qstr['cate_id'])->update($this->tb_order_cate, $qstr);
	// 	return $rs;
	// }

	

	// public function area_rate_list($qstr)
	// {
	// 	if (isset($qstr) && !empty($qstr)) {
	// 		$this->db->where($qstr);
	// 	}

	// 	$qr=$this->db->select('*')
	// 				->from($this->tb_area_rate)
	// 				->get();

	// 	$rs['rs']=$qr->result_array();
	// 	$rs['rows']=$qr->num_rows();
	// 	$rs['field']=$qr->list_fields();

	// 	return $rs;
	// }

	// public function set_area_rate($qstr)
	// {
	// 	$rs['query']=$this->db->insert($this->tb_area_rate, $qstr);
	// 	$rs['lastID']=$this->db->insert_id();

	// 	return $rs;
	// }

	// public function update_area_rate_status($qstr)
	// {
	// 	$rs['query']=$this->db->where($this->area_id, $qstr['area_id'])->update($this->tb_area_rate, $qstr);
	// 	return $rs;
	// }

}//end class
