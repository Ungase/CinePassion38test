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
class controleurFilmListe extends controleur
{
    
    private $modele;
    
    private $navig;
    
    public function __construct()
    {
        //require_once ("./mvc/modele/film/commun.inc.php");
        //require_once ("./mvc/modele/film/liste.inc.php");
        
        $this->modele = new modeleFilmListe();
        
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
        $this->encartsGauche = "FilmMois.txt";
        $this->encartsDroite = $this->alea(array("nouveaute.txt","classement.txt"));
        
        // ===============================================================================================================
        // texte défilant
        // ===============================================================================================================
        // rien
        
        // ===============================================================================================================
        // pour prendre le SimpleSlideShow css et js
        // ===============================================================================================================
        $this->enteteLien = $this->IntLien("navigation.css");
        $this->enteteLien .= $this->IntLien("tableau.css");
        
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
        $this->nbSection = $this->getNbSections($this->modele->getNbFilms());
        $this->section = ($this->section > $this->nbSection) ? $this->nbSection : $this->getFormat($this->section,$this->nbSection) ;
        $this->ListeFilms = $this->modele->getListeFilms(($this->section - 1) * configuration::get("nbLignesSection"), configuration::get("nbLignesSection"));
        $this->NbFilms = $this->modele->getNbFilms();
        
        
        $this->numPremierFilm = ($this->section - 1) * configuration::get("nbLignesSection") + 1;
        $this->numDernierFilm = ($this->section - 1) * configuration::get("nbLignesSection") + $this->ListeFilms->getTaille();
        $this->navigation = $this->getNavigation();
        
        parent::genererVue();
    }
    
    /**
     *
     * @return renvoie le nombre de section du tableau xHtml
     */
    
    
    /**
     *
     * @param
     *            numero de la section en cours
     * @return renvoie un tableau contenant les numeros du premier et du dernier film de la section du tableau
     */
}













