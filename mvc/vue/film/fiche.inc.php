<!-- ========= V U E =============================================================================================
 fichier				: ./mvc/vue/film/fiche.inc.php
 auteur					: chaurand lucas
 date de création		: novembre 2019
 date de modification	:
 rôle					: permet de générer le code xhtml de la partie centrale de la page avec la fiche d'un film
 ================================================================================================================= -->
<div id='content2'>
<?php
echo "fiche descriptive du film : " . $infos->titre;
?>
 <div>
  <?php
echo "<img class='affiche' alt='' src='" . $affiche . "'/>";
echo "<ul>
            <li class='ongletActif'> <a href='./index.php?module=film&page=fiche&action=information&section=" . $section . "'> informations </a></li>
             <li class='onglets'> <a href='./index.php?module=film&page=fiche&action=histoire&section=" . $section . "'> histoire </a></li>
             <li class='onglets'> <a href='./index.php?module=film&page=fiche&action=acteurs&section=" . $section . "'> acteurs </a></li>
             <li class='onglets'> <a href='./index.php?module=film&page=fiche&action=notation&section=" . $section . "'> notation </a></li>
             <li class='onglets'> <a href='./index.php?module=film&page=fiche&action=commentaire&section=" . $section . "'> commentaire </a></li>";
?>

 </div>
	
 <?php

switch ($action) {

    case "defaut":
        echo "<div class='texte'>".$infos->titre . " est le " . chaine::placementnombre($infos->positionFilm) . " film dans notre cinémathèque du " . chaine::genreReal($infos->sexeRealisateur) . " " . chaine::Nation($infos->nationalitéRealisateur, $infos->sexeRealisateur) . " " . $infos->prenomRealisateur . " " . $infos->nomRealisateur . " . <br/>" . "C'est " . " " . chaine::typeFilm($infos->genre) . " " . $infos->nationaliteFilm . " d'une durée de " . $infos->DureeHeure . " heure et " . $infos->DureeMinute . " minutes qui est sorti dans les salles de cinéma en France le " . chaine::dateMois($infos->dateSortie) . " . </div>";
        break;

    case "information":

        echo "<div class='texte'>".$infos->titre . " est le " . chaine::placementnombre($infos->positionFilm) . " film dans notre cinémathèque du " . chaine::genreReal($infos->sexeRealisateur) . " " . chaine::Nation($infos->nationalitéRealisateur, $infos->sexeRealisateur) . " " . $infos->prenomRealisateur . " " . $infos->nomRealisateur . " . <br/>" . "C'est " . " " . chaine::typeFilm($infos->genre) . " " . $infos->nationaliteFilm . " d'une durée de " . $infos->DureeHeure . " heure et " . $infos->DureeMinute . " minutes qui est sorti dans les salles de cinéma en France le " . chaine::dateMois($infos->dateSortie) . " . </div>";
        break;

    case "histoire":
        echo "<div class='texte'>". $synopsis." </div>";
        break;

    case "acteurs":
        if ($acteurs->estVide()) {
            echo "<div class='texte'>Aucun acteur n'est actuellement référencé pour ce film dans notre base de données. </div>";
        } Else {
            while (! $acteurs->estVide()) {
                $unacteur = $acteurs->getUnElement();
                echo "<div class=acteur>
                    <div class=infoAct>
                        <img alt='' src='".$unacteur->photo."' />
                        " . $unacteur->prenomNom . "<br/>
                        " . $unacteur->age . "<br/>
                        né le " . $unacteur->dateNaissance . "<br/>
                        à " . $unacteur->villeNaissance . "<br/>
                        " . $unacteur->paysNaissance . "
                   </div>
                   <div class='texte'>
                   Dans ce film, " . $unacteur->prenomNom . " joue le rôle de " . $unacteur->role . ". " . chaine::ageFouM($unacteur->sexe) . $unacteur->ageDansFilm . " lors de la sortie du film en France
                   </div>
                    </div>";
            
            /*
            foreach ($acteurs as $unacteur) {
                echo "<div class=acteur> 
                    <div class=infoAct>
                        " . $unacteur->prenomNom . "<br/>
                        " . $unacteur->age . "<br/>
                        né le " . $unacteur->dateNaissance . "<br/>
                        à " . $unacteur->villeNaissance . "<br/>
                        " . $unacteur->paysNaissance . "
                   </div>
                   Dans ce film, " . $unacteur->prenomNom . " joue le rôle de " . $unacteur->role . ". " . chaine::ageFouM($unacteur->sexe) . $unacteur->ageDansFilm . " lors de la sortie du film en France"; // a faire "il etait agée
            }*/
        }
        }

        break;

    case "notation":
        echo "<div class='travaux'>
                <img alt='' src='".$img."'/>
               </div>";

        break;

    case "commentaire":
        echo "<div class='travaux'>
                <img alt='' src='".$img."'/>
               </div>";
        break;
}

?>


</div><!-- content2 -->



