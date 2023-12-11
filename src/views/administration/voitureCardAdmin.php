<div class="row voiture-card">
  <div class="col-sm-9">
    <h5><?php echo $titre; ?></h5>
    <p><?php echo $description; ?></p>
    <button class="button">
      <p class="titre"><?php echo $prix . "€"; ?></p>
    </button>
    <a href="index.php?page=vinfoadmin&id=<?php echo $id; ?>" class="link">En savoir plus >></a>
  </div>
  <div class="col-sm-2">
    <img src="<?php echo $img; ?>" alt="<?php echo $img; ?>" style="height:150px;"  width="100%">
  </div>
  <div class="col-sm-1">
        <button type="submit" name="delete_v_<?php echo $row->getId(); ?>"> <i class="bi-x-circle-fill" style="color:red;"></i> </button>
      </div>
</div>