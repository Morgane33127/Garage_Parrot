<?php
include_once './config/const.php';
include_once './config/functions.php';
include_once './config/autoload.php';
include_once './config/Database.php';

ob_start();
$horaireController = new HoraireController();
$horaireController->affichageHeures();
$horaires = ob_get_clean();
?>

<div class="container-sm margin-top center">

    <h3>Mentions légales</h3>

    <section>
        <h5>EDITEUR</h5>
        <ul>
            <option>Garage V. Parrot</option>
            <option>SARL</option>
            <option>Adresse : <?php echo ADRESSE; ?></option>
            <option>Téléphone : <?php echo TELEPHONE; ?></option>
            <option>N° SIRET : N° ici</option>
            <option>Immatriculée au registre du commerce et des sociétés sous le numéro : N° ici</option>
            <option>Capital social : Capital ici</option>
        </ul>
        <p>La publication du site est assurée par "Responsable du site ici".</p>
    </section>

    <section>
        <h5>HEBERGEUR</h5>
        <p>Le site "site" est hébergé par "hebergeur".</p>
    </section>

    <section>
        <h5>TRAITEMENT DES DONNEES PERSONNELLES ET UTILISATION DES COOKIES</h5>
        <p>Le traitement des données recueillies sur le site est assuré par la société à responsabilités limités, Garage V. Parrot,
            immatriculée au RCS sous le numéro "N°" et dont le siège social est situé au
            <?php echo ADRESSE; ?>.</p>
        <h6>1- Protection des données et politique de confidentialité</h6>
        <h6>a. DPO</h6>
        <p>Conformément à la réglementation, la société Garage V. Parrot n’est pas tenue d’élire un Délégué à la Protection des Données car :</p>
        <ul>
            <option>Son activité est du domaine privé.</option>
            <option>Son activité principale n’assure pas un suivi régulier de personnes à grande échelle.</option>
            <option>Son activité principale n’assure pas un suivi régulier de données à caractère sensibles à grande échelle.</option>
        </ul>
        <h6>b. Conditions de collecte et données collectées</h6>
        <p>Afin d’améliorer nos services et répondre à vos demandes spécifiques,
            la société Garage V. Parrot est susceptible de collecter et d’utiliser vos informations personnelles lors :</p>
        <ul>
            <option>Du contact via les formulaires de demande de contact.</option>
            <option>De la transmission d’informations par email, messagerie ou téléphone.</option>
        </ul>
        <p>Le traitement des données personnelles repose sur la base de l’intérêt légitime mentionné à l’article 6 du RGPD.
            Ainsi selon cette base le traitement de vos données est nécessaire aux fins des intérêts légitimes de la société Garage V. Parrot.
            Toutes les données personnelles obtenues seront traitées de manière confidentielle et dans le strict respect de vos des intérêts.</p>
        <p>Les données recueillies par les autres moyens énoncés ci-dessus sont des données à caractère personnel :</p>
        <ul>
            <option>Nom, prénom, adresse, email, téléphone.</option>
        </ul>
        <h6>c. Utilisation et protection de vos données</h6>
        <p>Vos données sont collectées pour les intérêts légitimes de la société Garage V. Parrot.
            Afin de garantir la sécurité et la confidentialité de vos données nous avons mis en place des systèmes techniques de protection.</p>
        <h6>d. Partage de vos données</h6>
        <p>Vos données sont reversées exclusivement aux besoins de la société Garage V. Parrot.
            Aucun transfert de données n’est réalisé. La seule exception concerne les autorités de l'Etat français
            pour lesquelles la société Garage V. Parrot se réserve le droit de tenir à disposition toutes les données collectées sans restriction ni contrainte.</p>
        <h6>e. Durée de conservation</h6>
        <p>Ces données sont conservées pour une durée de 36 mois, conformément aux obligations du Règlement Général sur la Protection des Données "RGPD".
            Sans activité de votre part et passé ce délai toutes vos informations sont supprimés de notre base de données.</p>
        <h6>2- Gestion des cookies</h6>
        <p>A l’exception des cookies indispensables au fonctionnement du site,
            aucun cookie nécessitant le consentement de l’utilisateur n’est utilisé par la société Garage V. Parrot.</p>
        <h6>3- Vos droits</h6>
        <p>Tout visiteur possède des droits d’accès, de rectification, droit à l’oubli, droit de s’opposer à toute collecte de données conformément
            à la réglementation.</p>
        <p>Afin de faire valoir vos droits vous pouvez nous contacter à l’adresse suivante : v.parrot@exemple.com ou à l’adresse postale suivante :
            <?php echo ADRESSE; ?>. Pour cela vous devrez fournir une preuve de votre identité.</p>
        <h6>4- La Commission nationale de l'informatique et des libertés (CNIL)</h6>
        <p>Tout visiteur possède également le droit de déposer une plainte auprès de la Commission nationale de l'informatique et des libertés (CNIL).
            Le standard de la CNIL est joignable au 01 53 73 22 22 ou par courrier à l’adresse suivante :</p>
        <p class="text-center">
            Commission nationale de l'informatique et des libertés
            <br>
            3 Place de Fontenoy
            <br>
            TSA 80715
            <br>
            75334 PARIS CEDEX 07
        </p>
    </section>

</div>

<?php
require 'footer.php';