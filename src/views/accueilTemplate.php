<div class="container-sm margin-top center">

    <section id="presentation">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-sm display-none">
                    <img src="public/assets/img/garage.jpg" alt="photo garage-v-parrot, garage, automobile, voitures, réparation, entretien, vidange" 
                    style="width:500px;">
                </div>
                <div class="col-sm">
                    <h3>Présentation</h3>
                    <p>Bienvenue chez Garage V. Parrot, votre partenaire automobile de confiance. 
                        <br><br>
                        Notre petit garage propose une large gamme de services mais aussi des voitures
                        d'occasions, adaptées à tous les besoins. Chez nous, transparence et qualité sont nos priorités.
                        Notre équipe dévouée de mécaniciens expérimentés accueille chaque client chaleureusement dans une
                        atmosphère conviviale.
                        <br>
                        <br><a href="index.php?page=apropos" class="link">En savoir plus >></a>
                    </p>
                    <div>
                        <a href="index.php?page=contact"><button type="button" class="button">Nous contacter</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="prestations">
        <h3>Nos prestations</h3>
        <div class="container text-center">
            <div class="row align-items-start">
                <?php
                // Affichage des prestations
                echo $content1;
                ?>
            </div>
        </div>
    </section>

    <section id="valeurs">
        <h3>Nos valeurs</h3>
        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col-sm valeur">
                    <h3>Experience</h3>
                </div>
                <div class="col-sm valeur">
                    <h3>Rapidité</h3>
                </div>
                <div class="col-sm valeur">
                    <h3>Coûts</h3>
                </div>
                <div class="col-sm valeur">
                    <h3>Qualité</h3>
                </div>
                <div class="col-sm valeur">
                    <h3>Satisfaction client</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="Avis">
        <h3>Nos avis clients</h3>
        <div class="container-sm text-center">
            <div class="row align-items-start">
                <?php
                // Display notices
                echo $content2;
                ?>
            </div>
        </div>
        <div class="action-sup display-none1 display-block">
            <a href="index.php?page=avis"><button type="button" class="button">Laisser avis</button></a>
        </div>
    </section>

    <section id="voitures">
        <h3>Nos véhicules d'occasions</h3>
        <div class="container">
            <div class="row align-items-start display-none">
                <?php
                //Display cars
                echo $content3;
                ?>
            </div>
        </div>
        <div class="action-sup">
            <a href="index.php?page=vehicules"><button class="button">Voir +</button></a>
        </div>
    </section>

</div>

<?php
require 'footer.php';
