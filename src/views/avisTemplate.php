<div class="container margin-top">

  <h3>Avis clients</h3>

  <div class="action-sup">
    <button type="submit" class="button" data-bs-toggle="modal" data-bs-target="#ajouterAvis">Laisser un avis</button>
  </div>

  <div id="avis">
    <div class="row align-items-start">
      <?php
      // Contenus
      echo $content;
      ?>
    </div>
  </div>

  <!-- Modal -->
  <form method="POST" action="index.php?page=demande">
    <div class="modal fade" id="ajouterAvis" tabindex="-1" aria-labelledby="ajouterAvisLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="ajouterAvisLabel">Laisser un avis</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <div class="row align-items-start">
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="nom" placeholder="Nom*" required>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="prenom" placeholder="Prenom*" required>
                </div>
              </div>
              <div class="py-2">
                <input type="text" class="form-control" name="titre" placeholder="Titre de l'avis*" required>
              </div>
              <div class="py-2">
                <textarea class="form-control" name="message" placeholder="Message*" required></textarea>
              </div>
              <div class="input-group py-2">
                <span class="input-group-text">Note* : </span>
                <select class="form-select" id="note" name="note">
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="button" name="ajouteravis">Valider</button>
          </div>
        </div>
      </div>
    </div>
  </form>

</div>

<?php

require_once 'footer.php';
