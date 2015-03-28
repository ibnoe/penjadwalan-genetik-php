<?php

class M_Jam extends CI_Model{

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}
	
	function get(){
		$rs = $this->db->query("SELECT kode ,range_jam ".
							   "FROM jam ".
							   "ORDER BY range_jam");
		return $rs;
	}
	
    function get_by_kode($kode){
		$rs = $this->db->query("SELECT kode ,range_jam ".
							   "FROM jam ".
							   "WHERE kode = $kode");
		return $rs;
	}

	function cek_for_update($kode_baru,$kode_lama){		
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM jam ".
							   "WHERE kode=$kode_baru AND kode <> $kode_lama");
		return $rs->row()->cnt;
	}
	
	function cek_for_insert($kode){
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM jam ".
							   "WHERE kode=$kode");
		return $rs->row()->cnt;
	}
	
	function update($kode,$data){
        $this->db->where('kode',$kode);
        $this->db->update('jam',$data);
    }
	
	function insert($data){
        $this->db->insert('jam',$data);		
    }
	
	function delete($kode){
		$this->db->query("DELETE FROM jam WHERE kode = '$kode'");
	}
	
}