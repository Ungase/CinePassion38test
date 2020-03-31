<?php
/*=========== M O D E L E ========================================================================================
 fichier		    : commun.inc.php
 auteur				: Fabrice Gonçalves
 date de création	: Octobre 2019

 rôle				: la classe  d'accès aux données commun aux page film. Joue le rôle du modèle dans l'architecture MVC.
 ================================================================================================================*/
Class modeleFilm extends modele {
    
    
    
    /**
     * @return renvoie le nombre de films présent dans la table film
     */
    
    public function getNbFilms(){
        $sql = "SELECT count(*) as nbFilm FROM film;";
        $resultat = $this->executerRequete($sql);
        $objet = $resultat->fetchObject();
        return $objet->nbFilm;       
    }
    
    
    
    
    
    
    
    
    
}//class

?>