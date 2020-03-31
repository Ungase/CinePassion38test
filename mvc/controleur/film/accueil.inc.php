<?php

/*
 * ======= C O N T R O L E U R ====================================================================================
 * fichier : ./mvc/controleur/films/accueil.inc.php
 * auteur : Fabrice Gonçalves
 * date de création : septembre 2019
 * date de modification:
 * rôle : le contrôleur de la page d'accueil des films
 * ================================================================================================================
 */

/**
 * Classe relative au contrôleur de la page accueil des films du domaine cinepassion38
 *
 * @author Fabrice Gonçalves
 * @version 1.0
 */
class controleurFilmAccueil extends controleur
{

    private $modele;

    public function __construct()
    {
        //require_once ("./mvc/modele/film/commun.inc.php");
        //require_once ("./mvc/modele/film/accueil.inc.php");
        
        /*$this->naviguer = new navigation();*/       
        $this->modele = new modeleFilmAccueil();
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
        $this->titreHeader = "Page d'acceuil des films";
        $this->titreMain = "Page d'accueil des films";

        // ===============================================================================================================
        // encarts
        // ===============================================================================================================
        $this->encartsDroite = "partenaireAllocine.txt";
        $this->encartsGauche = "partenaireEmpire.txt";

        // ===============================================================================================================
        // texte défilant
        // ===============================================================================================================
        // rien

        // ===============================================================================================================
        // pour prendre le SimpleSlideShow css et js
        // ===============================================================================================================
        $this->enteteLien = $this->IntLien("SimpleSlideShow");

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
        $this->Galerie = $this->getGalerie(configuration::get("NbAffiches"));
        $this->NbFilms = $this->modele->getNbFilms();
        parent::genererVue();
    }

    /**
     *
     * @param $nbmax nombre
     *            de films a afficher
     * @return renvoie un tableau a 2 dimension contenant les nums des films aisni que leurs adresses relative
     * @version 1.0
     */
    private function getGalerie($nbmax)
    {
        $chemin = "./image/film/affiche/";
        $toutesLesAffiches = scandir($chemin, $sorting_order = SCANDIR_SORT_NONE);
        $nbAffiche = fs::getNbFichier($chemin, "jpg", "Aucune affiche.jpg");
        $nbfilm[0] = mt_rand(2, $nbAffiche);
        while (count($nbfilm) < $nbmax) {
            if ($toutesLesAffiches[$alea = mt_rand(2, $nbAffiche+2)] !== "Aucune affiche.jpg") {
                $nbfilm[] = $alea;
                $nbfilm = array_unique($nbfilm);
            }
        }

        for ($i = 0; $i < $nbmax; $i ++) {
            
            $galerie[$i] = [
                'ID' => $this->modele->getNumFilm(pathinfo($toutesLesAffiches[$nbfilm[$i]],PATHINFO_FILENAME)),
                'Chemin' => $chemin . $toutesLesAffiches[$nbfilm[$i]]
            ];
        }
        return $galerie;
    }
}
// class

?>

