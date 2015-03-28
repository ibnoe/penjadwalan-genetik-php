<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a> <span class="divider">/</span></li>
      <li><a href="<?php echo base_url();?>web/dosen">Modul Dosen</a> <span class="divider">/</span></li>
      <li class="active">Tambah Data</li>
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
            <label>NIDN</label>
            <input id="nidn" type="text" value="<?php echo set_value('nidn');?>" name="nidn" class="input-xlarge" />
            
            <label>Nama</label>
            <input id="nama" type="text" value="<?php echo set_value('nama');?>" name="nama" class="input-xlarge" />
            
            <label>Alamat</label>
            <input id="alamat" type="text" value="<?php echo set_value('alamat');?>" name="alamat" class="input-xlarge" />
            
            <label>Telp</label>
            <input id="telp" type="text" value="<?php echo set_value('telp');?>" name="telp" class="input-xlarge" />       
            
			
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?php echo base_url() .'web/dosen'; ?>"><button type="button" class="btn">Cancel</button></a>
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