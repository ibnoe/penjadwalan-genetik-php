<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Genetik extends CI_Controller
{
     
    private $PRAKTIKUM = 'PRAKTIKUM';
    private $TEORI = 'TEORI';
    private $LABORATORIUM = 'LABORATORIUM';
    
    private $jenis_semester;
    private $tahun_akademik;
    private $populasi;
    private $crossOver;
    private $mutasi;
    
    private $pengampu = array();
    private $individu = array(array(array()));
    private $sks = array();
    private $dosen = array();
    
    private $jam = array();
    private $hari = array();
    private $idosen = array();
    
    //waktu keinginan dosen
    private $waktu_dosen = array(array());
    private $jenis_mk = array(); //reguler or praktikum
    
    private $ruangLaboratorium = array();
    private $ruangReguler = array();
    private $logAmbilData;
    private $logInisialisasi;
    
    private $log;
    private $induk = array();
    
    //jumat
    private $kode_jumat;
    private $range_jumat = array();
    private $kode_dhuhur;
    private $is_waktu_dosen_tidak_bersedia_empty;
    
    
    
    function __construct($jenis_semester, $tahun_akademik, $populasi, $crossOver, $mutasi, $kode_jumat, $range_jumat, $kode_dhuhur)
    {        
        parent::__construct();        
        
        $this->jenis_semester = $jenis_semester;
        $this->tahun_akademik = $tahun_akademik;
        $this->populasi       = intval($populasi);
        $this->crossOver      = $crossOver;
        $this->mutasi         = $mutasi;
        $this->kode_jumat     = intval($kode_jumat);
        $this->range_jumat    = explode('-',$range_jumat);//$hari_jam = explode(':', $this->waktu_dosen[$j][1]);
        $this->kode_dhuhur    = intval($kode_dhuhur);
       
    }
    
    public function AmbilData()
    {
        
        $rs_data = $this->db->query("SELECT   a.kode,"
                                    . "       b.sks,"
                                    . "       a.kode_dosen,"
                                    . "       b.jenis "
                                    . "FROM pengampu a "
                                    . "LEFT JOIN matakuliah b "
                                    . "ON a.kode_mk = b.kode "
                                    . "WHERE b.semester%2 = $this->jenis_semester "
                                    . "      AND a.tahun_akademik = '$this->tahun_akademik'");
        
        $i = 0;
        foreach ($rs_data->result() as $data) {
            $this->pengampu[$i] = intval($data->kode);
            $this->sks[$i]         = intval($data->sks);
            $this->dosen[$i]       = intval($data->kode_dosen);
            $this->jenis_mk[$i]    = $data->jenis;
            $i++;
        }
        
        //var_dump($this->jenis_mk);
        //exit();
        
        //Fill Array of Jam Variables
        $rs_jam = $this->db->query("SELECT kode FROM jam");
        $i      = 0;
        foreach ($rs_jam->result() as $data) {
            $this->jam[$i] = intval($data->kode);
            $i++;
        }
        
        //Fill Array of Hari Variables
        $rs_hari = $this->db->query("SELECT kode FROM hari");
        $i       = 0;
        foreach ($rs_hari->result() as $data) {
            $this->hari[$i] = intval($data->kode);
            $i++;
        }
        
        
        $rs_RuangReguler = $this->db->query("SELECT kode "
                                            ."FROM ruang "
                                            ."WHERE jenis = '$this->TEORI'");
        $i               = 0;
        foreach ($rs_RuangReguler->result() as $data) {
            $this->ruangReguler[$i] = intval($data->kode);
            $i++;
        }
        
        
        $rs_Ruanglaboratorium = $this->db->query("SELECT kode "
                                                 ."FROM ruang "
                                                 ."WHERE jenis = '$this->LABORATORIUM'");
        $i                    = 0;
        foreach ($rs_Ruanglaboratorium->result() as $data) {
            $this->ruangLaboratorium[$i] = intval($data->kode);
            $i++;
        }
        
        //var_dump($this->ruangLaboratorium);
        //exit(0);
        
        $rs_WaktuDosen = $this->db->query("SELECT kode_dosen,".
                                          "CONCAT_WS(':',kode_hari,kode_jam) as kode_hari_jam ".
                                          "FROM waktu_tidak_bersedia");        
        $i             = 0;
        foreach ($rs_WaktuDosen->result() as $data) {
            $this->idosen[$i]         = intval($data->kode_dosen);
            $this->waktu_dosen[$i][0] = intval($data->kode_dosen);
            $this->waktu_dosen[$i][1] = $data->kode_hari_jam;
            $i++;
        }  
     
        
    }
    
    
    public function Inisialisai()
    {
        
        $jumlah_pengampu = count($this->pengampu);        
        $jumlah_jam = count($this->jam);
        $jumlah_hari = count($this->hari);
        $jumlah_ruang_reguler = count($this->ruangReguler);
        $jumlah_ruang_lab = count($this->ruangLaboratorium);
        
        for ($i = 0; $i < $this->populasi; $i++) {
            
            for ($j = 0; $j < $jumlah_pengampu; $j++) {
                
                $sks = $this->sks[$j];
                
                $this->individu[$i][$j][0] = $j;
                
                // Penentuan jam secara acak ketika 1 sks 
                if ($sks == 1) {
                    $this->individu[$i][$j][1] = mt_rand(0,  $jumlah_jam - 1);
                }
                
                // Penentuan jam secara acak ketika 2 sks 
                if ($sks == 2) {
                    $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 1);
                }
                
                // Penentuan jam secara acak ketika 3 sks
                if ($sks == 3) {
                    $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 2);
                }
                
                // Penentuan jam secara acak ketika 4 sks
                if ($sks == 4) {
                    $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 3);
                }
                
                $this->individu[$i][$j][2] = mt_rand(0, $jumlah_hari - 1); // Penentuan hari secara acak 
                
                if ($this->jenis_mk[$j] === $this->TEORI) {
                    $this->individu[$i][$j][3] = intval($this->ruangReguler[mt_rand(0, $jumlah_ruang_reguler - 1)]);
                } else {
                    $this->individu[$i][$j][3] = intval($this->ruangLaboratorium[mt_rand(0, $jumlah_ruang_lab - 1)]);                    
                }
            }
        }
    }
    
    private function CekFitness($indv)
    {
        $penalty = 0;
        
        $hari_jumat = intval($this->kode_jumat);
        $jumat_0 = intval($this->range_jumat[0]);
        $jumat_1 = intval($this->range_jumat[1]);
        $jumat_2 = intval($this->range_jumat[2]);
        
        //var_dump($this->range_jumat);
        //exit();
        
        $jumlah_pengampu = count($this->pengampu);
        
        for ($i = 0; $i < $jumlah_pengampu; $i++)
        {
          
          $sks = intval($this->sks[$i]);
          
          $jam_a = intval($this->individu[$indv][$i][1]);
          $hari_a = intval($this->individu[$indv][$i][2]);
          $ruang_a = intval($this->individu[$indv][$i][3]);
          $dosen_a = intval($this->dosen[$i]);        
          
          
            for ($j = 0; $j < $jumlah_pengampu; $j++) {                 
              
                $jam_b = intval($this->individu[$indv][$j][1]);
                $hari_b = intval($this->individu[$indv][$j][2]);
                $ruang_b = intval($this->individu[$indv][$j][3]);
                $dosen_b = intval($this->dosen[$j]);
                  
                  
                //1.bentrok ruang dan waktu dan 3.bentrok dosen
                
                //ketika pemasaran matakuliah sama, maka langsung ke perulangan berikutnya
                if ($i == $j)
                    continue;
                
                //#region Bentrok Ruang dan Waktu
                //Ketika jam,hari dan ruangnya sama, maka penalty + satu
                if ($jam_a == $jam_b &&
                    $hari_a == $hari_b &&
                    $ruang_a == $ruang_b)
                {
                    $penalty += 1;
                }
                
                //Ketika sks  = 2, 
                //hari dan ruang sama, dan 
                //jam kedua sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($sks >= 2)
                {
                    if ($jam_a + 1 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }
                
                
                //Ketika sks  = 3, 
                //hari dan ruang sama dan 
                //jam ketiga sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($sks >= 3) {
                    if ($jam_a + 2 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }
                
                //Ketika sks  = 4, 
                //hari dan ruang sama dan 
                //jam ketiga sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($sks >= 4) {
                    if ($jam_a + 3 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }
                
                //______________________BENTROK DOSEN
                if (
                //ketika jam sama
                    $jam_a == $jam_b && 
                //dan hari sama
                    $hari_a == $hari_b && 
                //dan dosennya sama
                    $dosen_a == $dosen_b)
                {
                  //maka...
                  $penalty += 1;
                }
                
                
                
                if ($sks >= 2) {
                    if (
                    //ketika jam sama
                      ($jam_a + 1) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan dosennya sama
                      $dosen_a == $dosen_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }
                
                if ($sks >= 3) {
                    if (
                    //ketika jam sama
                      ($jam_a + 2) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan dosennya sama
                      $dosen_a == $dosen_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }
                
                if ($sks >= 4) {
                    if (
                    //ketika jam sama
                      ($jam_a + 3) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan dosennya sama
                      $dosen_a == $dosen_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }                
            }
            
            //
            // #region Bentrok sholat Jumat
            if (($hari_a  + 1) == $hari_jumat) //2.bentrok sholat jumat
            {
                
                if ($sks == 1)
                {
                   if (
                       
                        ($jam_a == ($jumat_0 - 1)) ||
                        ($jam_a == ($jumat_1 - 1)) ||
                        ($jam_a == ($jumat_2 - 1))
                       
                       )
                   {
                       
                       $penalty += 1;
                   }
                }
                
                
                if ($sks == 2)
                {
                    if (
                          ($jam_a == ($jumat_0 - 2)) ||
                          ($jam_a == ($jumat_0 - 1)) ||
                          ($jam_a == ($jumat_1 - 1)) ||
                          ($jam_a == ($jumat_2 - 1))
                        )
                    {
                        /*
                        echo '$sks = ' . $sks. '<br>';
                        echo '$jam_a = ' . $jam_a. '<br>';
                        echo '($jumat_0 - 2) = ' . ($jumat_0 - 2) . '<br>';
                        echo '($jumat_0 - 1) = ' . ($jumat_0 - 1). '<br>';
                        echo '($jumat_1 - 1) = ' . ($jumat_1 - 1). '<br>';
                        echo '($jumat_2 - 1) = ' . ($jumat_2- 1). '<br>';
                        exit();
                        */
                        
                        $penalty += 1;                        
                    }
                }
                
                if ($sks == 3)
                {
                    if (
                          ($jam_a == ($jumat_0 - 3)) ||
                          ($jam_a == ($jumat_0 - 2)) ||
                          ($jam_a == ($jumat_0 - 1)) ||
                          ($jam_a == ($jumat_1 - 1)) ||
                          ($jam_a == ($jumat_2 - 1))
                        )
                    {                        
                        $penalty += 1;                        
                    }
                }
                
                if ($sks == 4)
                {
                    if (
                          ($jam_a == ($jumat_0 - 4)) ||
                          ($jam_a == ($jumat_0 - 3)) ||
                          ($jam_a == ($jumat_0 - 2)) ||
                          ($jam_a == ($jumat_0 - 1)) ||
                          ($jam_a == ($jumat_1 - 1)) ||
                          ($jam_a == ($jumat_2 - 1))
                        )
                    {                        
                        $penalty += 1;                        
                    }
                }
            }
            //#endregion
            
            //#region Bentrok dengan Waktu Keinginan Dosen
            //Boolean penaltyForKeinginanDosen = false;
            
            $jumlah_waktu_tidak_bersedia = count($this->idosen);
            
            for ($j = 0; $j < $jumlah_waktu_tidak_bersedia; $j++)
            {
                if ($dosen_a == $this->idosen[$j])
                {
                    $hari_jam = explode(':', $this->waktu_dosen[$j][1]);
                    
                    if ($this->jam[$jam_a] == $hari_jam[1] &&
                        $this->hari[$hari_a] == $hari_jam[0])
                    {                    
                        $penalty += 1;                        
                    }
                }                            
            }
                       
            
            //#endregion
            
            //#region Bentrok waktu dhuhur
            /*
            if ($jam_a == ($this->kode_dhuhur - 1))
            {                
                $penalty += 1;
            }
            */
            
        }      
        
        $fitness = floatval(1 / (1 + $penalty));  
        
        return $fitness;        
    }
    
    public function HitungFitness()
    {
        //hard constraint
        //1.bentrok ruang dan waktu
        //2.bentrok sholat jumat
        //3.bentrok dosen
        //4.bentrok keinginan waktu dosen 
        //5.bentrok waktu dhuhur 
        //=>6.praktikum harus pada ruang lab {telah ditetapkan dari awal perandoman
        //    bahwa jika praktikum harus ada pada LAB dan mata kuliah reguler harus 
        //    pada kelas reguler
        
        
        //soft constraint //TODO
        //$fitness = array();
        
        for ($indv = 0; $indv < $this->populasi; $indv++)
        {            
            $fitness[$indv] = $this->CekFitness($indv);            
        }
        
        return $fitness;
    }
    
    #endregion
    
    #region Seleksi
    public function Seleksi($fitness)
    {
        $jumlah = 0;
        $rank   = array();
        
        
        for ($i = 0; $i < $this->populasi; $i++)
        {
          //proses ranking berdasarkan nilai fitness
            $rank[$i] = 1;
            for ($j = 0; $j < $this->populasi; $j++)
            {
              //ketika nilai fitness jadwal sekarang lebih dari nilai fitness jadwal yang lain,
              //ranking + 1;
              //if (i == j) continue;
                
                $fitnessA = floatval($fitness[$i]);
                $fitnessB = floatval($fitness[$j]);
                
                if ( $fitnessA > $fitnessB)
                {
                    $rank[$i] += 1;                    
                }
            }
            
            $jumlah += $rank[$i];
        }
        
        $jumlah_rank = count($rank);
        for ($i = 0; $i < $this->populasi; $i++)
        {
            //proses seleksi berdasarkan ranking yang telah dibuat
            //int nexRandom = random.Next(1, jumlah);
            //random = new Random(nexRandom);
            $target = mt_rand(0, $jumlah - 1);           
          
            $cek    = 0;
            for ($j = 0; $j < $jumlah_rank; $j++) {
                $cek += $rank[$j];
                if (intval($cek) >= intval($target)) {
                    $this->induk[$i] = $j;
                    break;
                }
            }
        }
    }
    //#endregion
    
    public function StartCrossOver()
    {
        $individu_baru = array(array(array()));
        $jumlah_pengampu = count($this->pengampu);
        
        for ($i = 0; $i < $this->populasi; $i += 2) //perulangan untuk jadwal yang terpilih
        {
            $b = 0;
            
            $cr = mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();
            
            //Two point crossover
            if (floatval($cr) < floatval($this->crossOver)) {
                //ketika nilai random kurang dari nilai probabilitas pertukaran
                //maka jadwal mengalami prtukaran
                
                $a = mt_rand(0, $jumlah_pengampu - 2);
                while ($b <= $a) {
                    $b = mt_rand(0, $jumlah_pengampu - 1);
                }
                
                
                //var_dump($this->induk);
                
                
                //penentuan jadwal baru dari awal sampai titik pertama
                for ($j = 0; $j < $a; $j++) {
                    for ($k = 0; $k < 4; $k++) {                        
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }
                
                //Penentuan jadwal baru dai titik pertama sampai titik kedua
                for ($j = $a; $j < $b; $j++) {
                    for ($k = 0; $k < 4; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i + 1]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i]][$j][$k];
                    }
                }
                
                //penentuan jadwal baru dari titik kedua sampai akhir
                for ($j = $b; $j < $jumlah_pengampu; $j++) {
                    for ($k = 0; $k < 4; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }
            } else { //Ketika nilai random lebih dari nilai probabilitas pertukaran, maka jadwal baru sama dengan jadwal terpilih
                for ($j = 0; $j < $jumlah_pengampu; $j++) {
                    for ($k = 0; $k < 4; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }
            }
        }
        
        $jumlah_pengampu = count($this->pengampu);
        
        for ($i = 0; $i < $this->populasi; $i += 2) {
          for ($j = 0; $j < $jumlah_pengampu ; $j++) {
            for ($k = 0; $k < 4; $k++) {
                $this->individu[$i][$j][$k] = $individu_baru[$i][$j][$k];
                $this->individu[$i + 1][$j][$k] = $individu_baru[$i + 1][$j][$k];
            }
          }
        }
    }
    
    public function Mutasi()
    {
        $fitness = array();
        //proses perandoman atau penggantian komponen untuk tiap jadwal baru
        $r       = mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();
        $jumlah_pengampu = count($this->pengampu);
        $jumlah_jam = count($this->jam);
        $jumlah_hari = count($this->hari);
        $jumlah_ruang_reguler = count($this->ruangReguler);
        $jumlah_ruang_lab = count($this->ruangLaboratorium);
        
        for ($i = 0; $i < $this->populasi; $i++) {
            //Ketika nilai random kurang dari nilai probalitas Mutasi, 
            //maka terjadi penggantian komponen
            
            if ($r < $this->mutasi) {
                //Penentuan pada matakuliah dan kelas yang mana yang akan dirandomkan atau diganti
                $krom = mt_rand(0, $jumlah_pengampu - 1);
                
                $j = intval($this->sks[$krom]);
                
                switch ($j) {
                    case 1:
                        $this->individu[$i][$krom][1] = mt_rand(0, $jumlah_jam - 1);
                        break;
                    case 2:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 1);
                        break;
                    case 3:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 2);
                        break;
                    case 4:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 3);
                        break;
                }
                //Proses penggantian hari
                $this->individu[$i][$krom][2] = mt_rand(0, $jumlah_hari - 1);
                
                //proses penggantian ruang               
                
                if ($this->jenis_mk[$krom] === $this->TEORI) {
                    $this->individu[$i][$krom][3] = $this->ruangReguler[mt_rand(0, $jumlah_ruang_reguler - 1)];
                } else {
                    $this->individu[$i][$krom][3] = $this->ruangLaboratorium[mt_rand(0, $jumlah_ruang_lab - 1)];
                }
                
                
            }
            
            $fitness[$i] = $this->CekFitness($i);
        }
        return $fitness;
    }
    
    
    public function GetIndividu($indv)
    {
        //return individu;
        
        //int[,] individu_solusi = new int[mata_kuliah.Length, 4];
        $individu_solusi = array(array());
        
        for ($j = 0; $j < count($this->pengampu); $j++)
        {
            $individu_solusi[$j][0] = intval($this->pengampu[$this->individu[$indv][$j][0]]);
            $individu_solusi[$j][1] = intval($this->jam[$this->individu[$indv][$j][1]]);
            $individu_solusi[$j][2] = intval($this->hari[$this->individu[$indv][$j][2]]);                        
            $individu_solusi[$j][3] = intval($this->individu[$indv][$j][3]);            
        }
        
        return $individu_solusi;
    }
    
    
}