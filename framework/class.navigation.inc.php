<?php

/*
 * ================================================================================================================
 * fichier : class.navigation.inc.php
 * auteur : Gonçalves Fabrice
 * date de création : novembre 2019
 * date de modification:
 *
 * rôle ================================================================================================================
 */
class navigation
{
    
    private $module;
    
    private $page;
    
    private $action;
    
    private $section;
    
    private $nbSection;
    
    private $btNavig;
    
    public function __construct($mod, $Page, $act, $sec, $nbSec, $btNavig)
    {
        $this->module = $mod;
        $this->page = $Page;
        $this->action = $act;
        $this->section = $sec;
        $this->nbSection = $nbSec;
        $this->btNavig = $btNavig;
    }
    
    public function __get($propriete)
    {
        // return $this->{$propriete};
        $i = 0;
        switch ($i) {
            case 0:
                if ("module" === $propriete)
                    return $this->module;
                    break;
            case 1:
                if ("page" === $propriete)
                    return $this->page;
                    break;
            case 2:
                if ("action" === $propriete)
                    return $this->action;
                    break;
            case 3:
                if ("section" === $propriete)
                    return $this->section;
                    break;
            case 4:
                if ("nbSection" === $propriete)
                    return $this->nbSection;
                    break;
        }
    }
    
    public function __set($propriete, $valeur)
    {
        $i = 0;
        switch ($i) {
            case 0:
                if ("module" === $propriete)
                    $this->module = $valeur;
                    break;
            case 1:
                if ("page" === $propriete)
                    $this->page = $valeur;
                    break;
            case 2:
                if ("action" === $propriete)
                    $this->action = $valeur;
                    break;
            case 3:
                if ("section" === $propriete)
                    $this->section = $valeur;
                    break;
            case 4:
                if ("nbSection" === $propriete)
                    $this->nbSection = $valeur;
                    break;
        }
    }
    
    /**
     * Permet de mettre les boutons de navigations
     *
     * @author lucas chaurand
     * @param
     *            null
     * @return null
     */
    public function getXhtmlBoutons()
    {
        if ($this->section == 1) {
            $resultat = "<img class='bt' alt='' src='framework\images\btPremInactif.png'>
                         <img class='bt' alt='' src='framework\images\btPrecInactif.png'>
                         <a class='bt'" . navigation::getLienPage($this->module, $this->page) . "&amp;section=" . $this->btNavig->SectionSuivante . "'> <img alt='Page suivante' id='monImage3' src='./framework/images/btSuivActif.png' onmouseover = \"window.document.getElementById('monImage3').src ='./framework/images/btSuivSurvol.png'\" onmouseout = \"window.document.getElementById('monImage3').src = './framework/images/btSuivActif.png'\"/> </a>
                         <a class='bt'" . navigation::getLienPage($this->module, $this->page) . "&amp;section=" . $this->nbSection . "'> <img alt='Dernière page' id='monImage4' src='./framework/images/btDerActif.png' onmouseover = \"window.document.getElementById('monImage4').src ='./framework/images/btDerSurvol.png'\" onmouseout = \"window.document.getElementById('monImage4').src = './framework/images/btDerActif.png'\"/> </a>";
        } ElseIf ($this->section == $this->nbSection) {
            $resultat = "<a class='bt'" . navigation::getLienPage($this->module, $this->page) . "'><img alt='Première page' id='monImage1' src='framework\images\btPremActif.png' onmouseover = \"window.document.getElementById('monImage1').src ='./framework/images/btPremSurvol.png'\" onmouseout = \"window.document.getElementById('monImage1').src = './framework/images/btPremActif.png'\"> </a>
                         <a class='bt'" . navigation::getLienPage($this->module, $this->page) . "&amp;section=" . $this->btNavig->SectionPrecedente . "'><img alt='Page précédente' id='monImage2' src='framework\images\btPrecActif.png' onmouseover = \"window.document.getElementById('monImage2').src ='./framework/images/btPrecSurvol.png'\" onmouseout = \"window.document.getElementById('monImage2').src = './framework/images/btPrecActif.png'\"> </a>
                         <img class='bt' alt='' src='./framework/images/btSuivInActif.png'>
                         <img class='bt' alt='' src='./framework/images/btDerInActif.png'>";
        } Else {
            $resultat = "<a class='bt'" . navigation::getLienPage($this->module, $this->page) . "'><img alt='Première page' id='monImage1' src='framework\images\btPremActif.png' onmouseover = \"window.document.getElementById('monImage1').src ='./framework/images/btPremSurvol.png'\" onmouseout = \"window.document.getElementById('monImage1').src = './framework/images/btPremActif.png'\"> </a>
                         <a class='bt'" . navigation::getLienPage($this->module, $this->page) . "&amp;section=" . $this->btNavig->SectionPrecedente . "'><img alt='Page précédente' id='monImage2' src='framework\images\btPrecActif.png' onmouseover = \"window.document.getElementById('monImage2').src ='./framework/images/btPrecSurvol.png'\" onmouseout = \"window.document.getElementById('monImage2').src = './framework/images/btPrecActif.png'\"> </a>
                         <a class='bt'" . navigation::getLienPage($this->module, $this->page) . "&amp;section=" . $this->btNavig->SectionSuivante . "'><img alt='Page suivante' id='monImage3' src='./framework/images/btSuivActif.png' onmouseover = \"window.document.getElementById('monImage3').src ='./framework/images/btSuivSurvol.png'\" onmouseout = \"window.document.getElementById('monImage3').src = './framework/images/btSuivActif.png'\"> </a>
                         <a class='bt'" . navigation::getLienPage($this->module, $this->page) . "&amp;section=" . $this->nbSection . "'><img alt='Dernière page' id='monImage4' src='./framework/images/btDerActif.png' onmouseover = \"window.document.getElementById('monImage4').src ='./framework/images/btDerSurvol.png'\" onmouseout = \"window.document.getElementById('monImage4').src = './framework/images/btDerActif.png'\"> </a>";
        }
        return $resultat;
    }
    
    public function getLienPage($module, $page)
    {
        return "href='./index.php?module=" . $module . "&amp;page=" . $page . "";
    }
    
    /**
     *
     * @deprecated
     * @return string
     */
    public function getXhtmlChiffres_v1()
    {
        $nbchiffre = configuration::get("nbChiffreAffiche");
        $resultat = " ";
        
        // cas ... que coté droit
        if ($this->section <= $nbchiffre + 3) {
            for ($i = 1; $i <= $this->section; $i ++) {
                $resultat = $resultat . " <a class='nombre' href='./index.php?module=film&amp;page=liste&amp;section=" . $i . "'>" . $i . " </a>";
            }
            for ($i = $this->section + 1; $i <= $this->section + $nbchiffre; $i ++) {
                $resultat = $resultat . " <a class='nombre' href='./index.php?module=film&amp;page=liste&amp;section=" . $i . "'>" . $i . " </a>";
            }
            $resultat = $resultat . " ...  <a class='nombre' href='./index.php?module=film&amp;page=liste&amp;section=" . $this->nbSection . "'>" . $this->nbSection . " </a>";
        } // cas ... que coté gauche
        
        elseif ($this->section >= $this->nbSection - ($nbchiffre + 2)) {
            $resultat = $resultat . "  <a class='nombre' href='./index.php?module=film&amp;page=liste&amp;section= 1 '> 1  </a> ... ";
            for ($i = $this->section - $nbchiffre; $i <= $this->nbSection; $i ++) {
                $resultat = $resultat . " <a class='nombre' href='./index.php?module=film&amp;page=liste&amp;section=" . $i . "'>" . $i . " </a>";
            }
            // cas ... gauche et droite
        } else {
            $resultat = $resultat . "  <a class='nombre' href='./index.php?module=film&amp;page=liste&amp;section= 1 '> 1  </a> ... ";
            for ($i = $this->section - $nbchiffre; $i <= $this->section + $nbchiffre; $i ++) {
                $resultat = $resultat . " <a class='nombre' href='./index.php?module=film&amp;page=liste&amp;section=" . $i . "'>" . $i . " </a>";
            }
            $resultat = $resultat . "...  <a class='nombre' href='./index.php?module=film&amp;page=liste&amp;section=" . $this->nbSection . "'>" . $this->nbSection . " </a>";
        }
        
        return $resultat;
    }
    
    /**
     * Permet de mettre la barre de navigations avec les chiffres
     *
     * @author Fabrice Goncalves
     * @param
     *            null
     * @return null
     */
    public function getXhtmlChiffres()
    {
        $nbchiffre = configuration::get("nbChiffreAffiche");
        $resultat = "";
        $section = $this->section;
        
        for ($i = 1; $i <= $this->nbSection; $i ++) {
            if ($i == $section) {
                $resultat .= "<b> " . $i . "</b>";
            } elseif ($i == 1 or $i == $this->nbSection) {
                $resultat .= " <a class='nombre'" . navigation::getLienPage($this->module, $this->page) . "&amp;section=" . $i . "'>" . $i . "</a>";
            } elseif ($i == $section - $nbchiffre - 1 or $i == $section + $nbchiffre + 1) {
                if ($section > $i) {
                    $resultat .= "...";
                    for ($j = configuration::get("nbDizaine"); $j >= 1; $j --) {
                        if ($j * 10 <= $section && ((floor($i / 10) * 10) - (10 * ($j - 1))) != 0) {
                        
                            $resultat .= " <a class='nombre'" . navigation::getLienPage($this->module, $this->page) . "&amp;section=" . ((floor($i / 10) * 10) - (10 * ($j - 1))) . "'>" . ((floor($i / 10) * 10) - (10 * ($j - 1))) . "</a>";
                            if($j ==1){
                                $resultat .= "...";
                            }
                        }
                        
                    }
                } else {
                    $resultat .= "...";
                    for ($j = 1; $j <= configuration::get("nbDizaine"); $j ++) {
                        if ($j * 10+$i <= $this->nbSection) {
                            $resultat .= " <a class='nombre'" . navigation::getLienPage($this->module, $this->page) . "&amp;section=" . ((ceil($i / 10) * 10) + (10 * ($j - 1))) . "'>" . ((ceil($i / 10) * 10) + (10 * ($j - 1))) . "</a>";
                            if($j == configuration::get("nbDizaine")){
                                $resultat .= "...";
                        }
                            
                        }
                      
                    }
                    
                }
                
                
            } elseif ($i >= $section - $nbchiffre && $i <= $section + $nbchiffre) {
                
                $resultat .= " <a class='nombre'" . navigation::getLienPage($this->module, $this->page) . "&amp;section=" . $i . "'>" . $i . "</a>";
            }
        }
        
        return $resultat;
    }
    
    public function format()
    {
        $forme = configuration::get("position");
        
        if ($forme != 1) {
            return '';
        } Else {
            return "</div> <div class = 'alignement'>";
            return '';
        }
    }
}

?>