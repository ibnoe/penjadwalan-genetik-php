<?php

class M_Pengampu extends CI_Model{

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}
	
	function get($semester_tipe,$tahun_akademik){
	
		$sql  = "SELECT a.kode as kode,".
				"       b.kode as `kode_mk`,".
				"       b.nama as `nama_mk`,".
				"       c.kode as `kode_dosen`,".
				"       c.nama as  `nama_dosen`,".
				"       a.kelas as kelas,".
				"       a.tahun_akademik as `tahun_akademik` ".
				"FROM pengampu a ".
				"LEFT JOIN matakuliah b ".
				"ON a.kode_mk = b.kode ".
				"LEFT JOIN dosen c ".
				"ON a.kode_dosen = c.kode ".
				"WHERE b.semester%2=$semester_tipe AND a.tahun_akademik = '$tahun_akademik' ".                
				"ORDER BY $this->sort $this->order ".
				"LIMIT $this->offset,$this->limit";
		
		$rs = $this->db->query($sql);
		return $rs;
	}
	
	function get_by_kode($kode){
		
		$sql  = "SELECT a.kode as kode,".
				"       b.kode as `kode_mk`,".
				"       b.nama as `nama_mk`,".
				"       c.kode as `kode_dosen`,".
				"       c.nama as  `nama_dosen`,".
				"       a.kelas as kelas,".
				"       a.tahun_akademik as `tahun_akademik` ".
				"FROM pengampu a ".
				"LEFT JOIN matakuliah b ".
				"ON a.kode_mk = b.kode ".
				"LEFT JOIN dosen c ".
				"ON a.kode_dosen = c.kode ".
				"WHERE a.kode = $kode";
		
		$rs = $this->db->query($sql);
		return $rs;
		
	}
	
	function get_search($search_query, $semester_tipe,$tahun_akademik){
	
		$rs = $this->db->query(
							    "SELECT a.kode as kode,".
								"       b.kode as `kode_mk`,".
								"       b.nama as `nama_mk`,".
								"       c.kode as `kode_dosen`,".
								"       c.nama as  `nama_dosen`,".
								"       a.kelas as kelas,".
								"       a.tahun_akademik as `tahun_akademik` ".
								"FROM pengampu a ".
								"LEFT JOIN matakuliah b ".
								"ON a.kode_mk = b.kode ".
								"LEFT JOIN dosen c ".
								"ON a.kode_dosen = c.kode ".
								"WHERE b.semester%2=$semester_tipe AND a.tahun_akademik = '$tahun_akademik' AND (c.nama LIKE '%$search_query%' OR b.nama LIKE '%$search_query%') ".                
								"ORDER BY b.nama,a.kelas");
		return $rs;
	}
	
	function num_page($semester_tipe,$tahun_akademik){
		
		
		$rs = $this->db->query(
							    "SELECT CAST(COUNT(*) AS CHAR(4)) as cnt ".
								"FROM pengampu a ".
								"LEFT JOIN matakuliah b ".
								"ON a.kode_mk = b.kode ".
								"LEFT JOIN dosen c ".
								"ON a.kode_dosen = c.kode ".
								"WHERE b.semester%2=$semester_tipe AND a.tahun_akademik = '$tahun_akademik' ".                
								"ORDER BY b.nama,a.kelas");
		return $rs->row()->cnt;
		
	}
	
	function delete_by_kode_dosen($kode_dosen){
        $this->db->query("DELETE FROM pengampu WHERE kode_dosen='$kode_dosen'");
    }
	
	function delete_by_mk($kode_mk){
		$this->db->query("DELETE FROM pengampu WHERE kode_mk = '$kode_mk'");
	}
	
	function delete($kode){
		$this->db->query("DELETE FROM pengampu WHERE kode = '$kode'");		
	}
	
	function cek_for_update($kode,$kode_mk,$kode_dosen,$kelas,$tahun_akademik,$kode){		
		$rs = $this->db->query(
							   "SELECT CAST(COUNT(*) AS CHAR(1)) as cnt".
                               "FROM pengampu ".
							   "WHERE kode_mk='$kode_mk' AND ".
                               "      kode_dosen=$kode_dosen AND ".
                               "      kelas = '$kelas' AND ".
                               "      tahun_akademik='$tahun_akademik' ".
                               "      AND kode <> $kode");
		return $rs->row()->cnt;
	}
	
	function cek_for_insert($kode_mk,$kode_dosen,$kelas,$tahun_akademik,$kode){		
		$rs = $this->db->query(
							   "SELECT CAST(COUNT(*) AS CHAR(1)) as cnt".
                               "FROM pengampu ".
							   "WHERE kode_mk='$kode_mk' AND ".
                               "      kode_dosen=$kode_dosen AND ".
                               "      kelas = '$kelas' AND ".
                               "      tahun_akademik='$tahun_akademik' ");
		return $rs->row()->cnt;
	}
	
	function update($kode,$data){
		$this->db->where('kode',$kode);
        $this->db->update('pengampu',$data);
	}
	
	function insert($data){

        $this->db->insert('pengampu',$data);
		return $this->db->insert_id();
    }
}