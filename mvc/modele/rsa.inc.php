<?php 
/*=========== M O D E L E ========================================================================================
 fichier		    : rsa.inc.php
 auteur				: Lucas Chaurand
 date de création	: 16 janvier 2020
 date de modification: 
 rôle				: la classe générique d'accès aux données. Joue le rôle du modèle dans l'architecture MVC.
 ================================================================================================================*/
Class modelRSA{
    /**
     * Récupère la clé publique RSA
     * @param integer $num : le numéro du couple de clé RSA
     * @return string : la clé publique du couple de clé RSA dont le numéro est passé en paramètre
     */
    public function getPublicKeyRsa($num){
        $sql = 'SELECT publicKeyRsa FROM rsa WHERE numKeyRsa = "' . $num . '";';
        $resultat = $this->executerRequete($sql);
        $objet = $resultat->fetchObject();
        return $objet->PublicKeyRsa;
    }
    
    /**
     * Récupère la clé privée RSA
     * @param integer $num : le numéro du couple de clé RSA
     * @return string : la clé privée du couple de clé RSA dont le numéro est passé en paramètre
     */
    public function getPrivateKeyRsa($num){
        $sql = 'SELECT privateKeyRsa FROM rsa WHERE numKeyRsa = "' . $num . '";';
        $resultat = $this->executerRequete($sql);
        $objet = $resultat->fetchObject();
        return $objet->PrivateKeyRsa;
    }
    
    
}
?>