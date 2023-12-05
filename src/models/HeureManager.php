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

  public function changeHoraires($array)
  {

    require_once 'Heure.php';
    try {
      for ($i=0; $i<count($array); $i += 4){
        $modif = $this->pdo->prepare("UPDATE heures SET jour=?, hr_debut=?, hr_fin=? WHERE id_h=?");
        $modif->execute([$array[$i+1], $array[$i+2], $array[$i+3], $array[$i]]);
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

}
