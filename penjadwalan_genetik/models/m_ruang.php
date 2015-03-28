<?php

class M_Ruang extends CI_Model{

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}
	
	function get(){
		$rs = $this->db->query("SELECT * FROM ruang");
		return $rs;
	}
	
	function get_by_kode($kode){
		$rs = $this->db->query("SELECT * FROM ruang WHERE kode = $kode");
		return $rs;
	}
	
	function cek_for_update($nama,$kode){
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM ruang ".
							   "WHERE nama='$nama' AND kode <> $kode");
		return $rs->row()->cnt;
	}
	
	function cek_for_insert($nama){
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM ruang ".
							   "WHERE nama='$nama'");
		return $rs->row()->cnt;
	}
	
	function update($kode,$data){
        $this->db->where('kode',$kode);
        $this->db->update('ruang',$data);
	}
	
	function insert($data){
        $this->db->insert('ruang',$data);		
    }
	
	function delete($kode){
		$this->db->query("DELETE FROM ruang where kode = $kode");
	}
	
	function get_search($search_query){
		$rs = $this->db->query("SELECT kode,nama,kapasitas,jenis FROM ruang WHERE nama LIKE '%$search_query%'");
		return $rs;
	}
	
}