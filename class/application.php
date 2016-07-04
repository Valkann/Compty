<?php 
class application { 
/*  ATTRIBUTS     */    
    var $header;    
    var $menu;  
    var $content;   
    var $footer;    
    var $template;  
/*===========================================================
METHODES
Ici sont regroupées les fonctions du programme, qui récupère
les valeurs du header, du contenu, du pied de page, et enfin, la
fonction buildPage() exécute ces fonctions d'un coup.
On a aussi le constructeur de la classe ici, 
qui nous donne l'emplacement du template    
===============================================================*/   

    //FONCTION CONSTRUCTEUR
    function application() { 
        $this->template='css/template.html';    
    }   

    //FONCTION QUI CREE LE HEADER   
    function getHeader() {   
        $this->header = '<h2>Compty, votre application de relevé de compteurs</h2>'; 
    }   

    //FONCTION QUI CREE LE MENU 
    function getMenu() { 
        $this->menu.='<ul>';
        $this->menu.='<li><a href="?action=afficherIndex">Index</a></li>';
        //$this->menu.='  ';
        $this->menu.='<li><a href="?action=afficherUnite">Unité</a></li>';  
        $this->menu.='<li><a href="?action=afficherTypeConso">Type de Consommation</a></li>'; 
        $this->menu.='</ul>';    
    }   

     //FONCTION QUI CREE LE CONTENU 
    function getContent() {  
        if(isSet($_GET['action'])) {    
            switch($_GET['action']) {   
                case 'home' :
                    $this->content = [
                    "content/home.php"
                    ];    
                    break;  

                case 'afficherTutoriel' :
                    $this->content = [
                    "content/tutoriel.php"
                    ];    
                    break;

                case 'afficherUnite' :
                    $this->content = [
                    "content/unite.php"
                    ];    
                    break;
                case 'afficherTypeConso' :
                    $this->content = [
                    "content/type.php"
                    ];    
                    break;            

                //Par défaut, on affiche la page d'accueil  
                default :   
                    $this->content = [
                    "content/home.php"
                    ];  
                    break;  
            }   
        }   
        //Sinon on fait afficher la page d'accueil  
        else {
            $this->content = [
            "content/home.php"
            ];    
        }   
    }   

    //FONCTION QUI CREE LE PIED DE PAGE 
    function getFooter() {   
        $this->footer = 'contenu du pied de page';  
    }   

    /*FONCTION QUI APPELLE LES FONCTIONS DE 
    CREATION DES DIFFERENTES PARTIES DE LA PAGE*/   
    function buildPage() {   
        $this->getHeader(); 
        $this->getMenu();   
        $this->getContent();    
        $this->getFooter(); 
    }   
} //Fin de la classe application    
?>