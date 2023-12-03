<div class="voiture-card">
  <div>
    <h5><?php echo $titre; ?></h5>
    <p><?php echo $description; ?></p>
    <button class="button">
      <p class="titre"><?php echo $prix . "€"; ?></p>
    </button>
    <a href="index.php?page=vinfo&id=<?php echo $id; ?>" class="link">En savoir plus >></a>
  </div>
  <div>
    <img src="<?php echo $img; ?>" alt="Logo Garge V. Parrot" style="height:150px;">
  </div>
</div>