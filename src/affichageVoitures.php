<?php

require('C:/wamp64-2/www/Garage_Parrot/config/db.php');

if (empty($_GET['prix']) && empty($_GET['km']) && empty($_GET['year'])) {
  $voitures = $pdo->query("SELECT * FROM voitures");
} else if (!empty($_GET['prix'])) {
  $prix = $_GET['prix'];
  $voitures = $pdo->prepare("SELECT * FROM voitures WHERE prix <= ? ");
  $voitures->execute([$prix]);
} else if (!empty($_GET['km'])) {
  $km = $_GET['km'];
  $voitures = $pdo->prepare("SELECT * FROM voitures WHERE kilometre <= ?");
  $voitures->execute([$km]);
} else if (!empty($_GET['year'])) {
  $year = $_GET['year'];
  $voitures = $pdo->prepare("SELECT * FROM voitures WHERE annee >= ?");
  $voitures->execute([$year]);
}

foreach ($voitures as $row) {
  $id = $row['id_v'];
  $titre = $row['titre_v'];
  $description = $row['petite_description_v'];
  $img = $row['img'];
  $prix = number_format($row['prix'], 0, ',', ' ');
  $img = '../public/assets/img/' . $row['img'];
?>
  <div class="voiture-card">
    <div>
      <h5><?php echo $titre; ?></h5>
      <p><?php echo $description; ?></p>
      <button type="submit">
        <?php echo $prix . "€"; ?>
      </button>
      <a class="link" href="index.php?page=vinfo&id=<?php echo $id; ?>">En savoir plus >></a>
    </div>
    <div>
      <img src="<?php echo $img; ?>" alt="Logo Garge V. Parrot" style="height:150px;">
    </div>
  </div>
<?php
}
