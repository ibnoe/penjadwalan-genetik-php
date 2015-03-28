<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a> <span class="divider">/</span></li>
      <li class="active"><?php echo $page_title;?></li>
   </ul>
   <div class="container-fluid">
      <?php if(isset($msg)) { ?>                        
      <div class="alert alert-error">
         <button type="button" class="close" data-dismiss="alert">x</button>                
         <?php echo $msg;?>
      </div>
      <?php } ?>  
      <div class="row-fluid">
         <form class="form" method="POST">
            <label>Dosen</label>
            <select id = "kode_dosen" name="kode_dosen" class="input-xlarge" onchange="change_dosen_tidak_bersedia()">
               <?php foreach($rs_dosen->result() as $dosen) { ?>
               <option value="<?php echo $dosen->kode;?>" <?php echo isset($kode_dosen) ? ($kode_dosen === $dosen->kode ? 'selected':'') : '' ;?> /> <?php echo $dosen->nama;?>
                  <?php } ?>
            </select>
            <div class="form">
               <input type="hidden" name="hide_me" value="hide_me">
               <button type="submit" class="btn">Simpan</button>            
            </div>
            <br>
            <div class="widget-content">
               <table class="table table-striped table-bordered">
                  <thead>
                     <tr>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                  
                     <?php                 
                        foreach($rs_hari->result() as $hari) {
                           foreach($rs_jam->result() as $jam) { ?>
                     <tr>
                        <td><?php echo $hari->nama;?></td>
                        <td><?php echo $jam->range_jam;?></td>
                        <?php
                           $status = '';
                           foreach($rs_waktu_tidak_bersedia->result() as $wtb) {                           
                             
                             if($wtb->kode_hari === $hari->kode && $wtb->kode_jam === $jam->kode) {
                               $status = 'checked';
                             }
                           } ?>
                        <td>
                           <input type="checkbox" name="arr_tidak_bersedia[]" value="<?php echo $kode_dosen . '-'. $hari->kode . '-' . $jam->kode ?>" <?php echo $status; ?>> Tidak Bersedia
                        </td>
                     </tr>
                     <?php     
                        }                        
                      }
                    ?>
                    
                  </tbody>
               </table>
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