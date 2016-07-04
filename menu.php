<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>HTML5, CSS3 and jQuery Navigation menu</title>
        <link rel="stylesheet" href="css/nav.css">
        <!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body class="no-js">
        <nav id="topNav">
                <ul>
                    <li><a href="#" title="Nav Link 1">Nav Link 1</a></li>
                <li>
                    <a href="#" title="Nav Link 1">Nav Link 2</a>
                    <ul>  
                        <li><a href="#" title="Sub Nav Link 1">Sub Nav Link 1</a></li>
                        <li><a href="#" title="Sub Nav Link 2">Sub Nav Link 2</a></li>
                        <li><a href="#" title="Sub Nav Link 3">Sub Nav Link 3</a></li>
                        <li><a href="#" title="Sub Nav Link 4">Sub Nav Link 4</a></li>
                        <li class="last"><a href="#" title="Sub Nav Link 5">Sub Nav Link 5</a></li>
                    </ul>                
                </li>
                <li><a href="#" title="Nav Link 1">Nav Link 3</a></li>
                <li><a href="#" title="Nav Link 1">Nav Link 4</a></li>
                <li>
                	<a href="#" title="Nav Link 5">Configuration des Unités</a>
                	<ul>
                		<li><a href="#" title="Sub Nav Link 1">Liste des Unités</a></li>
                    	<li class="last"><a href="#" title="Sub Nav Link 2">Ajout d'une Unité</a></li>
                    </ul>
                </li>    
            </ul>
        </nav>
        <script src="js/jquery.js"></script>
        <script src="js/modernizr.js"></script>
    </body>
</html>