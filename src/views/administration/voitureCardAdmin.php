<!--responsive voiture card -->
<div id="voiture-card" class="col-4 voiture-card">
<button class=" trash-button" type="submit" name="delete_v_<?php echo $row->getId(); ?>"> <i class="bi-x-circle-fill"></i> </button>
  <h5><?php echo $titre; ?></h5>
  <p class="titre"><?php echo $prix . "€"; ?></p>
  <div class="col-sm-3">
    <img class="voiture-card-img" src="<?php echo $img; ?>" alt="<?php echo $img; ?>">
  </div>
  <p><?php echo $description . "<br> *** " . $kilometre . "km *** "; ?></p>
  <a href="index.php?page=vinfoadmin&id=<?php echo $id; ?>" class="button">En savoir plus</a>
</div>