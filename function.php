    <?php

function chargerClasse($classe)
    {
      require 'class/'. $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
    }

?>
