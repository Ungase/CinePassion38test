<?php
/*======= C O N T R O L E U R ====================================================================================
	fichier				: ./mvc/controleur/user/authentificayion.inc.php
	auteur				: Chaurand Lucas
	date de création	: Mars 2020
	date de modification:
	rôle				: le contrôleur de l'authentification des utilisateur
  ================================================================================================================*/

/**
 * Classe relative au contrôleur de l'authentification des utilisateur du domaine cinepassion38
 * @author Chaurand Lucas
 * @version 1.0
 * @copyright Chaurand Lucas - Mars 2020
 */
class controleurUserAuthentification extends controleur {
	
	/**
	 * Génère l'affichage de la vue pour l'action par défaut de la page 
	 * @param null
	 * @return null
	 * @author Christophe Goidin <christophe.goidin@ac-grenoble.fr>
	 * @version 1.0
	 * @copyright Christophe Goidin - Juin 2017
	 */
	public function defaut() {
		//parent::genererVue();
	    $this->numRsa = configuration::get("numRsa");
	    $this->privateKeyRsa = $this->getPrivateRsa($this->numRsa);
	}

} // class

?>

