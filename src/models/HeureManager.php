<?php

class HeureManager
{

  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function affichageHoraires(): array
  {

    require_once 'Heure.php';
    try {
      $heures = $this->pdo->query("SELECT * FROM heures LEFT JOIN lbl ON jour=code_lbl");
      $heures->setFetchMode(PDO::FETCH_CLASS, 'Heure');
      $horaires = $heures->fetchAll(PDO :: FETCH_ASSOC);
      foreach ($horaires as $value){
        $horaireAAfficher = new Heure ($value['id_h'], $value['jour'], $value['hr_debut'], $value['hr_fin'], $value['lbl']);
        $horaireTab[]=$horaireAAfficher;
      }
      return($horaireTab);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
