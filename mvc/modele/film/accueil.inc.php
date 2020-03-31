<?php
/*=========== M O D E L E ========================================================================================
 fichier		    : .inc.php
 auteur				: 
 date de création	: 
 date de modification: juin 2017 : refactoring MVC objet
 rôle				: la classe générique d'accès aux données. Joue le rôle du modèle dans l'architecture MVC.
 ================================================================================================================*/
Class modeleFilmAccueil extends modeleFilm {
    
    
    /**
     * @param string $TitreFilm
     * @return id du film selon son titre
     */
    
    public function getNumFilm($titreFilm){
        
        $sql = 'SELECT numFilm FROM film WHERE titreFilm = "' . $titreFilm . '";';
        $resultat = $this->executerRequete($sql);
        $objet = $resultat->fetchObject();
        return $objet->numFilm;
        
    }
    
    
    
    
    
    
    
    
    
    
}//class

?>