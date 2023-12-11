<div class="voiture-card">
  <div class="row p-3">
    <div class="col-6 text-start">
      <h5><i class="<?php echo $icons[$i]; ?>"> </i><?php echo $nom; ?></h5>
    </div>
    <div class="col-5 text-end">
    <button type="submit" name="supp_p_<?php echo $row->getId(); ?>"><i class="bi-trash-fill" style="color:red;"></i></button>    
    </div>
    <div class="col-1 text-start">
    <button type="submit" name="update_p_<?php echo $row->getId(); ?>"><i class="bi-pen-fill" style="color:grey;"></i> </button>    
    </div>
  </div>
  <div class="mx-5 row">
  <input name="presta_petite_description_<?php echo $row->getId(); ?>" value="<?php echo $petiteDescription; ?>">
<textarea maxlength="1500" name="presta_large_description_<?php echo $row->getId(); ?>"><?php echo $largeDescription; ?></textarea>
  </div>
</div>