<?php  
    //On inclut et on instancie notre classe    
	require_once('function.php');
	
    spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

    $bdd = new PDO('mysql:host=localhost;dbname=compty;charset=utf8', 'root', 'cmc71adm');
    
    $application = new application; 

    //On contruit la page   
    $application->buildPage();  

    //On inclut le template qui appel les différents éléments de la page    
    include($application->template);    
?>