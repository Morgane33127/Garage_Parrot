<div class="container-sm margin-top center">

    <section id="presentation">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-sm display-none">
                    <img src="public/assets/img/garage.jpg" alt="photo garage v parrot" style="width:500px;">
                </div>
                <div class="col-sm">
                    <h3>Présentation</h3>
                    <p>Bienvenue chez Garage V. Parrot, votre partenaire automobile de
                        confiance. Notre petit garage offre des services de réparation et
                        d'entretien avec une équipe dévouée de mécaniciens expérimentés.
                        En plus de nos services, nous proposons également des voitures
                        d'occasion de qualité, adaptées à tous les besoins. Nous priorisons la
                        transparence, fournissant des devis clairs et des conseils honnêtes.
                        Chez nous, chaque client est accueilli chaleureusement dans une
                        atmosphère conviviale. Confiez-nous votre voiture, et nous nous
                        engageons à assurer son bon fonctionnement avec
                        professionnalisme.
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
                // Affichage des avis
                echo $content2;
                ?>
            </div>
        </div>
        <div class="action-sup display-none1 display-block">
            <a href="index.php?page=#"><button class="button">Laisser avis</button></a>
        </div>
    </section>

    <section id="voitures">
        <h3>Nos véhicules d'occasions</h3>
        <div class="container">
            <div class="row align-items-start display-none">
                <?php
                //Affichage des voitures
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
