<?php 
/*================================================================================================================
 fichier				: class.chaine.inc.php
 auteur				: Chaurand Lucas
 date de création	: octobre 2019
 date de modification: 

 rôle				: décrit la classe chaine qui permet de gérer les chaines de caracteres
 ================================================================================================================*/

class chaine{
    
    /**
     *
     * @param $unechaine une chaine de caractere
     * @return retourne un tableau avec chaque mot / chaine qui commence avec une majuscule de $unechaine
     * @version 1.0
     */
    public static function decouper($unechaine){
        $result = preg_replace("([A-Z])"," $0", $unechaine);
        $tab = explode(' ', $result);
        return $tab;
       }
    
       
       
       public static function placementnombre($unnombre){
           if ($unnombre == 1){
               return "1er";
           }
           Else{
               return $unnombre. "ème";
           }
       }
       
       public static function genreReal($sexeReal){
           if ($sexeReal == "M"){
               return "réalisateur";
           }
           Else{
               return "réalisatrice";
           }
       }
       
       public static function typeFilm($unType){
           $typeFilmDe = array("guerre" , "science-fiction");
           $typeFilmException = array("drame", "thriller", "western");
           $voyelle = array("a","e","i","o","u","y");
           

           
           if (in_array($unType,$typeFilmDe)) {
               return "un film de ". $unType;
           }
           Else If(in_array($unType,$typeFilmException)){
               return "un ". $unType;
           }
           Else If(in_array($unType[0],$voyelle)){
               return "un film d'".$unType;
           }
           Else If($unType == "comédie"){
               return "une ".$unType;
           }
           Else{
               return "un film ".$unType;
           }
       }
       
        public static function dateMois($date){
           $jour = substr($date,0,2);
           $mois = substr($date,3,strlen ($date)-8);
           $annee = substr($date,strlen ($date)-4);
           
           switch ($mois) {
               case "January":
               return " ". $jour." Janvier ". $annee ;
               break;
               
               case "February":
                   return " ".$jour." Février ". $annee ;
                   break;
                   
               case "March":
                   return " ".$jour." Mars ". $annee ;
                   break;
                   
               case "April":
                   return " ".$jour." Avril ". $annee ;
                   break;
                   
               case "May":
                   return " ".$jour." Mai ". $annee ;
                   break;
                   
               case "June":
                   return " ".$jour." Juin ". $annee ;
                   break;
                   
               case "July":
                   return " ".$jour." Juillet ". $annee ;
                   break;
                   
               case "August":
                   return " ".$jour." Août ". $annee ;
                   break;
                   
               case "September":
                   return " ".$jour." Septembre ". $annee ;
                   break;
                   
               case "October":
                   return " ".$jour." Octobre ". $annee ;
                   break;
                   
               case "November":
                   return " ".$jour." Novembre ". $annee ;
                   break;
                   
               case "December":
                   return " ".$jour." Décembre ". $annee ;
                   break;
           }
       } 
       
       public static function Nation($nation,$sexe){
           switch ($nation){
               case "Pays-Bas":
                   if ($sexe ="M") {
                       return "néerlandais";
                   }
                   Else{
                       return "néerlandaise";
                   }
                   
               case "Afrique du sud":
                   if ($sexe ="M") {
                       return "sud africain";
                   }
                   Else{
                       return "sud africaine";
                   }
                   
               case "Allemagne":
                   if ($sexe ="M") {
                       return "allemand";
                   }
                   Else{
                       return "allemande";
                   }
                   
               case "Angleterre":
                   if ($sexe ="M") {
                       return "anglais";
                   }
                   Else{
                       return "anglaise";
                   }
                   
               case "Argentine":
                   if ($sexe ="M") {
                       return "argentin";
                   }
                   Else{
                       return "argentine";
                   }
                   
               case "Australie":
                   if ($sexe ="M") {
                       return "australien";
                   }
                   Else{
                       return "australienne";
                   }
                   
               case "Belgique":
                       return "belge";
                   
               case "Canada":
                   if ($sexe ="M") {
                       return "canadien";
                   }
                   Else{
                       return "canadienne";
                   }
   
               case "Chine":
                   if ($sexe ="M") {
                       return "chinois";
                   }
                   Else{
                       return "chinoise";
                   }
                   
               case "Espagne":
                   if ($sexe ="M") {
                       return "espagnol";
                   }
                   Else{
                       return "espagnole";
                   }
                   
               case "France":
                   if ($sexe ="M") {
                       return "français";
                   }
                   Else{
                       return "française";
                   }
                   
               case "Inde":
                   if ($sexe ="M") {
                       return "Indien";
                   }
                   Else{
                       return "Indienne";
                   }
                   
               case "Israël":
                   if ($sexe ="M") {
                       return "israélien";
                   }
                   Else{
                       return "israélienne";
                   }
                   
               case "Irak":
                   if ($sexe ="M") {
                       return "irakien";
                   }
                   Else{
                       return "irakienne";
                   }
                   
               case "Italie":
                   if ($sexe ="M") {
                       return "italien";
                   }
                   Else{
                       return "italienne";
                   }
                   
               case "Japon":
                   if ($sexe ="M") {
                       return "japonais";
                   }
                   Else{
                       return "japonaise";
                   }
                   
               case "Nouvelle-Zelande":
                   if ($sexe ="M") {
                       return "néo-zélandais";
                   }
                   Else{
                       return "néo-zélandaise";
                   }
                   
               case "Porto Rico":
                   if ($sexe ="M") {
                       return "portoricain";
                   }
                   Else{
                       return "portoricaine";
                   }
                   
               case "Portugal":
                   if ($sexe ="M") {
                       return "portugais";
                   }
                   Else{
                       return "portugaise";
                   }
                   
               case "Suede":
                   if ($sexe ="M") {
                       return "suédois";
                   }
                   Else{
                       return "suédoise";
                   }
                   
               case "Ukraine":
                   if ($sexe ="M") {
                       return "ukrainien";
                   }
                   Else{
                       return "ukrainienne";
                   }
                   
               case "Etats-Unis":
                   if ($sexe ="M") {
                       return "américain";
                   }
                   Else{
                       return "américaine";
                   }
           }
          
       }
       public static function ageFouM($sexeReal){
           if ($sexeReal == "M"){
               return "Il était agé de ";
           }
           Else{
               return "Elle était agée de ";
           }
       }
}
        

?>