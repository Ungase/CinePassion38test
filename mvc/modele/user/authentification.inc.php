<?php 
/*=========== M O D E L E ========================================================================================
 fichier		    : authentification.inc.php
 auteur				: Lucas Chaurand
 date de création	: 16 janvier 2020
 date de modification: 
 rôle				: la classe générique d'accès aux données. Joue le rôle du modèle dans l'architecture MVC.
 ================================================================================================================*/
Class modelUserAuthentification{

    /**
     * renvoie un objet anonyme comportant les informations sur l'utilisateur qui vient de
     s'authentifier ou le booléan false si la tentative d'authentification se solde par un
     échec.
     * @param string $loginUser : le login de l'utilisateur
     * @param string $motDePasseUser : le mot de passe de l'utilisateur
     * @return object : un objet anonyme comportant les informations sur l'utilisateur qui vient
     de s'authentifier (si son login et son mot de passe sont bons). Le booléen false est
     renvoyé si le login et/ou le mot de passe sont incorrects (car la méthode fetch renvoie le
     booléen false lorsqu'il n'y a plus de tuples à lire)
     */
    public function getInformationsUser($loginUser, $motDePasseUser){
        $sql = "SELECT avatarUser as avatar, dateHeureCreationUser as dateCreation, dateHeureDerniereConnexionUser as derniereConnexion,
                t.`libelleTypeUser` as typeUser, nbEchecConnexionUser as echecConnection, nbTotalConnexionUser as nbConnexion,prenomUser, nomUser,sexeUser
                FROM user
                INNER JOIN typeuser t
                WHERE loginUser='".$loginUser."' AND motDePasseUser='".$motDePasseUser."';";
        $resultat = $this ->executerRequete($sql);
        
        if ($resultat) {
            $this-> setDateHeureDerniereConnexionUser($loginUser);
            $this->setNbTotalConnexionUser($loginUser);
            $resultat = $resultat->fetchObject();
        } 
    }
    
    /**
     * Met à jour le nombre d'échecs de connexion
     * @param string $loginUser : le login de l'utilisateur
     * @param string $operation : le type d'opération : "incrementer" ou "reinitialiser".
     * @return null
     */
    public function setNbEchecConnexionUser($loginUser, $operation){
        
    }
    
    /**
     * Met à jour le nombre total de connexions de l'utilisateur
     * @param string $loginUser : le login de l'utilisateur
     * @return null
     */
    private function setNbTotalConnexionUser($loginUser){
        $sql = "UPDATE user
                SET nbTotalConnexionUser = nbTotalConnexionUser + 1
                WHERE loginUser = '".$loginUser."';";
        $this ->executerRequete($sql);

    }
    
    /**
     * Met à jour la date et l'heure de dernière connexion de l'utilisateur
     * @param string $loginUser : le login de l'utilisateur
     * @return null
     */
    private function setDateHeureDerniereConnexionUser($loginUser){
        $sql = "UPDATE user
                SET dateHeureDerniereConnexionUser = NOW()
                WHERE loginUser = '".$loginUser."';";
        $this ->executerRequete($sql);
    }
    
}


?>