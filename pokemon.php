<?php
require_once "lib/model.php";

$currentid;

if( !isset($_GET["id"])
&&  !isset($_POST["pokemon_id"]) )
{
  redirect("index.php");
}else{
  $id = isset($_GET['id']) ? $_GET['id'] : $_POST["pokemon_id"];
  $id = sanitize($id);
  $id = intval($id);
  if(!is_int($id))
  {
   
    redirect("index.php");
  }else{
    $currentid = $id;
  }
}

	$poke_id    = sanitize($_POST["truc"]);
	deletepokemon($poke_id);





 $errors = [];
 $success;

$pokemon = getPokemonById($currentid);
if(empty($pokemon))
{
  redirect("admin/guest.php");
}
?>
<script>

	let pokeid = <?php echo json_encode($currentid) ?>;


</script>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset='utf-8'>
      <title>Liste Pokémon</title>
    </head>
    <body>
	
	<link rel="stylesheet" href="../css/poke.css">
      <h1><?=$pokemon['name'] ?></h1>
	  <h3><?=$pokemon['descri'] ?></h3>
	  
	  <img src="<?=$pokemon["picture"];?>">
	  
	  <audio controls="controls">
	<source src="<?=$pokemon["sound"];?>" type="audio/mp3" />
	</audio>
	<form action="" method="post">
	<div>
	<input type="hidden" value="<?=$currentid?>" name="truc" id="truc" >
	<input type="submit" name="submit" id="submit" value="SUPPRIMER CE POKEMON :'( " style=" margin-top: 5%;"/>
	
	
	</div>
	</form>
<?php
      if(isset($success) && $success){
        echo "<p>".$success."</p>";
      }else{
         if(count($errors)>0)
         {
            echo "<ul>";
            foreach($errors as $error)
            {
                echo "<li>".$error."</li>";
            }
            echo "</ul>";
         }
?>

	
	
       
<?php
    }
?>

  </body>
  <nav style="padding-top: 50px;" >
      <a href="admin/guest.php">Retour aux Pokémons</a>
    </nav>
</html>
