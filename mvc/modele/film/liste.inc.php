<?php

/*
 * =========== M O D E L E ========================================================================================
 * fichier : liste.inc.php
 * auteur :
 * date de création :
 * date de modification: juin 2017 : refactoring MVC objet
 * rôle : la classe générique d'accès aux données. Joue le rôle du modèle dans l'architecture MVC.
 * ================================================================================================================
 */
class modeleFilmListe extends modeleFilm
{

    /**
     *
     * @param
     * @return
     */
    public function getListeFilms($debut, $nb)
    {
        $sql = "SELECT DATE_FORMAT(film.`dateSortieFilm`,'%Y') as anneeSortie,film.`dureeFilm` as duree, genre.`libelleGenre`, nomPersonne as nomRealisateur , film.`numFilm`, personne.`prenomPersonne` as prenomRealisateur ,film.`titreFilm` as titre
        FROM film
        INNER JOIN genre
        INNER JOIN realisateur
        INNER JOIN personne
        WHERE film.`numGenreFilm` = genre.`numGenre` and
        realisateur.`numRealisateur`= personne.`numPersonne` and
        realisateur.`numRealisateur` = film.`numRealisateurFilm`
        ORDER BY film.`titreFilm`
        LIMIT ".$debut." , ".$nb.";";

        $resultat = $this->executerRequete($sql);
        $collection = new collection();

        while ($objet = $resultat->fetchObject()) {

            $collection->ajouter($objet);
        }

        return $collection;
    }
} // class

?>