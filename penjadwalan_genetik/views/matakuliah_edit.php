<?php foreach($rs_mk->result() as $mk) {} ?>
<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a> <span class="divider">/</span></li>
      <li><a href="<?php echo base_url();?>web/matakuliah">Modul Matakuliah</a> <span class="divider">/</span></li>
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
            <label>Kode Matakuliah</label>
            <input id="kode_mk" type="text" value="<?php echo $mk->kode_mk;?>" name="kode_mk" class="input-xlarge" />
            
            <label>Nama</label>
            <input id="nama" type="text" value="<?php echo $mk->nama;?>" name="nama" class="input-xlarge" />
            
            <label>Category</label>
            <select name="jenis" class="input-xlarge">            
              <option value="TEORI" <?php echo $mk->jenis === 'TEORI' ? 'selected':'';?> /> TEORI
              <option value="PRAKTIKUM" <?php echo $mk->jenis === 'PRAKTIKUM' ? 'selected':'';?> /> PRAKTIKUM            
            </select>
            
            <label>SKS</label>
            <input id="sks" type="text" value="<?php echo $mk->sks;?>" name="sks" class="input-xsmall" />
            
            <label>Semester</label>
            <input id="semester" type="text" value="<?php echo $mk->semester;?>" name="semester" class="input-xsmall" />       
            
			
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?php echo base_url() .'web/matakuliah'; ?>"><button type="button" class="btn">Cancel</button></a>
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