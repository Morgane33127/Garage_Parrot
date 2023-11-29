<div class="container margin-top">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <div class="py-3">
        <span class="button">1 rue de nulle part 33600 Pessac</span>
      </div>

      <div class="row align-items-start">
        <div class="col-sm-4">
          <span class="button">05.56.00.00.00</span>
        </div>
        <div class="col-sm-8">
          <p>
            Lundi : 08h00 - 18h00<br>
            Mardi : 08h00 - 18h00<br>
            Mercredi : 08h00 - 18h00<br>
            Jeudi : 08h00 - 18h00<br>
            Vendredi : 08h00 - 18h00<br>
            Samedi : 08h00 - 18h00<br>
            Dimanché : Fermé
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 p-5">
      <form method="POST" action="index.php?page=demande">
        <h3>Nous contacter</h3>
        <div class="row align-items-start">
          <div class="col-sm-4">
            <input type="text" class="form-control" name="nom" placeholder="Nom*" required>
          </div>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="prenom" placeholder="Prenom*" required>
          </div>
          <div class="col-sm-4">
            <input type="tel" class="form-control" name="tel" placeholder="Tel*" required>
          </div>
        </div>
        <div class="py-2">
          <input type="email" class="form-control" name="email" placeholder="Email*" required>
        </div>
        <div class="py-2">
          <textarea class="form-control" name="message" placeholder="Message**" required></textarea>
        </div>
        <div class="text-end">
          <button type="submit" class="button" name="contact">Envoyer</button>
        </div>
      </form>
    </div>
  </div>

</div>

<?php

require_once 'footer.php';
