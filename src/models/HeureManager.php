<?php

/**
 * Hour Manager
 * 
 * To select, update data from database.
 */

class HeureManager
{

  private PDO $pdo;

  /**
   * Constructor
   *
   */
  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  /**
   * To display times.
   *
   * @return array with data
   */
  public function affichageHoraires(): array
  {

    $heures = $this->pdo->query("SELECT * FROM heures LEFT JOIN lbl ON jour=code_lbl");
    $horaires = $heures->fetchAll(PDO::FETCH_ASSOC);
    foreach ($horaires as $value) {
      $horaireAAfficher = new Heure($value['id_h'], $value['jour'], $value['hr_debut'], $value['hr_fin'], $value['lbl']);
      $horaireTab[] = $horaireAAfficher;
    }
    return ($horaireTab);
  }

  /**
   * To update times.
   *
   * @param array $array
   */
  public function changeHoraires($array)
  {

    for ($i = 0; $i < count($array); $i += 4) {
      $modif = $this->pdo->prepare("UPDATE heures SET jour=?, hr_debut=?, hr_fin=? WHERE id_h=?");
      $modif->execute([$array[$i + 1], $array[$i + 2], $array[$i + 3], $array[$i]]);
    }
  }
}
