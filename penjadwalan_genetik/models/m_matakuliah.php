<?php

class M_Matakuliah extends CI_Model{

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}
	
	/*
	function get_by_semester_type($semester_type){
		$rs = $this->db->query(
								"SELECT * ".
								"FROM matakuliah ".
								"WHERE semester%2=$semester_type ".
								"ORDER BY nama");
		return $rs;
	}
	*/
	
	
	
	function get(){
		$rs = $this->db->query(
							   "SELECT kode,".
								"       kode_mk,".
								"       nama,".
								"       sks,".
								"       semester,".								
								"       jenis ".
								"FROM matakuliah ".
								"ORDER BY $this->sort $this->order ".
								"LIMIT $this->offset,$this->limit");
		return $rs;		
	}
	
	function get_all(){
		$rs = $this->db->query(
							   "SELECT kode,".
								"       kode_mk,".
								"       nama,".
								"       sks,".
								"       semester,".								
								"       jenis ".
								"FROM matakuliah ");
					
		return $rs;		
	}
	
	function get_by_semester($semester){
		$rs = $this->db->query(
							   "SELECT kode,".								
								"       nama ".								
								"FROM matakuliah ".
								"WHERE semester%2=$semester ORDER BY nama");
		return $rs;		
	}
	
	function get_by_kode($kode){
		$rs = $this->db->query(
							   "SELECT kode,".
								"       kode_mk,".
								"       nama,".
								"       sks,".
								"       semester,".								
								"       jenis ".
								"FROM matakuliah ".
								"WHERE kode= $kode");
		return $rs;		
	}
	
	function get_search($search){
		$rs = $this->db->query(	"SELECT kode,".
								"       kode_mk,".
								"       nama,".
								"       sks,".
								"       semester,".								
								"       jenis ".
								"FROM matakuliah ".								
								"WHERE nama LIKE '%$search%'");
		return $rs;		
	}
	
	function num_page(){
    	
    	$result = $this->db->from('matakuliah')
                           ->count_all_results();
        return $result;
    }
	
	function cek_for_update($kode_mk,$nama,$kode){
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM matakuliah ".
							   "WHERE (kode_mk=$kode_mk OR nama='$nama') AND kode <> $kode");
		return $rs->row()->cnt;
	}
	
	function cek_for_insert($kode_mk,$nama){
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM matakuliah ".
							   "WHERE kode_mk=$kode_mk OR nama='$nama'");
		return $rs->row()->cnt;
	}
	
	function update($kode,$data){
        $this->db->where('kode',$kode);
        $this->db->update('matakuliah',$data);
    }
	
	function insert($data){
        $this->db->insert('matakuliah',$data);		
    }
	
	function delete($kode){
		$this->db->query("DELETE FROM matakuliah WHERE kode = '$kode'");
	}
	
}