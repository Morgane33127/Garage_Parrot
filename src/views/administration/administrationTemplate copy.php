<div class="wrapper" style="margin-top: 150px;">
  <div class="one">
    <form method="POST" action="#">
      <div class="row align-items-start">
        <div class="col-3">
          <h3>Nos horaires</h3>
        </div>
        <div class="col-3 text-end">
          <button type="submit" class="button" name="majheures"> <i class="bi-pen-fill"></i> Mettre à jour</button>
        </div>
      </div>
      <div class="row align-items-start">
        <div class="col" style="width:500px;" id="form-h">

          <?php
          echo $content1;
          ?>
        </div>

        <div class=" col text-center">
          <div>
            <button type="submit" class="button_admin">Ajouter un utilisateur</button>
          </div>
          <div>
            <button type="submit" class="button_admin">Véhicules à la vente</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="two">
    <form action="demande.php" method="POST">
    <div class="row align-items-start p-3">
      <div class="col-3">
        <h3>Nos prestations</h3>
      </div>
      <div class="col-9">
        <button type="submit" class="button" name="ajouterUnePrestation">Ajouter</button>
      </div>
    </div>

    <?php

echo $content2;
    ?>
    </form>
  </div>

  <div class="three">
    <div>
      <h3 class="p-3">Avis à vérifier</h3>
      <button type="submit" class="button">Ajouter</button>
    </div>
    <?php
echo $content3;
    ?>

  </div>
</div>

<script>
  let div = document.getElementById('form-h');
  let input = div.getElementsByTagName('input');
  for (let i = 0; i < input.length; i++) {
    input[i].addEventListener("change", () => {
      console.log(input[i].value);

    })
  };
</script>