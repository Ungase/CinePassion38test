<?php

/*
 * ======= C O N T R O L E U R ====================================================================================
 * fichier : ./mvc/controleur/films/liste.inc.php
 * auteur : Fabrice Gonçalves
 * date de création : novembre 2019
 * date de modification:
 * rôle : la liste des films
 * ================================================================================================================
 */

/**
 * Classe relative au contrôleur de la page accueil des films du domaine cinepassion38
 *
 * @author Fabrice Gonçalves
 * @version 1.0
 */
class controleurFilmFiche extends controleur
{

    public function __construct()
    {
        $this->modele = new modeleFilmFiche();
    }

    /**
     * Met à jour le tableau $donnees de la classe mère avec les informations spécifiques de la page
     *
     * @param
     *            null
     * @return null
     * @author Christophe Goidin <christophe.goidin@ac-grenoble.fr>
     * @version 1.1
     * @copyright Christophe Goidin - juin 2017
     */
    public function setDonnees()
    {

        // ===============================================================================================================
        // titres de la page
        // ===============================================================================================================
        $this->titreHeader = "Page Liste Films";
        $this->titreMain = "Page Liste Films";

        // ===============================================================================================================
        // encarts
        // ===============================================================================================================
        $this->encartsGauche = "partenaireEmpire.txt";

        // ===============================================================================================================
        // texte défilant
        // ===============================================================================================================
        // rien

        // ===============================================================================================================
        // pour prendre le SimpleSlideShow css et js
        // ===============================================================================================================
        $this->enteteLien = $this->IntLien("navigation.css");
        $this->enteteLien .= $this->IntLien("tableau.css");
        $this->enteteLien .= $this->IntLien("onglet.css");
        $this->enteteLien .=$this->IntLien('ficheFilm.css');

        // ===============================================================================================================
        // alimentation des données COMMUNES à toutes les pages
        // ===============================================================================================================
      
        parent::setDonnees();
    }

    /**
     * Génère l'affichage de la vue pour l'action par défaut de la page
     *
     * @param
     *            null
     * @return null
     * @author Christophe Goidin <christophe.goidin@ac-grenoble.fr>
     * @version 1.0
     * @copyright Christophe Goidin - Juin 2017
     */
    public function defaut()
    {
        $this->information();
    }
    
     public function information()
    {        
        $this->section;
        $this->infos = $this->informations($this->section);
        $this->affiche = $this->getAffiche($this->section);
        $this->galerie = $this->getPhotos($this->getTitreFilm($this->section));
        parent::genererVue();
    }

    public function histoire()
    {
        $this->section;
        $this->infos = $this->informations($this->section);
        $this->affiche = $this->getAffiche($this->section);

        $this->synopsis = $this->informations($this->section)->synopsis;
        

        parent::genererVue();
   
    }

    public function acteurs()
    {
        $this->section;
        $this->infos = $this->informations($this->section);
        $this->affiche = $this->getAffiche($this->section);
        $this->acteurs = $this->getListeActeurs($this->section);

 
        parent::genererVue();
    }

    public function notation()
    {
        $this->infos = $this->informations($this->section);
        $this->affiche = $this->getAffiche($this->section);
        $this->img ="./image/divers/enTravaux.png";
        parent::genererVue();
    }

    public function commentaire()
    {
        $this->infos = $this->informations($this->section);
        $this->affiche = $this->getAffiche($this->section);
        $this->img ="./image/divers/enTravaux.png";

        parent::genererVue();
    }

    private function getAffiche($numFilm)
    {
        $titreFilm = $this->getTitreFilm($numFilm);
        if (file_exists("./image/film/affiche/" . $titreFilm . ".jpg")) {
            return "./image/film/affiche/" . $titreFilm . ".jpg";
        } else {
            return "./image/film/affiche/Aucune affiche.jpg";
        }
    }

    private function getPhotos($titreFilm)
    {
        $photo = array();

        if (file_exists("./image/film/photo/".$this->getTitreFilm($titreFilm))) {
            if ($dossier = opendir("./image/film/photo/" .$titreFilm)) {
                while (($file = readdir($dossier)) !== false) {
                    if (strstr($file, ".jpg") != "false") {
                        array_push($photo, $file);
                    }
                }
                closedir($dossier);
            }
        }

        return $photo;
    }

    private function informations($numFilm)
    {
        $info = $this->modele->getInformationsFilm($numFilm);
        $info->positionFilm = $this->modele->getPositionFilmParRealisateur($info->titre);
        return $info;
    }
    private function getListeActeurs($numFilm)
    {
        $collect = $this->modele->getActeurs($numFilm);
        $taille =$collect->getTaille();
        for($i=0;$i<$taille;$i++){
            if (file_exists("./image/personne/acteur/". $collect->getUnElement($i)->prenomNom.".jpg")) {
                $collect->getUnElement($i)->photo ="./image/personne/acteur/". $collect->getUnElement($i)->prenomNom .".jpg";                
            }elseif(file_exists("./image/personne/polyvalent/". $collect->getUnElement($i)->prenomNom)) {
                $collect->getUnElement($i)->photo ="./image/personne/acteur/". $collect->getUnElement($i)->prenomNom . ".jpg";
               }else{
                   $collect->getUnElement($i)->photo =".image/personne/Aucune personne.jpg";
               }
        }
        
        return $collect;
    }


    private function getTitreFilm($numFilm)
    {
        return $this->infos->titre;
    }

}













