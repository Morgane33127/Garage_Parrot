<div class="row voiture-card display-none">
  <div class="col-sm-9">
    <h5><?php echo $titre; ?></h5>
    <p><?php echo $description . " *** " . $kilometre . "km *** "; ?></p>
    <button class="button">
      <p class="titre"><?php echo $prix . "€"; ?></p>
    </button>
    <a href="index.php?page=vinfoadmin&id=<?php echo $id; ?>" class="link">En savoir plus >></a>
  </div>
  <div class="col-sm-2">
    <img src="<?php echo $img; ?>" alt="<?php echo $img; ?>" style="height:150px;" width="100%">
  </div>
  <div class="col-sm-1">
    <button class=" trash-button" type="submit" name="delete_v_<?php echo $row->getId(); ?>"> <i class="bi-x-circle-fill"></i></button>
  </div>
</div>

<!--responsive voiture card -->
<div id="voiture-card" class="row voiture-card display-none1 display-block ">
  <h5><?php echo $titre; ?></h5>
  <p class="titre"><?php echo $prix . "€"; ?></p>
  <a href="index.php?page=vinfoadmin&id=<?php echo $id; ?>" class="link">En savoir plus >></a>
  <div class="col-sm-3">
    <img class="voiture-card-img" src="<?php echo $img; ?>" alt="<?php echo $img; ?>">
  </div>
  <p><?php echo $description . "<br> *** " . $kilometre . "km *** "; ?></p>
  <button class="button display-none">Contacter</button>
  <button class=" trash-button" type="submit" name="delete_v_<?php echo $row->getId(); ?>"> <i class="bi-x-circle-fill"></i> </button>
</div>