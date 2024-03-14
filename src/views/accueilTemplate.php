<div class="container-sm margin-top center">

    <section id="presentation">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-sm display-none">
                    <img src="public/assets/img/garage.jpg" alt="photo garage-v-parrot, garage, automobile, voitures, réparation, entretien, vidange" 
                    style="width:500px;">
                </div>
                <div class="col-sm">
                    <h1>Présentation</h1>
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
        <h2>Nos prestations</h2>
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
        <h2>Nos valeurs</h2>
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
                    <h3>Satisfaction</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="Avis">
        <h2>Nos avis clients</h2>
        <div class="container-sm text-center">
            <div id="slider" class="row">
            <div class="col-1 text-center" id="back"><</div>
            <div class="col" id="div0"></div>
                <?php
                // Display notices
                echo $content2;
                ?>
            <div  class="col-1 text-center" id="next">></div>
        </div>
        <div class="action-sup display-none1 display-block">
            <a href="index.php?page=avis"><button type="button" class="button">Laisser avis</button></a>
        </div>
    </section>

    <section id="voitures">
        <h2>Nos véhicules d'occasions</h2>
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
