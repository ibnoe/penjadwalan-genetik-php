
  <?php foreach($rs_mk->result() as $mk) { ?>
    <option value="<?php echo $mk->kode?>" > <?php echo $mk->nama;?> </option>
  <?php } ?>
