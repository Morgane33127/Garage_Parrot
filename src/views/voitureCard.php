<div id="voiture-card" class="col-4 voiture-card">
  <h5><?php echo $titre; ?></h5>
  <p class="titre"><?php echo $prix . "€"; ?></p>
  <div class="col-sm-3">
    <img class="voiture-card-img" src="<?php echo $img; ?>" alt="<?php echo $titre; ?>, voiture, occasion">
  </div>
  <p><?php echo $description . "<br> *** " . $kilometre . "km *** "; ?></p>
  <a href="<?php echo BASE_URL; ?>/v-info/<?php echo $id; ?>" class="button">En savoir plus</a>
</div>