<?php

/*
 * =========== M O D E L E ========================================================================================
 * fichier : fiche.inc.php
 * auteur :
 * date de création :
 * date de modification:
 * ================================================================================================================
 */
class modeleFilmFiche extends modeleFilm
{

    public function getInformationsFilm($numFilm)
    {
        $sql = "SELECT DATE_FORMAT(DateSortieFilm,'%d %M %Y') as dateSortie,
         DATE_FORMAT(dureeFilm,'%H') as DureeHeure,
        DATE_FORMAT(dureeFilm,'%i') as DureeMinute,
        libelleGenre as genre,
        p1.libellePays as nationaliteFilm,p2.`libellePays` as nationalitéRealisateur,
        nomPersonne as nomRealisateur ,personne.`prenomPersonne` as prenomRealisateur,
        film.`numRealisateurFilm` as numRealisateur,
        film.`numFilm`,
        sexePersonne as sexeRealisateur,
        film.`titreFilm` as titre,
        film.synopsisFilm as synopsis
        FROM film
        INNER JOIN PAYS p1
        INNER JOIN PAYS p2
        INNER JOIN genre
        INNER JOIN realisateur
        INNER JOIN personne
        WHERE film.`numFilm`='" . $numFilm . "'
            AND film.`numGenreFilm` = genre.`numGenre`
            AND realisateur.`numRealisateur`= personne.`numPersonne`
            AND realisateur.`numRealisateur` = film.`numRealisateurFilm`
            AND p1.`numPays` = film.`numPaysFilm`
            AND p2.`numPays` = personne.`numPaysPersonne`;";
        $resultat = $this->executerRequete($sql);
        $resultat = $resultat->fetchObject();

        return $resultat;
    }

    public function getPositionFilmParRealisateur($nomFilm)
    {
        $sql = "SELECT count(titreFilm) as positionFilm
        FROM film
        INNER JOIN realisateur
        INNER JOIN personne
        WHERE film.`numRealisateurFilm` = (select film.`numRealisateurFilm` from film WHERE film.`titreFilm`='" . $nomFilm . "')
        AND realisateur.`numRealisateur`= personne.`numPersonne`
        AND realisateur.`numRealisateur` = film.`numRealisateurFilm`
        AND dateSortieFilm <= (select film.`dateSortieFilm` from film WHERE film.`titreFilm`='" . $nomFilm . "')
        ORDER BY film.`dateSortieFilm`;";
        $resultat = $this->executerRequete($sql);
        $resultat = $resultat->fetchObject()->positionFilm;

        return $resultat;
    }

    public function getActeurs($numfilm)
    {
        $sql = "SELECT CONCAT(FLOOR(DATEDIFF(now(),dateNaissancePersonne)/365),' ', 'ans') as age,
CONCAT(FLOOR(DATEDIFF(film.`dateSortieFilm`,dateNaissancePersonne)/365),' ', 'ans')as ageDansFilm,
personne.`dateNaissancePersonne`as dateNaissance,
libellePays as paysNaissance, CONCAT(prenomPersonne,' ',nomPersonne) as prenomNom,
participer.role,
personne.`sexePersonne`as sexe,
personne.`villeNaissancePersonne`as villeNaissance
FROM personne INNER JOIN acteur  INNER JOIN participer INNER JOIN pays INNER JOIN film
WHERE personne.`numPersonne` = acteur.`numActeur`
AND participer.`numActeur`= acteur.`numActeur`
AND participer.`numFilm` = " . $numfilm . "
AND personne.`numPaysPersonne`= pays.`numPays`
AND film.`numFilm`= participer.`numFilm`;";

        $resultat = $this->executerRequete($sql);
        $collection = new collection();

        while ($objet = $resultat->fetchObject()) {

            $collection->ajouter($objet);
        }

        return $collection;
    }
}