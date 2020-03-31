<!-- ========= V U E =============================================================================================
 fichier				: ./mvc/vue/film/liste.inc.php
 auteur					: chaurand lucas
 date de création		: novembre 2019
 date de modification	:
 rôle					: permet de générer le code xhtml de la partie centrale de la page avec la liste de tout les films
 ================================================================================================================= -->
<div id='content2'>
	Liste de tout les films :

	<table id="tab">
		<tr>
			<th> les <?php echo $NbFilms; ?> films de notre cinémathèque</th>
			<th> Section n° <?php echo $section ?> / <?php echo $nbSection ?></th>
			<th colspan="2"> films  n°<?php echo $numPremierFilm ?> à <?php echo $numDernierFilm ?> </th>
		</tr>
		<tr>
			<td class="titre">titre</td>
			<td class="titre">genre</td>
			<td class="titre">année</td>
			<td class="titre">durée</td>
		</tr>

<?php

while (! $ListeFilms->estVide()) {
    $unFilm = $ListeFilms->getUnElement();
    echo "
           <tr>
            <td> <a href='.\index.php?module=film&page=fiche&section=".$unFilm->numFilm."' title='Un film de ".$unFilm->prenomRealisateur." ".$unFilm->nomRealisateur."'>".$unFilm->titre."</a>
            <td> ".$unFilm->libelleGenre."
            <td> ".$unFilm->anneeSortie."
            <td> ".$unFilm->duree."
         </tr>";
}

?>

</table>

<div class='alignement'>
<?php 
echo $navigation->getXhtmlBoutons();
?>
</div>
<div class='alignement'>
<?php 
echo $navigation->getXhtmlChiffres();
?>
</div>


</div><!-- content2 -->



