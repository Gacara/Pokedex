<?php
// guest.php
require_once "../lib/model.php";

// important
if(!is_loggedin())
{
  redirect('index.php');
}

// CONTROLLER
$getpoke = getAllPokemon();



?>
<!DOCTYPE html>
<html>
  <nav style="padding-top: 20px;">
      <a href="ajout.php">Ajouter un Pokemon !</a>
    </nav>
	 <nav style="padding-top: 20px;">
      <a href="../index.php">Retour au Pokedex</a>
    </nav>
	
  <head>
		<title>POKEMON MANAGER</title>
		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Romain Goulet">
		<meta name="description" content="description">
		
</head>
  <body>
	<h1>Liste des pokémons disponibles.</h1>
    <?php
    if(count($getpoke) > 0)
    {
      echo "<ul>";
      foreach ($getpoke as $pokemon)
      {
        ?>
        <li>
          <a href="../pokemon.php?id=<?=$pokemon["id"];?>"><?=$pokemon["name"];?></a>
        </li>
        <?php
      }
      echo "</ul>";
    }else{
      echo "<h3>Aucune soirée n'est pour l'instant disponible.</h3>";
    }
    ?>
  </body>
 
 
</html>



<?php
require "./footer.php";
?>
