<!--



function fValidationSaisie(pCodeAscii) {

		
  if ((window.document.getElementById(window.event.srcElement.id).value).length >= 20){
	  window.document.getElementById("Erreur").innerHTML="Il y a trop de caracteres";
	  window.setTimeout("window.document.getElementById('Erreur').innerHTML='';",1000);
	  return false;
	
  }else if (pCodeAscii >= 65 && pCodeAscii <= 90) { // lettre en majuscule
     return true;
  }else if (pCodeAscii >= 97 && pCodeAscii <= 122) { // lettre en minuscule
     return true;
  }else if (pCodeAscii >= 48 && pCodeAscii <= 57) { // chiffre
     return true;
  }else if (pCodeAscii == 45 || pCodeAscii == 46 || pCodeAscii == 95) { // caractère - . ou _ 
     return true;
  }else {
     window.document.getElementById("Erreur").innerHTML="Le caractère saisi n'est pas valide";
     window.setTimeout("window.document.getElementById('Erreur').innerHTML='';",1000);
     return false;
  }
} 

function validerAuthentification(box) {

	if((box.login.value).length <= 0){
		window.document.getElementById("Erreur").innerHTML="L'identifiant doit etre renseigné";
		window.setTimeout("window.document.getElementById('Erreur').innerHTML='';",1000);
		return false;
	}else if((box.mdp.value).length <= 0){
		window.document.getElementById("Erreur").innerHTML="Le mot de passe doit etre renseigné";
		window.setTimeout("window.document.getElementById('Erreur').innerHTML='';",1000);
		return false;
		
		
	}else{
		verifierAuthentificationUser(box);
	}
}

/**
 * Chiffrement des informations du formulaire d'authentification
 * @return true (le formulaire sera envoyé) ou false (le formulaire ne sera pas envoyé)
 */
function verifierAuthentificationUser(box)
{
	var jse = new JSEncrypt();
	jse.setPublicKey(publicKey);
	box.login.value = jse.encrypt(box.login.value);
	box.mdp.value = jse.encrypt(box.mdp.value);
	alert(box.login.value);
	box.submit;
}

-->
