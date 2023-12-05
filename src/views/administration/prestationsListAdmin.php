<div style="background-color: #F2F2F2; height:auto;">
  <div class="row p-3">
    <div class="col-6 text-start">
      <h5><i class="<?php echo $icons[$i]; ?>"> </i><?php echo $nom; ?></h5>
    </div>
    <div class="col-6 text-end">
    <button type="submit" name="suppP<?php echo $row->getId(); ?>"><i class="bi-trash-fill" style="color:red;"></i></button>
    <i class="bi-pen-fill" style="color:red;"></i>
       
    </div>
  </div>
  <div>
    <p><?php echo $largeDescription; ?></p>
  </div>
</div>