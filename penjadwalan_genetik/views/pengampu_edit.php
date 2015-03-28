<?php foreach($rs_pengampu->result() as $pengampu) {} ?>

<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a> <span class="divider">/</span></li>
      <li><a href="<?php echo base_url();?>web/pengampu">Modul Pengampu</a> <span class="divider">/</span></li>
      <li class="active">Ubah Data</li>
   </ul>
   
   <div class="container-fluid">
      <div class="row-fluid">
        <?php if(isset($msg)) { ?>                        
              <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>                
                <?php echo $msg;?>
              </div>  
        <?php } ?>   

        <form id="tab" method="POST" >
            <!--          
            <label>Semester</label>
            <select id = "semester_tipe" name="semester_tipe" class="input-xlarge" onchange="get_matakuliah();">            
              <option value="1" <?php echo isset($semester_tipe) ? ($semester_tipe === '1' ? 'selected':'') : '' ;?> /> GANJIL
              <option value="0" <?php echo isset($semester_tipe) ? ($semester_tipe === '0' ? 'selected':'') : '' ;?> /> GENAP
            </select>
             -->           
            <label>Matakuliah</label>
            <select name="kode_mk" class="input-xlarge" id="option_matakuliah">
              <?php foreach($rs_mk->result() as $mk) { ?>
                <option value="<?php echo $mk->kode;?>" <?php echo $mk->kode === $pengampu->kode_mk ? 'selected':'' ;?> /> <?php echo $mk->nama;?>
              <?php } ?>            
            </select>
            
            <label>Dosen</label>
            <select name="kode_dosen" class="input-xlarge">
              <?php foreach($rs_dosen->result() as $dosen) { ?>
                <option value="<?php echo $dosen->kode;?>" <?php echo $dosen->kode === $pengampu->kode_dosen ? 'selected':'' ;?> /> <?php echo $dosen->nama;?>
              <?php } ?>
            </select>
            
            <label>Kelas</label>
            <input id="kelas" type="text" value="<?php echo $pengampu->kelas;?>" name="kelas" class="input-xsmall" />
            
            
            <label>Tahun Akademik</label>
            <select id="tahun_akademik" name="tahun_akademik" class="input-xlarge">
              <option value="2011-2012" <?php echo $pengampu->tahun_akademik === '2011-2012' ? 'selected':'';?> /> 2011-2012
              <option value="2012-2013" <?php echo $pengampu->tahun_akademik === '2012-2013' ? 'selected':'';?> /> 2012-2013
              <option value="2013-2014" <?php echo $pengampu->tahun_akademik === '2013-2014' ? 'selected':'';?> /> 2013-2014
              <option value="2014-2015" <?php echo $pengampu->tahun_akademik === '2014-2015' ? 'selected':'';?> /> 2014-2015
              <option value="2015-2016" <?php echo $pengampu->tahun_akademik === '2015-2016' ? 'selected':'';?> /> 2015-2016
              <option value="2016-2017" <?php echo $pengampu->tahun_akademik === '2016-2017' ? 'selected':'';?> /> 2016-2017
              <option value="2017-2018" <?php echo $pengampu->tahun_akademik === '2017-2018' ? 'selected':'';?> /> 2017-2018
              <option value="2018-2019" <?php echo $pengampu->tahun_akademik === '2018-2019' ? 'selected':'';?> /> 2018-2019
              <option value="2019-2020" <?php echo $pengampu->tahun_akademik === '2019-2020' ? 'selected':'';?> /> 2019-2020            
            </select>
			
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?php echo base_url() .'web/pengampu'; ?>"><button type="button" class="btn">Cancel</button></a>
            </div>
        </form>

        <footer>
          <hr />
          <p class="pull-right">Design by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
          <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
        </footer>

      </div>
   </div>
</div>      