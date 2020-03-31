
<form onsubmit ="return validerAuthentification(this);"> 
	<label for="login"> login : </label> 
	<input type="text" name="txtLogin" size="20" class="label"
		   value="Entrez votre identifiant" id="login"
		   onfocus='this.value = this.value == "Entrez votre identifiant" ? "": this.value;'
		   onkeypress="return fValidationSaisie(window.event.which);" /> 		   
    <label for="mdp"> mot de passe : </label> 
	<input type="password" name="txtMdp" size="20" id="mdp"/>
	
	<label for="inscription"> <a href="#"> s'inscrire </a></label> 
	<input type="submit" value="s'authentifier" class="label" id="inscription"/>

	<br/><span id="Erreur"></span>
</form>

<script type='text/javascript'>
  var publicKeyRsa = "-----BEGIN PUBLIC KEY-----
                      -----END PUBLIC KEY-----";
</script>
